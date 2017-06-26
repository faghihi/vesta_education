<!DOCTYPE HTML>
<html>

<head>
    <title>UniLearn - Education and Courses Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <link rel="shortcut icon" href="/img/favicon.png">
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
            <h1>خرید دروه</h1>
            <nav class="bread-crumb">
                <a href="/">خانه</a>
                <i class="fa fa-long-arrow-left"></i>
                @if(isset($package))
                    <a href="#"> خرید پکیج {{$package->name}} </a>
                @else
                    <a href="/packages-grid"> خرید پکیج  </a>
                @endif
            </nav>
        </div>
    </div>
</header>

<div class="page-content woocommerce page-receipt page-receipt-final">
    <div class="container clear-fix">
        <!-- Shop -->
        <!--<div class="title clear-fix">-->
        <!--<h2 class="title-main">خرید موفق</h2>-->
        <!--<a href="shop-product-list.html" class="button-back">Back to shopping<i class="fa fa-angle-double-left"></i></a>-->
        <!--</div>-->
        <div id="content" role="main">
            <div class="banner-offer icon-right bg-color-2 final-message">
                <div class="banner-icon"><i class="fa fa-check" aria-hidden="true"></i></div>
                <div class="banner-text" style="text-align: right">خرید با موفقیت به پایان رسید</div>
            </div>
            <hr class="divider-color" />
            <div class="cart-collaterals">
                <!--<div class="shipping_calculator">-->
                <!--<h3>انتخاب بانک</h3>-->
                <!--<div class="shipping-calculator-form">-->
                <!--<p>درگاه بانکی‌ مورد نظر را انتخاب کنید: </p>-->
                <!--<div class="centering">-->
                <!--<div class="bank-pasargad bank">-->
                <!--<img src="img/Pasargad-logo-LimooGraphic.png">-->
                <!--</div>-->
                <!--<div class="bank-saman bank">-->
                <!--<img src="img/saman.png">-->
                <!--</div>-->
                <!--<div class="bank-saman bank">-->
                <!--<img src="img/saman.png">-->
                <!--</div>-->
                <!--</div>-->
                <!--<p>-->
                <!--<button type="submit" name="calc_shipping" value="1" class="cws-button border-radius bt-color-3">پرداخت</button>-->
                <!--</p>-->
                <!--</div>-->
                <!--</div>-->
                <div class="cart_totals">
                    @if(isset($package))
                        <h3>{{$package->name}}</h3>
                    @else
                        <h3>نام درس</h3>
                    @endif
                    <table>
                        <tbody>
                        <!--<tr class="">-->
                        <!--<th>-->
                        <!--Total-->
                        <!--</th>-->
                        <!--<td>Product</td>-->
                        <!--</tr>-->
                        <tr class="cart-subtotal">
                            <th><span class="amount">{{$package->price}}</span><span class="tooman">هزار تومان</span></th>
                            <td>قیمت</td>
                        </tr>
                        <tr class="">
                            <th>
                                <span class="tracking-code">{{$transId}}</span>
                            </th>
                            <td>کد پیگیری</td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="/profile" class="cws-button bt-color-3 border-radius alt">مشاهده پکیج های من</a>
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