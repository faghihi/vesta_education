<?php

namespace App\Http\Controllers;
use App\Category;
use App\Course;
use App\News;
use App\Survey;
use App\Usecourse;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Validation\ValidationException;

class APIController extends Controller
{
    protected function validator(array $data)
    {
        $message = array(
            'name.required' => 'لطفا نام معتبری وارد نمایید' ,
            'name.max' => 'نام شما بیش از حد طولانی می باشد ',
            'email.required'=>'ایمیل الزامی می باشد .',
            'email.email'=>'ایمیل شما معتبر نیست',
            'email.unique'=>'ایمیل قبلا توسط شخص دیگری ثبت شده است',
            'password.required'=>'رمز عبور ضروری میباشد ',
            'password.min'=>'حداقل طول پسورد ۶ است ',
            'mobile.required'   => 'موبایل الزامی است.',
            'mobile.min'        => 'موبایل شما معتبر نیست.',
            'mobile.regex' =>'فرمت شماره تماس درست نیست از فرمت مثالی ۰۹۳۰۱۱۰۱۰۱۰ استفاده نمایید.'
        );
        return Validator::make($data, [
            'name'      => 'required|max:255',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|min:6',
            'mobile'    => 'required|max:11|min:11|regex:/(09)[0-9]{9}/'
        ],$message);
    }
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());
        if (!$validator->fails()) {
            $input = $request->all();
            $input['password'] = bcrypt($request->input('password'));
            try {
                $user = User::query()->create($input);
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['data' =>['error'=>$e], 'result' => 0, 'description' => 'repetetive user', 'message' => 'Token Not Created']);
            }
