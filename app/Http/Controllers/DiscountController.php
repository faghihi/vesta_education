<?php

namespace App\Http\Controllers;

use App\Course;
use App\Discount;
use App\Usecourse;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DiscountController extends Controller
{

    public function course_discount()
    {
        $id=Input::get('Id');
        $code=Input::get('Code');
        $price=Usecourse::find($id)->price;
        $response=$this->Make_discount(Usecourse::find($id),$price*1000,$code);
        return $response;

    }

    public function Make_discount($course,$price,$code)
    {
        $response=array();
        $discount = Discount::where(['code'=>$code,'course_id'=>$course->id])->first();
        if(is_null($discount)){
            $response['error']=1; // not such a code in valid
            $response['price']=$price;
            return $response;
        }
        else {
            if($discount->count <= 0 || $discount->disable==1|| $discount->course_id!=$course->id){
                $response['error']=2; // not available as it is expired
                $response['price']=$price;
                return $response;
            }
            else {
                $response['error']=0; // there is no error
                if($discount->type==0){
                    $response['type']=0;
                    $response['amount']=$discount->value;
                    $newprice=$price-$price*$discount->value/100;
                }
                else{
                    $response['type']=1;
                    $response['amount']=$discount->value;
                    $newprice=$price-$discount->value;
                }
                $response['price']=$newprice;
                return $response;
            }
        }
    }

    public function Reduce_count($code)
    {
        $response=array();
        $discount=Discount::where('code',$code)->first();
        if(is_null($discount)){
            $response['error']=1; // not such a code in valid
            return $response;
        }
        else {
            if($discount->count <= 0){
                $response['error']=2; // not available as it is expired
                return $response;
            }
            else {
                try{
                    $select=Discount::find($discount->id);
                    $select->count=$select->count-1;
                    $select->save();
                }
                catch ( \Illuminate\Database\QueryException $e){
                    $response['error']=3; //Not Possible to remove
                    return $response;
                }
                $response['error']=0; //No such Problem
                return $response;
            }
        }
    }
}

