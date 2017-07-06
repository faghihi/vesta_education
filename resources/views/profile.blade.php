<!DOCTYPE HTML>
<html>

<head>
    <title> پروفایل وستاکمپ </title>
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
    <link rel="stylesheet" type="text/css" href="/css/Profile.css">
    <link rel="stylesheet" type="text/css" href="/css/select2.css">
    <!--<link href="css/select2.min.css" rel="stylesheet" />-->
    <link rel="stylesheet" type="text/css" href="/css/Kimia.css">


    <!--styles -->
</head>
<body class="">
<!-- header -->
<header>
    <!-- menu -->
    @include('header')
    <!-- / menu -->
    <!-- page title -->
    <div class="page-title">
        <div class="grid-row">
            <h1>پروفایل</h1>
            <nav class="bread-crumb">
                <a href="/">خانه</a>
                <i class="fa fa-long-arrow-left"></i>
                <a href="/profile">پروفایل</a>
                <!--<i class="fa fa-long-arrow-left"></i>-->
                <!--<a href="#">Pages</a>-->
                <!--<i class="fa fa-long-arrow-left"></i>-->
                <!--<a href="#">profile</a>-->
            </nav>
        </div>
    </div>
    <!-- / page title -->
</header>
<!-- / header -->

<div class="page-content container clear-fix">

    <div class="grid-col-row">
        <div class="grid-col grid-col-3 sidebar profile-sidebar">

            <div class="profile-img-div">
                <?php $img='/pic/260x290-img-2.jpg'?>
                @if(isset($user->image))
                    <?php $img=$user->image?>
                @endif
                <img src="{{$img}}" class="border-img img-float-left picture profile-img" alt>
            </div>
            <article class="clear-fix">
                <h4 id="NameFamilylbl">
                    @if(isset($user))
                        {{$user->name}}
                    @else
                        نام و نام خانوادگی
                    @endif
                </h4>
                <hr class="" />
            </article>
            <!-- / types input -->
            <hr/>
            <div class="profile-credit-div">
                <span class="profile-credit">: اعتبار </span>
                <a>
                    <i class="fa fa-plus-circle myBtn profile-credit-plus" aria-hidden="true" modal-target="credit-modal"></i>
                </a>
                &nbsp;&nbsp;
                <span class="profile-tomaan">هزار تومان</span>
                @if(isset($finance->amount))
                    <span class="profile-amount">{{$finance->amount}}</span>
                @else
                    <span class="profile-amount">0</span>
                @endif


                <!--<div id="credit-modal" class="modal myModal">-->
                <!--<div class="modal-content">-->
                <!--<span class="close"> &times; </span>-->
                <!--<div class="profile-credit-modal">-->
                <!--<h3>افزایش اعتبار</h3>-->
                <!--<br>-->
                <!--<br>-->
                <!--<br>-->
                <!--<p>اعتبار فعلی شما :<span class="profile-amount">10000000</span></p>-->
                <!--<br>-->
                <!--<p>for the blahbidi blah blah, do the bluh and get your bludy bluh</p>-->
                <!--<p class="profile-credit-input"><input type="text" placeholder="مبلغ مورد نظر را وارد کنید...">ریال</p>-->
                <!--</div>-->
                <!--</div>-->
                <!--</div>-->

            </div>

            <aside class="widget-navigation profile-side-menu">
                <h2>منوی پروفایل</h2>
                <ul>
                    <li><a class="profile-side-menu-js" href="#side-menu-1">مشخصات</a></li>
                    <li><a class="profile-side-menu-js" href="#side-menu-2">درس‌های من</a></li>
                    <li><a class="profile-side-menu-js" href="#side-menu-3">پکیج‌های من</a></li>
                    <!--<li><a href="#">Sample Page 4</a></li>-->
                    <!--<li><a href="#">Sample Page 5</a></li>-->
                </ul>
            </aside>
        </div>


        <div class="grid-col grid-col-9 profile-main">
            <main>
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
                                    @endif
                                </span><span class="tooman">هزار تومان</span></p>
                            <br>
                            <p>برای افزایش اعتبار مبلغ مورد نظر را در کادر زیر وارد کنید(مبالغ بالای ۱۰۰۰ تومان قابل قبول است)</p>
                            <form action="/incr-credit" method="post">
                                <div class="profile-credit-input">
                                    <input type="number" name="credit" placeholder="مبلغ مورد نظر را وارد کنید..." min="1000" autofocus required>
                                    <span>تومان</span>
                                </div>
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
                                <button type="submit" class="cws-button bt-color-1 border-radius alt large profile-credit-confirm" value="1">تایید افزایش اعتبار</button>
                                {{csrf_field()}}
                            </form>
                        </div>
                    </div>
                </div>

                <section class="clear-fix">
                    <!-- tabs -->
                    @if ($errors->any())
                        <div class="info-boxes alt error-message">
                            <div class="info-box-icon"><i class="fa fa-check"></i></div>
                            @foreach ($errors->all() as $error)
                                <p>
                                {{ $error }}
                                </p>
                            @endforeach
                            <div class="close-button"></div>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="info-boxes alt confirmation-message">
                            <div class="info-box-icon"><i class="fa fa-check"></i></div>
                                <p>
                                    {{session('success')}}
                                </p>
                            <div class="close-button"></div>
                        </div>
                    @endif

                    @if($errs)
                            <div class="info-boxes alt error-message">
                                <div class="info-box-icon"><i class="fa fa-times"></i></div>
                                <p >مشکلی در عکس وجود دارد.</p>
                                <div class="close-button"></div>
                            </div>
                    @endif
                    @if($sucess)
                            <div class="info-boxes alt confirmation-message">
                                <div class="info-box-icon"><i class="fa fa-check"></i></div>
                                <p style="color: green">تغییر عکس انجام شد.</p>
                                <div class="close-button"></div>
                            </div>

                    @endif
                    <div  id="side-menu-1" class="tabs">

                        <div id="profile-tabs" class="block-tabs-btn clear-fix">
                            <div class="profile-tabs-face tabs-btn active" id="tab1" data-tabs-id="tabs1"><span>مشخصات</span>
                                <i class="fa fa-file fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="profile-tabs-face tabs-btn" id="tab2" data-tabs-id="tabs2"><span> پیام ها</span>
                                <i class="fa fa-comment fa-2x" aria-hidden="true"></i>
                            </div>
                            {{--<div class="profile-tabs-face tabs-btn" id="tab6" data-tabs-id="tabs3"><span>تخفیف ها</span>--}}
                                {{--<i class="fa fa-ticket fa-2x" aria-hidden="true"></i>--}}
                            {{--</div>--}}
                            <div class="profile-tabs-face tabs-btn" id="tab5" data-tabs-id="tabs5"><span> تغییر رمز</span>
                                <i class="fa fa-unlock-alt fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="profile-tabs-face tabs-btn" id="tab3" data-tabs-id="tabs3"><span>علاقه مندی</span>
                                <i class="fa fa-heart fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="profile-tabs-face tabs-btn" id="tab4" data-tabs-id="tabs4"><span>مدارک</span>
                                <i class="fa fa-folder-open fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="profile-tabs-face tabs-btn" id="tab7" data-tabs-id="tabs7"><span>دعوت دوستان</span>
                                <i class="fa fa-handshake-o fa-2x" aria-hidden="true"></i>
                            </div>
                        </div>
                        <!-- tabs keeper -->
                        <div class="tabs-keeper" >
                            <!-- tabs container -->
                            <div class="container-tabs active" data-tabs-id="cont-tabs1" style="max-height:500px">
                                <div class="info-form">
                                    <h3>اطلاعات شما:</h3>
                                    <form action="/profile-edit"  method="get" novalidate="novalidate">
                                        @if (session('status'))
                                            <div class="info-boxes confirmation-message">
                                                <div class="info-box-icon"><i class="fa fa-check"></i></div>
                                                {{ session('status') }}
                                                <div class="close-button"></div>
                                            </div>
                                        @endif
                                        @if (session('warning'))
                                                <div class="info-boxes alt warning-message">
                                                    <div class="info-box-icon"><i class="fa fa-exclamation"></i></div>
                                                    {{ session('warning') }}
                                                    <div class="close-button"></div>
                                                </div>
                                        @endif
                                        <div class="contact-form">
                                        <p>
                                            <span class="your-name">
                                                {{--<input id="inp" class="info-form-input" type="text" name="name" value="@if(isset($user)){{$user->name}}@else  name @endif" size="40" placeholder="@if(isset($user))--}}
                                                {{--{{$user->name}}--}}
                                                {{--@else--}}
                                                        {{--نام و نام خانوادگی--}}
                                                    {{--@endif" aria-invalid="false" >--}}
                                                <input id="inp" class="info-form-input" type="text" name="name" value="{{$user->name}}" size="40" placeholder="{{$user->name}}" aria-invalid="false" disabled="disabled">
                                            </span>
                                        </p>
                                        <p class="form-tel">
                                        <p>
                                            <span class="your-name">
                                                <!--<a class="profile-info" href="#"><i class="fa fa-pencil-square-o"></i></a>-->
                                                {{--<input type="text" class="info-form-input" name="mobile" value="@if(isset($user)){{$user->mobile}}@else  mobile @endif" size="40" placeholder="@if(isset($user))--}}
                                                {{--{{$user->mobile}}--}}
                                                {{--@else--}}
                                                        {{--موبایل--}}
                                                    {{--@endif" aria-invalid="false" >--}}
                                                <input type="text" class="info-form-input" name="mobile" value="{{$user->mobile}}" size="40" placeholder="{{$user->mobile}}" aria-invalid="false" disabled="disabled">
                                            </span>
                                        </p>
                                        <p class="form-tel" style="float: right;">
                                            <span class="your-name">
                                                <!--<a class="profile-info" href="#"><i class="fa fa-pencil-square-o"></i></a>-->
                                                {{--<input type="text" class="info-form-input" name="name" value="" size="40" placeholder="شماره تلفن ثابت شما..." aria-invalid="false" disabled="disabled">--}}
                                            </span>
                                        </p>
                                        <p>
                                            <span class="your-email">
                                                <!--<a class="profile-info" href="#"><i class="fa fa-pencil-square-o"></i></a>-->
                                                {{--<input type="text" class="info-form-input" name="email" value="@if(isset($user)){{$user->email}}@else  email @endif" size="40" placeholder="@if(isset($user))--}}
                                                {{--{{$user->email}}--}}
                                                {{--@else--}}
                                                        {{--ایمیل--}}
                                                    {{--@endif" aria-invalid="false" >--}}
                                                <input type="text"  name="email" value="{{$user->email}}" size="40" placeholder="{{$user->email}}" aria-invalid="false" disabled="disabled">
                                            </span>
                                        </p>
                                        </div>
                                        <br>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-button">
                                            <input id="edit" class="cws-button bt-color-1 border-radius alt large profile-info profile-button" value="ویرایش">
                                            <input type="submit" class="cws-button bt-color-2 border-radius alt large confirm-button profile-button" value="ثبت ویرایش">
                                        </div>
                                    </form>
                                </div>
                                <div class="profile-favorite">
                                    <label  for="profile-input">
                                        <!--<label id="TagLable">-->
                                        <form action="/profile-image-change" method="post" enctype="multipart/form-data">
                                            {{--<label class="custom-file-upload info-form-input">
                                                <input type="file" name="image">
                                                --}}{{--<input type="button" id="edit" class="cws-button bt-color-2 border-radius alt small profile-info profile-button" value="تغییر عکس">--}}{{--
                                            </label>--}}
                                            <input class="custom-file-upload info-form-input" id="uploadFile" name="image" placeholder="Choose File" disabled="disabled" />

                                            <br><br>
                                            <div class="form-button">
                                                <div class="fileUpload cws-button bt-color-2 border-radius small">
                                                    <span>Upload</span>
                                                    <input id="uploadBtn" name="image" type="file" class="upload" />
                                                </div>
                                                <input type="submit" id="edit" class="cws-button bt-color-2 border-radius alt small profile-info profile-button" value="تغییر عکس">
                                            </div>
                                            {{csrf_field()}}
                                        </form>
                                    </label>

                                </div>


                            </div>
                            <!--/tabs container -->

                            <!-- tabs container -->
                            <div class="container-tabs" data-tabs-id="cont-tabs3" style="max-height:500px">
                                <div class="profile-favorite">
                                    <label id="TagLable" for="profile-input">
                                        <!--<label id="TagLable">-->
                                        <span class="profile-title">علاقه مندی ها:</span>
                                        <form action="/profile-update" method="get" novalidate="novalidate">
                                            <select id="profile-input" class="js-example-basic-multiple" multiple="multiple" name="tags[]" style="width: 100%" >
                                                <!--<select class="js-example-basic-multiple" multiple="multiple">-->
                                                @foreach($tags as $tag)
                                                    @if(in_array($tag->id,$fav))
                                                     <option selected name="{{$tag->tag_name}}">{{$tag->tag_name}}</option>
                                                    @else
                                                        <option name="{{$tag->tag_name}}">{{$tag->tag_name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        <br><br>
                                            <div class="form-button">
                                                <input type="submit" id="edit" class="cws-button bt-color-1 border-radius alt large profile-info profile-button" value="به روز رسانی">
                                            </div>
                                        </form>
                                    </label>

                                </div>
                            </div>
                            <!--/tabs container -->

                            <!-- tabs container -->
                            <div class="container-tabs profile-message" data-tabs-id="cont-tabs2">
                                @foreach($messages as $message)
                                    <div>
                                        <img class="profile-message-img" height="30" width="50" src="/img/logo.png" alt>
                                        <span class="message-preview">
                                            {{$message->subject}}
                                        </span>
                                    </div>


                                    <button id="myBtn1" class="cws-button border-radius alt smaller myBtn" modal-target="modal1">خواندن پیام</button>
                                    <br><br><hr><br>
                                    <div id="modal1" class="modal myModal">
                                        <div class="modal-content">
                                            <span class="close"> &times; </span>
                                            <div class="profile-message-content">
                                                <div class="quotes clear-fix">
                                                    <div class="quote-avatar-author clear-fix"><img src="/img/logo.png" width="100" height="100">{{--<div class="author-info">وستا کمپ</div>--}}</div>
                                                    <q><b>پیام ارسالی توسط ادمین</b><br/>
                                                        {{$message->text}}
                                                    </q>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                                <br>
                                <br>

                                {{--<div class="page-pagination clear-fix">--}}
                                    {{--<a href="#"><i class="fa fa-angle-double-left"></i></a><!----}}
								{{----><a href="#">1</a><!----}}
								{{----><a href="#">2</a><!----}}
								{{----><a href="#" class="active">3</a><!----}}
								{{----><a href="#"><i class="fa fa-angle-double-right"></i></a>--}}
                                {{--</div>--}}


                            </div>
                            <!--/tabs container -->

                            <!-- tabs container -->
                            <div class="container-tabs profile-table" data-tabs-id="cont-tabs4">
                                <div id="profile-table" class="datagrid">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>ردیف</th>
                                            <th>دوره</th>
                                            {{--<th>نام استاد</th>--}}
                                            <th>نمره</th>
                                            {{--<th>تاریخ اتمام</th>--}}
                                            <th>وضعیت</th>
                                            {{--<th>درخواست مدرک</th>--}}
                                            <!--<th>اعمال</th>-->
                                        </tr>
                                        </thead>
                                        <!--<tfoot>-->
                                        <!--<tr>-->
                                        <!--<td colspan="6">-->
                                        <!--<div id="no-paging">&nbsp;</div>-->
                                        <!--</tr>-->
                                        <!--</tfoot>-->
                                        <tbody>
                                        <?php
                                                $i=1;
                                        ?>
                                        @foreach($certifications as $cf)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td><a href="/course-grid/{{$cf->id}}">{{$cf['course_name']}}</a></td>
                                            {{--<td>روشنک میرزایی</td>--}}
                                            <td>{{$cf->pivot->score}}</td>
                                            {{--<td>96/3/1</td>--}}
                                            <td>@if($cf->pivot->score >= 70) قبول @else مردود@endif</td>
                                            {{--<td>--}}
                                                {{--<button class="status-deactive">غیرفعال</button>--}}
                                            {{--</td>--}}
                                        </tr>
                                            <?php
                                                    $i++;
                                            ?>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--/tabs container -->

                            <!-- tabs container -->
                            <div class="container-tabs profile-table" data-tabs-id="cont-tabs5">
                                <div class="info-form">
                                    <h3>تغییر رمز عبور:</h3>
                                    <form action="/changepass"  method="post" onsubmit="return CheckNewPass()">
                                        {{csrf_field()}}
                                        <p>
                                            <span class="your-name">
                                                <input class="info-form-input" required id="OldPass" type="password" name="oldpassword" value="" size="40" placeholder="رمز فعلی..." aria-invalid="false">
                                            </span>
                                        </p>
                                        <br>
                                        <p>
                                            <span class="your-email">
                                                <input type="password" required id="NewPass" class="info-form-input" name="password" value="" size="40" placeholder="رمز جدید..." aria-invalid="false">
                                            </span>
                                        </p>
                                        <p>
                                            <span class="your-email">
                                                <input type="password" required id="ReNewPass" class="info-form-input" name="repassword" value="" size="40" placeholder="تکرار رمز جدید..." aria-invalid="false">
                                            </span>
                                        </p>
                                        <div id="errorpsw" class="info-boxes alt error-message">
                                            <div class="info-box-icon"><i class="fa fa-times"></i></div>
                                            <p>ایرادی در رمز و تکرار آن است.</p>
                                            <div class="close-button"></div>
                                        </div>


                                        <div class="form-button">
                                            <input type="submit" id="passchangesubmit" class="cws-button bt-color-1 border-radius alt large profile-info profile-button" value="تغییر">

                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!--/tabs container -->

                            <!-- tabs container -->
                            <div class="container-tabs profile-table profile-subscribe" data-tabs-id="cont-tabs7">
                                <!--<div class="profile-subscribe">-->
                                <!--<form class="subscribe">-->
                                <!--<input type="text" name="email" value="" size="40" placeholder="Enter your email" aria-required="true"><input type="submit" value="ارسال">-->
                                <!--</form>-->
                                <!--</div>-->

                                <div class="desc">
                                    <h4>دوستاتو دعوت کن بیان وستاکمپ. علاوه براینکه باهم تو کلاسا شرکت میکنید با هر خریدش یک هدیه از وستاکمپ میگیرید. <i class="fa fa-smile-o" aria-hidden="true"></i></h4>
                                </div>

                                <br>

                                <form class="message-form clear-fix" method="post" action="/invite">
                                    <p class="message-form-subject">
                                        <input id="subject" name="email" type="text" value="" size="30" aria-required="true" placeholder="ایمیل دوستت..." required>
                                    </p>
                                    <p class="message-form-author">
                                        <input id="author" name="author" type="text" value="" size="30" aria-required="true" placeholder="نام دوستت..." required>
                                    </p>
                                    {{--<p class="message-form-message">
                                        <textarea id="message" name="message" cols="45" rows="8" aria-required="true" placeholder="سلام دوست خوبم،&#10چند وقته از سایت vestaak استفاده می‌کنم، خیلی‌ باحاله!&#10تو هم بیا!"></textarea>
                                    </p>--}}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <p class="form-submit rectangle-button green medium center-text" style="float: none">
                                        <input class="cws-button border-radius bt-color-2 alt" name="submit" type="submit" id="submit" value="دعوت">
                                    </p>
                                </form>

                                <div class="datagrid">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>ایمیل</th>
                                            <th style="width: 30%; text-align: center;">وضعیت</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($invitations as $in)
                                            <tr>
                                                <td>{{$in->email}}</td>
                                                <td>
                                                    <div class="status-active">عضو شده</div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @foreach($allinvited as $in)
                                            <tr>
                                                <td>{{$in->email}}</td>
                                                <td>
                                                    <div class="status-deactive">عضو نشده</div>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--/tabs container -->
                            <!--<div class="container-tabs profile-contact-us" data-tabs-id="cont-tabs4"><strong>Maecenas aliquam risus et neque euismod, vel luctus nulla tincidunt.</strong><br /> Praesent ut dui sit amet ipsum scelerisque rhoncus.<br /><br /> Vivamus eu porttitor lectus. Nullam varius lacinia congue. Donec ac dapibus elit. Proin facilisis nulla in est mattis, ut dapibus justo.Cras porta dictum condimentum. Nulla magna erat, facilisis non velit eu, suscipit bibendum quam. Phasellus sit amet viverra neque.</div>-->
                            <!--/tabs container -->
                            <!--/tabs keeper -->
                        </div>
                    </div>
                    <!-- /tabs -->
                </section>

                <!-- courses -->
                <hr id="side-menu-2-hr" class="divider-color" />
                <section id="side-menu-2" class="profile-courses">
                    <!-- carousel -->
                    <div class="widget-popular carousel-container">
                        <div class="title-carousel">
                            <h2>درس‌های من</h2>
                            <p>(برای دیدن QR-کد درس موس خود را روی عکس درس نگاه دارد, و علامت QR-کد را کلیک کنید)</p>
                            <!-- carousel navigation -->
                            <div class="carousel-nav">
                                <div class="carousel-button">
                                    <div class="prev"><i class="fa fa-angle-left"></i></div>
                                    <div class="next"><i class="fa fa-angle-right"></i></div>
                                </div>
                            </div>
                            <!-- / carousel navigation -->
                        </div>
                        <!-- carousel items -->
                        <div class="grid-col-row left-margin-none">
                            <div class="owl-carousel owl-three-item">
                                @foreach($courses as $course)
                                <div class="gallery-item course-item">
                                    <div class="popular-item">
                                        <div class="picture">
                                            <div class="hover-effect"></div>
                                            <div class="link-cont">
                                                <a href="{{$course->pivot->QRCodeFile}}" class="cws-left fancy fa fa-qrcode" title="QR code"></a>
                                                <a href="/courses-grid/{{$course->id}}" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                            </div>
                                            <?php $img='/pic/sampleback.jpg'?>
                                            @if(isset($course->image))
                                                <?php $img=Voyager::image($course->image)?>
                                            @endif
                                            <img src="{{$img}}" alt>
                                        </div>
                                        <div class="course-name clear-fix">
                                            <span class="price"> {{$course->price}} ت</span>
                                            <h3><a href="/courses-grid/{{$course->id}}">{{$course->course->name}}</a></h3>
                                        </div>
                                        <div class="course-date bg-color-3 clear-fix">
                                            <div class="day"><i class="fa fa-calendar"></i>{{$course->start_date}}</div><div class="time"><i class="fa fa-clock-o"></i>{{$course->time}}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- / carousel items -->
                    </div>
                    <!-- / carousel -->
                </section>
                <!-- /courses-->

                <section id="side-menu-3" class="profile-packages">
                    <div class="carousel-container">
                        <div class="title-carousel">
                            <h2>پکیج‌های من</h2>
                            <div class="carousel-nav">
                                <div class="carousel-button">
                                    <div class="prev"><i class="fa fa-angle-left"></i></div>
                                    <div class="next"><i class="fa fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-col-row left-margin-none">
                            <div class="owl-carousel owl-two-item">
                                @foreach($packages as $package)
                                <div class="gallery-item">
                                    <div class="item-instructor bg-color-5">
                                        <div class="info-box">
                                            <h3>{{$package->title}}</h3>
                                            <div class="divider"></div>
                                            <p>{{$package->description}}</p>
                                            <a href="/packages-grid/{{$package->id}}" class="cws-button bt-color-6 border-radius alt smaller margin-bottom profile-packages-button">اطلاعات بیشتر</a>

                                            <a  href="{{$package->pivot->QRCodeFile}}" title="QR code" class="cws-button fancy bt-color-6 border-radius alt smaller margin-bottom profile-packages-button">QR-code</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>

            </main>
        </div>
    </div>
</div>
<!--footer-->
@include('footer')
<!--footer-->
<script src="/js/jquery.min.js"></script>
<script type='text/javascript' src='/js/jquery.validate.min.js'></script>
<script src="/js/jquery.form.min.js"></script>
<script src="/js/TweenMax.min.js"></script>
<script src="/js/main.js"></script>
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
<!--<script src="js/profile-add-tags.js"></script>-->
<script src="/js/select2.js"></script>
<!--<script src="js/select2.min.js"></script>-->
<script src="/js/Kimia.js"></script>

</body>

</html>