//            ,'token' => $this->login($request)
            return response()->json(['data'=>['user'=>$user],'result'=>1, 'description' => 'success to save user', 'message' => 'User registered successfully']);
        }
        else{
            return response()->json(['data' => ['errors'=>$validator->errors()], 'result' => 0, 'description' => 'wrong input', 'message' => 'failed by Validator']);
        }
    }
    /**
     * Login
     *
     * login specified user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        try {
            $this->validate($request, [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ],[
                'email.required' => 'وارد کردن ایمیل شما ضروری است ',
                'password.required' => 'وارد کردن گذرواژه  شما ضروری است ',
                'email.email' => 'ایمیل معتبر نیست',
                'password.min' => 'حداقل 3 کاراکتر لازم است'
            ]);
        } catch (ValidationException $e) {
            return response()->json(['data' => ['errors'=>$e], 'result' => 0, 'description' => 'wrong input', 'message' => 'failed by Validator']);
        }
        try {
            // Attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt(
                $this->getCredentials($request)
            )) {
                return $this->onUnauthorized();
            }
        } catch (JWTException $e) {
            // Something went wrong whilst attempting to encode the token
            return $this->onJwtGenerationError();
        }
        // All good so return the token
        return $this->onAuthorized($token);
    }
    /**
     * What response should be returned on invalid credentials.
     *
     * @return JsonResponse
     */
    protected function onUnauthorized()
    {
        return response()->json([
            'message' => 'invalid_credentials'
        ], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * What response should be returned on error while generate JWT.
     *
     * @return JsonResponse
     */
    protected function onJwtGenerationError()
    {
        return response()->json([
            'message' => 'could_not_create_token'
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     *  What response should be returned on authorized.
     *
     * @param $token
     * @return mixed
     */
    protected function onAuthorized($token)
    {
        return response()->json([
            'data' => [
                'user' => $user = JWTAuth::toUser($token),
                'token' => $token,
            ],
            'result'=>1,
            'description'=>'user login successfully',
            'message' => 'token_generated'

        ]);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    /**
     * Invalidate a token.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteInvalidate()
    {
        $token = JWTAuth::parseToken();

        $token->invalidate();

        return response()->json(['message' => 'token_invalidated']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\Response
     */
    public function patchRefresh()
    {
        $token = JWTAuth::parseToken();

        $newToken = $token->refresh();

        return response()->json([
            'message' => 'token_refreshed',
            'data' => [
                'token' => $newToken
            ]
        ]);
    }

    /**
     * Get authenticated user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUser()
    {
        return response()->json([
            'message' => 'authenticated_user',
            'data' => JWTAuth::parseToken()->authenticate()
        ]);
    }
    /**
     * Logout
     *
     * logout specified user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        return $this->deleteInvalidate();
    }
//    public function login(Request $request)
//    {
//        $input = $request->all();
//        $response = ['data'=>[],'result' => '0','description'=>'','message'=>''];
//        $rules = array(
//            'email' => 'required|email',
//            'password' => 'required|min:3'
//        );
//        $messages = [
//            'email.required' => 'وارد کردن ایمیل شما ضروری است ',
//            'password.required' => 'وارد کردن گذرواژه  شما ضروری است ',
//            'email.email' => 'ایمیل معتبر نیست',
//            'password.min' => 'حداقل 3 کاراکتر لازم است'
//        ];
//        $validator = Validator::make($request->all(),$rules,$messages);
//        if (! $validator->fails()) {
//            $email = Input::get('email');
//            $condition=['email'=> $email];
//            $user=User::query()->where($condition)->first();
//            if(is_null($user)){
//                $response['description']='user not exist';
//                $response['message']='. کاربر ثبت نشده است';
//                return response()->json($response);
//            }
//            else{
//                if(!password_verify(Input::get('password'),$user->password))
//                {
//                    $response['description']='password mistmatch';
//                    $response['message']='گذرواژه اشتباه می باشد.';
//                    return response()->json($response);
//                }

//                if (!$token = JWTAuth::attempt($this->getCredentials($request))) {
//                    return response()->json(['result' => 'ایمیل یا گذرواژه اشتباه می باشد']);
//                }
//                $user = JWTAuth::setToken($token)->user();
//                return response()->json(['data'=>['user'=>$user,'token' => $token],'result'=>1, 'description' => 'success to login user', 'message' => 'User login successfully']);
//                $user = User::query()->where($condition)->first();
//                $response['data']=$user;
//                $response['message']='successful Login';
//                $response['result']='1';
//            }
//            return response()->json($response);
//        }else{
//            $response['data']=['errors'=>$validator->errors()];
//            $response['description']='wrong input';
//            $response['message']='validator error';
//            return response()->json($response);
//        }

//    }

    public function get_user_details(Request $request)
    {
        $input = $request->all();
        $user = JWTAuth::toUser($input['token']);
        return response()->json(['result' => $user]);
    }

    public function listcourse()
    {
        $result=[
            "result"=>"ok"
        ];
        $courses = Usecourse::where('activated', 1)->paginate(5);
        $count_course = count(Usecourse::where('activated', 1)->get());
        foreach ($courses as $course) {
            $course['name'] = $course->course->name;
            $sections = $course->course->sections;
            $course['time'] = 0;
            foreach ($sections as $section) {
                $course['time'] = $course['time'] + $section->duration;
            }
            $counter = 0;
            $course['sections_count'] = $counter;
            $course['rate'] = -1;
            $check = 0;
//            foreach ($course->reviews as $review) {
//                if ($check == 0) {
//                    $course['rate'] = 0;
//                    $check = 1;
//                }
//                $course['rate'] += $review->pivot->rate;
//            }
//            if ($check == 1)
//                $course['rate'] = $course['rate'] / count($course->reviews);
//            $course['reviews_count'] = count($course->reviews);
            $course['category_name'] = $course->course->category->name;
        }
        $result['courses']=$courses;
        $result['count']=$count_course;
        return $result;
    }

    public function getexercises(Request $request,$id)
    {
        $result=array();
//        $user = JWTAuth::toUser($request->input('token'));
        $user = JWTAuth::parseToken()->authenticate();
        $course=User::whereHas('courses', function ($query)use($id,$user) {
            $query->where('takecourse.course_id', '=', $id)->where('takecourse.user_id',$user->id);
        })->first();
        if($course){
            $exercises=Usecourse::find($id)->excercises;
            $result['result']='ok';
            $result['data']=json_encode($exercises, JSON_FORCE_OBJECT);
            return $result;
        }
        else{
            $result['result']='fail';
            return $result;
        }

    }

    /**
     * list of categories of courses
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function categories()
    {
        $categories = Category::all();

        return response()->json(['data'=>['categories'=>$categories],'result'=>1,'description'=>'list of subjects of courses','message'=>'success']);
    }

    /**
     * list of courses of specific category
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function category_courses($id)
    {
        $category = Category::query()->find($id);
        if($category){
            $courses = $category->courses()->get();
            if(count($courses)){
                return response()->json(['data'=>['courses'=>$courses],'result'=>1,'description'=>'list of courses of specific subject','message'=>'success']);
            }
            else{
                return response()->json(['data'=>null,'result'=>0,'description'=>'there is no related course','message'=>'failed']);
            }
        }
        else{
            return response()->json(['data'=>null,'result'=>0,'description'=>'there is no such a category','message'=>'failed']);
        }
    }

    /**
     * information of specific course
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function course($id)
    {
        $course = Usecourse::query()->find($id);
        if($course){
            if(!$course->activated){
                return response()->json(['data'=>null,'result'=>0,'description'=>'the course is not activated','message'=>'failed']);
            }
            else {
                $course['teachers']="";
                $counter=0;

                foreach ($course->teachers()->get() as $teacher){
                    if($counter)
                        $course['teachers']=$course['teachers'].",".$teacher->name;
                    else
                        $course['teachers']=$teacher->name;
                    $counter++;
                }

                $course['rate'] = -1;
                $check = 0;
                foreach ($course->reviews()->wherePivot('enable', '=', 1)->get() as $review) {
                    if ($check == 0) {
                        $course['rate'] = 0;
                        $check = 1;
                    }
                    $course['rate'] += $review->pivot->rate;
                }
                if ($check == 1)
                    $course['rate'] = $course['rate'] / count($course->reviews()->wherePivot('enable', '=', 1)->get());
                $course['reviews_count'] = count($course->reviews()->wherePivot('enable', '=', 1)->get());

                $related_course = $course->course()->first();

                $course['name'] = $related_course->name;
                $course['introvideo'] = $related_course->introvideo;
                $course['introduction'] = $related_course->introduction;
                $course['goal'] = $related_course->goal;
                $course['condition'] = $related_course->condition;
                $course['requirement'] = $related_course->requirement;
                $course['qualification'] = $related_course->qualification;
                $course['category'] = $related_course->category->name;

                $counter = 0;
                $time = 0;
                $course['sections']="";
                foreach ($course->course()->first()->sections()->get() as $section) {
                    if($counter)
                        $course['sections']=$course['sections'].",".$section->name;
                    else
                        $course['sections']=$section->name;
                    $counter++;
                    $time += $section->duration;
                }
                $course['duration'] = $time;
                $course['sections_count'] = $counter;
                $students = count($course->takers);
                $course['students_count'] = $students;
                return response()->json(['data' => ['course' => $course], 'result' => 1, 'description' => 'all information related to the course', 'message' => 'success']);
            }
        }
        else{
            return response()->json(['data'=>null,'result'=>0,'description'=>'there is no such a course','message'=>'failed']);
        }
    }

    /**
     * @param $id
     * @param $page
     * @return mixed
     */
    public function news($id,$page)
    {
        $news = News::whereHas('course', function ($query) use ($id) {
            $query->where('course_id', $id);
        })->where('page_number',$page)->get();
        return response()->json(['data' => ['news' => $news], 'result' => 1, 'description' => 'all news of certain page of specific course', 'message' => 'success']);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public function surveys($id)
    {
        $surveys = Survey::whereHas('course', function ($query) use ($id){
            $query->where('course_id', $id);
        })->get();
        return $surveys;
    }

    public function survey_record(Request $request,$id)
    {
        $user = JWTAuth::parseToken()->authenticate();
        try{
            $user->surveys()->attach($id, ['answer' => $request->input('answer'), 'rate' => $request->input('rate'), 'item'=> $request->input('item')]);
        }
        catch ( \Illuminate\Database\QueryException $e){
            return response()->json(['data' =>['error'=>$e], 'result' => 0, 'description' => 'cannot save survey record', 'message' => 'failed']);
        }
        return $user->surveys()->get();
    }
}
