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

                <form id="subform" class="form-group">
                    <input type="email" id="submail" name="Email" class="form-control" placeholder="آدرس ایمیل شما">
                    <input type="submit" id="subscribe" data-link="{{ url('/Subscribe') }}"  data-token="{{ csrf_token() }}" class="btn btn-submit" value="عضویت در خبرنامه">
                </form>
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
    </div>
</div>

</body>
</html>
