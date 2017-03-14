<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container text-center">
    <div class="col-xs-12 col-sm-12 col-md-6 mb-30">
        <div class="newsletter-footer">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="newsletter-footer">
                    <div class="col-xs-12 col-sm-12 col-md-8">

                        <div id="subform" class="form-group">
                            <input type="email" id="submail" class="form-control" placeholder="آدرس ایمیل شما">
                            <input type="submit" id="subscribe" data-link="{{ url('/Subscribe') }}"  data-token="{{ csrf_token() }}" class="btn btn-submit" value="عضویت در خبرنامه">
                        </div>
                        <div class="alert alert-danger" id="errorform" style="display: none;">
                            <p>ایمیل شما معتبر نمیباشد</p>
                        </div>
                        <div class="alert alert-danger" id="errorform1" style="display: none;">
                            <p>شما قبلا عضو شده اید</p>
                        </div><div class="alert alert-danger" id="errorform2" style="display: none;">
                            <p>ارتباط با سرور قطع شده است .</p>
                        </div><div class="alert alert-success" id="successform" style="display: none;">
                            <p>موفقیت آمیز بود . باتشکر از همراهی شما دوست عزیز !</p>
                        </div>


                    </div>

                </div>
                <form class="contact-form-wrapper" data-toggle="validator" method="post" action="{{ url('/SaveContact') }}">
                    {{ csrf_field() }}
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (isset($_GET['Error']))
                        <div class="alert alert-danger">
                            <p>
                                مشکلی در ثبت پیام شما به وجود آمد مججدا تلاش بفرمایید .
                            </p>
                        </div>
                    @endif
                    @if (isset($_GET['Complete']))
                        <div class="alert alert-success">
                            <p>
                                پیام شما با موفقیت ارسال شد
                            </p>
                        </div>
                    @endif
                    <div class="row">

                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="inputName"> نام <span class="font10 text-danger"> (اجباری) </span></label>
                                <input id="inputName" name="Name" type="text" class="form-control" data-error="نام شما اجباری است " required>
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="inputEmail"> ایمیل <span class="font10 text-danger"> (اجباری) </span></label>
                                <input id="inputEmail" name="Email" type="email" class="form-control" data-error="آدرس ایمیل اجباری است و باید معتبر باشد" required>
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>

                        <div class="col-sm-12">

                            <div class="form-group">
                                <label> موضوع </label>
                                <input type="text" name="Subject" class="form-control" />
                            </div>

                        </div>

                        <div class="col-sm-12">

                            <div class="form-group">
                                <label for="inputMessage"> متن پیام <span class="font10 text-danger"> (اجباری) </span></label>
                                <textarea id="inputMessage" name="Description" class="form-control" rows="8" data-minlength="20" data-error="حداقل پیامتان باید شامل 20 کلمه باشد" required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>

                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary mt-5">ارسال</button>
                        </div>

                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
<script>
    $("#subscribe").click(function(){
        var url = $(this).attr("data-link");

        //add it to your data
        var data = {
            _token:$(this).data('token'),
            Email:$('#submail').val()
        };
        $.ajax({
            url: url,
            type:"POST",
            data: data,
            success:function(data){
                // alert(data.msg);
                if(data.msg==1){
                    $('#subform').hide('slow');
                    $('#errorform').show('fast')
                }
                if(data.msg==2){
                    $('#subform').hide('slow');
                    $('#errorform1').show('fast')
                }
                if(data.msg==3){
                    $('#subform').hide('slow');
                    $('#successform').show('fast')
                }
            },error:function(){
                $('#subform').hide('slow');
                $('#errorform2').show('fast')
            }
        }); //end of ajax
    });
</script>
</body>
</html>
