<!DOCTYPE HTML>
<html>

<head>
    <title>تایید خرید از اعتبار</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <link rel="shortcut icon" href="/img/logo.ico">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/colorpicker.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/styles.css" />-->
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css" />
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/rs-plugin/css/settings.css" media="screen">
    <link rel="stylesheet" href="/css/Kimia.css">
    <!--styles -->
</head>
<body class="shop">

<header>
    @include('header')
    <div class="page-title">
        <div class="grid-row">
            <h1>Shop Cart</h1>
            <nav class="bread-crumb">
                <a href="/">خانه</a>
            </nav>
        </div>
    </div>
</header>

<div class="page-content woocommerce page-receipt page-receipt-final">
    <div class="container clear-fix">
        <div id="content" role="main">
            <div class="banner-offer icon-right bg-color-2 final-message">
                <div class="banner-icon"><i class="fa fa-check" aria-hidden="true"></i></div>
                <div class="banner-text" style="text-align: right">افزایش اعتبار با موفقیت انجام شد</div>
            </div>
            <hr class="divider-color" />
            <div class="cart-collaterals">
                <div class="cart_totals">
                    {{--<h3>نام درس</h3>--}}
                    <table>
                        <tbody>
                        <tr class="cart-subtotal">
                            <th><span class="amount">{{$amount}}</span><span class="tooman">تومان</span></th>
                            <td>مقدار اعتبار خریداری شده</td>
                        </tr>
                        <tr class="">
                            <th>
                                <span class="tracking-code">{{$transId}}</span>
                            </th>
                            <td>کد پیگیری</td>
                        </tr>
                        <tr class="order-total">
                            <th><span class="amount">{{$finance}}<span class="tooman">هزار تومان</span></span></th>
                            <td>اعتبار فعلی</td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="/profile" class="cws-button bt-color-3 border-radius alt">بازگشت به پروفایل</a>
                </div>
            </div>
        </div>
        <!--Shop -->
    </div>
</div>
@include('footer')
<script src="/js/jquery.min.js"></script>
<script type='text/javascript' src='/js/jquery.validate.min.js'></script>
<script src="/js/jquery.form.min.js"></script>
<script src="/js/TweenMax.min.js"></script>
<script src="/js/main.js"></script>
<!-- jQuery REVOLUTION Slider  -->
<script type="text/javascript" src="/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<!-- REVOLUTION BANNER CSS SETTINGS -->
<script src="/js/jquery.isotope.min.js"></script>

<script src="/js/owl.carousel-v2.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/jflickrfeed.min.js"></script>
<script src="/js/jquery.tweet.js"></script>
<!--<script type='text/javascript' src='tuner/js/colorpicker.js'></script>-->
<!--<script type='text/javascript' src='tuner/js/scripts.js'></script>-->
<script src="/js/jquery.fancybox.pack.js"></script>
<script src="/js/jquery.fancybox-media.js"></script>
<script src="/js/retina.min.js"></script>
<script src="/js/Kimia.js"></script>
</body>

</html>