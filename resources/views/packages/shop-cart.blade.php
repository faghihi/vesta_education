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
            <h1>خرید دوره</h1>
            <nav class="bread-crumb">
                <a href="/">خانه</a>
                <i class="fa fa-long-arrow-left"></i>
                @if(isset($package))
                    <a href="/shop-card-package/{{$package->id}}"> خرید دوره {{$package->title}} </a>
                @else
                    <a href="/packages-grid"> خرید دوره  </a>
                @endif
            </nav>
        </div>
    </div>
</header>

<div class="page-content woocommerce page-receipt">
    <div class="container clear-fix">
        <!-- Shop -->
        <div class="title clear-fix">
            <h2 class="title-main">رسید خرید</h2>
            <a href="/package-grid/{{$package->id}}" class="button-back">بازگشت به درس<i class="fa fa-angle-double-left"></i></a>
        </div>
        <div id="content" role="main">
            <form action="#" method="post">
                <table class="shop_table cart">
                    <thead>
                    <tr>
                        <th class="product-thumbnail">محصول</th>
                        <th class="product-name">&nbsp;</th>
                        <th class="product-price">قیمت</th>
                        <!--<th class="product-quantity">Quantity</th>-->
                        <!--<th class="product-subtotal">Total</th>-->
                        <!--<th class="product-remove">&nbsp;</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="cart_item">
                        <td class="product-thumbnail">
                            <a href="/packagea-grid/{{$package->id}}">
                                @if(isset($package->image))
                                    <img src="{{$package->image}}" data-at2x="/pic/65x65-img-3@2x.jpg" class="attachment-shop_thumbnail wp-post-image" alt="">
                                @else
                                    <img src="/pic/65x65-img-3.jpg" data-at2x="/pic/65x65-img-3@2x.jpg" class="attachment-shop_thumbnail wp-post-image" alt="">
                                @endif
                            </a>
                        </td>
                        <td class="product-name" width="800" >
                            @if(isset($package->title))
                                <a href="/packages-grid/{{$package->id}}">{{$package->title}} </a>
                            @else
                                <a href="/">نام دوره </a>
                            @endif
                        </td>
                        <td class="product-price">
                            <span class="amount">{{$package->price*1000}}<sup>ت</sup></span>
                        </td>
                        <!--<td class="product-quantity">-->
                        <!--<div class="quantity buttons_added">-->
                        <!--<input type="number" step="1" min="0" name="cart" value="1" title="Qty" class="input-text qty text">-->
                        <!--</div>					-->
                        <!--</td>-->
                        <!--<td class="product-subtotal">-->
                        <!--<span class="amount">14500<sup>$</sup></span>		-->
                        <!--</td>-->
                        <!--<td class="product-remove">-->
                        <!--<a href="#" class="remove" title="Remove this item"></a>	-->
                        <!--</td>-->
                    </tr>
                    {{--<tr>--}}
                        {{--<td colspan="6" class="actions">--}}
                            {{--<div class="coupon">--}}
                                {{--<!--<label for="coupon_code">Coupon:</label>-->--}}
                                {{--<button type="button" data-course="{{$package->id}}" data-token="{{ csrf_token() }}" data-link="{{url('/discount_course_compute')}}" class="cws-button corner-radius-bottom  coupon-confirm">تایید کد تخفیف</button>--}}
                                {{--<input type="text" name="coupon_code" class="input-text corner-radius-top" id="coupon_code" value="" placeholder="کد تخفیف خود را وارد کنید...">--}}
                            {{--</div>--}}
                            {{--<div class="coupon-value">--}}
                                {{--<!--<label for="coupon_code">Coupon:</label>-->--}}
                                {{--<button type="button" class="cws-button corner-radius-bottom alt coupon-disable" name="apply_coupon">لغو تخفیف</button>--}}
                                {{--<input type="text" name="coupon_code" class="input-text corner-radius-top" id="coupon_msg" value="شما ۱۵% تخفیف دارید" placeholder="" disabled>--}}
                            {{--</div>--}}
                            {{--<!--<input type="submit" class="cws-button bt-color-3" name="proceed" value="Proceed to Checkout">-->--}}
                            {{--<!--<input type="submit" class="cws-button border-radius bt-color-5" name="update_cart" value="ادامه به خرید">-->--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    </tbody>
                </table>
            </form>
            <hr class="divider-color" />
            <div class="cart-collaterals">
                <div class="shipping_calculator">
                    <h3>انتخاب بانک</h3>
                    <div class="shipping-calculator-form">
                        <p>نحوه ی پرداخت:</p>
                        <div class="how-to-pay-radio-check">
                            <div class="radio">
                                <input type="radio" id="radio1" value="credit-pay" name="pay">
                                <label for="radio1"></label>
                            </div>
                            <span>پرداخت از اعتبار</span>
                            <div class="radio">
                                <input type="radio" id="radio2" value="bank-pay" name="pay">
                                <label for="radio2"></label>
                            </div>
                            <span>پرداخت آنلاین</span>
                        </div>
                        <br>
                        <form action="/buypackage/{{$package->id}}" method="post">
                            <div class="bank-pay">
                                {{--<p>درگاه بانکی‌ مورد نظر را انتخاب کنید: </p>--}}
                                <div class="centering">
                                    {{--<div class="bank-pasargad bank">--}}
                                        <div class="bank-div">
                                            <img src="/img/pay.ir.png">
                                        </div>
                                    {{--</div>--}}

                                    {{--<div class="bank-pasargad bank">--}}
                                        {{--<div class="bank-div">--}}
                                            {{--<img src="/img/com.zarinpal.ewallets.png">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                                <p>
                                    <button type="submit" name="calc_shipping" value="1" class="cws-button border-radius bt-color-3">پرداخت</button>
                                </p>
                            </div>
                            {{csrf_field()}}
                        </form>
                        <div class="credit-pay">
                            <p>اعتبار فعلی شما <span class="profile-amount">
                                    @if(isset($finance->amount))
                                    {{$finance->amount}}
                                        @else
                                    0
                                        @endif
                                </span> تومان میباشد</p>
                            <div class="shop-cart-not-enough-credit-div">
                                <a><i class="fa fa-plus-circle myBtn profile-credit-plus" aria-hidden="true" modal-target="credit-modal"></i></a>
                                <p class="shop-cart-not-enough-credit">متاسفانه اعتبار شما کافی نیست.</p>
                            </div>

                            <div id="credit-modal" class="modal myModal credit-modal">
                                <div class="modal-content credit-modal-content">
                                    <span class="close"> &times; </span>
                                    <div class="profile-credit-modal">
                                        <h3>افزایش اعتبار</h3>
                                        <br>
                                        <br>
                                        <br>
                                        <p>اعتبار فعلی شما : <span class="profile-amount">
                                                 @if(isset($finance->amount))
                                                    {{$finance->amount}}
                                                @else
                                                    0
                                                @endif</span><span class="tooman">هزار تومان</span></p>
                                        <br>
                                        <p>برای افزایش اعتبار مبلغ مورد نظر را در کادر زیر وارد کنید(حداقل ۱۰۰۰ تومان)</p>
                                        <form action="/incr-credit" method="post">
                                            <input name="id" type="hidden" value="{{$package->id}}">
                                            <div class="profile-credit-input">
                                                <input name="credit" autofocus min="1000" type="number" placeholder="مبلغ مورد نظر را وارد کنید...">
                                                <span>تومان</span>
                                            </div>
                                            <br>
                                            <div class="centering">
                                                <div class="bank-div">
                                                    <img src="/img/pay.ir.png">
                                                </div>
                                                {{--<div class="bank-pasargad bank">--}}
                                                    {{--<div class="bank-div">--}}
                                                        {{--<img src="/img/paypal.limoographic.png">--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="bank-pasargad bank">--}}
                                                    {{--<div class="bank-div">--}}
                                                        {{--<img src="/img/com.zarinpal.ewallets.png">--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            </div>
                                            <br>
                                            <button type="submit" class="cws-button bt-color-1 border-radius alt large profile-credit-confirm">تایید افزایش اعتبار</button>
                                            {{csrf_field()}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <form id="packcreditpay" method="post" action="/buypackagecredit/{{$paackage->id}}">
                                {{csrf_field()}}
                            </form>
                            <p>
                                <button form="packcreditpay" type="submit" name="calc_shipping" value="1" class="cws-button border-radius bt-color-3">پرداخت از اعتبار</button>
                            </p>
                        </div>
                    </div>
                </div>
                <!--<div class="cart_totals ">	-->
                <!--<h3>Cart Totals</h3>-->
                <!--<table>-->
                <!--<tbody>-->
                <!--<tr class="cart-subtotal">-->
                <!--<th>Cart Subtotal</th>-->
                <!--<td><span class="amount">$12</span></td>-->
                <!--</tr>-->
                <!--<tr class="shipping">-->
                <!--<th>Shipping</th>-->
                <!--<td>	-->
                <!--Free Shipping		-->
                <!--</td>-->
                <!--</tr>-->
                <!--<tr class="order-total">-->
                <!--<th>Order Total</th>-->
                <!--<td><span class="amount">$12</span></td>-->
                <!--</tr>			-->
                <!--</tbody>-->
                <!--</table>-->
                <!--</div>-->
                <div class="cart_totals">
                    <h3>نام درس</h3>
                    <table>
                        <tbody>
                        <!--<tr class="">-->
                        <!--<th>-->
                        <!--Total-->
                        <!--</th>-->
                        <!--<td>Product</td>-->
                        <!--</tr>-->
                        <tr class="cart-subtotal">
                            <th><span id="before_price" class="amount">{{$package->price}}<span class="tooman">هزار تومان</span></span></th>
                            <td>{{$package->title}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <button></button>
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
<script src="js/jquery.isotope.min.js"></script>

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