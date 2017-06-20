<!DOCTYPE HTML>
<html>

<head>
    <title>پروفایل</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->

    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/colorpicker.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/styles.css" />-->
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" />
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/Profile.css">
    <link rel="stylesheet" type="text/css" href="css/select2.css">
    <!--<link href="css/select2.min.css" rel="stylesheet" />-->
    <link rel="stylesheet" type="text/css" href="css/Kimia.css">


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
                <a href="index-with-search.html">خانه</a>
                <i class="fa fa-long-arrow-left"></i>
                <a href="profile-v2.html">پروفایل</a>
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
                <img src="pic/260x290-img-2.jpg" class="border-img img-float-left picture profile-img" alt>
            </div>
            <article class="clear-fix">
                <h4 id="NameFamilylbl"> نام و نام خانوادگی </h4>
                <hr class="" />
            </article>
            <!-- / types input -->
            <hr/>
            <div class="profile-credit-div">
                <span class="profile-credit">: اعتبار </span>
                <a><i class="fa fa-plus-circle myBtn profile-credit-plus" aria-hidden="true" modal-target="credit-modal"></i></a>
                <span class="profile-amount">۱۰۰۰</span>
                <span class="profile-tomaan"> هزار تومان </span>

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
                            <p>اعتبار فعلی شما : <span class="profile-amount">10000000</span><span class="tooman">تومان</span></p>
                            <br>
                            <p>برای افزایش اعتبار مبلغ مورد نظر را در کادر زیر وارد کنید</p>
                            <div class="profile-credit-input">
                                <input type="text" placeholder="مبلغ مورد نظر را وارد کنید...">
                                <span>تومان</span>
                            </div>
                            <br>
                            <div class="centering">
                                <div class="bank-pasargad bank">
                                    <div class="bank-div">
                                        <img src="img/paypal.limoographic.png">
                                    </div>
                                </div>
                                <div class="bank-pasargad bank">
                                    <div class="bank-div">
                                        <img src="img/com.zarinpal.ewallets.png">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button class="cws-button bt-color-1 border-radius alt large profile-credit-confirm">تایید افزایش اعتبار</button>
                        </div>
                    </div>
                </div>

                <section class="clear-fix">
                    <!-- tabs -->
                    <div  id="side-menu-1" class="tabs">
                        <div id="profile-tabs" class="block-tabs-btn clear-fix">
                            <div class="profile-tabs-face tabs-btn active" id="tab1" data-tabs-id="tabs1">مشخصات
                                <i class="fa fa-file fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="profile-tabs-face tabs-btn" id="tab2" data-tabs-id="tabs2">  پیام ها
                                <i class="fa fa-comment fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="profile-tabs-face tabs-btn" id="tab3" data-tabs-id="tabs3">تخفیف ها
                                <i class="fa fa-ticket fa-2x" aria-hidden="true"></i>
                            </div>
                            <!--<div class="profile-tabs-face tabs-btn" id="tab4" data-tabs-id="tabs4"> تماس با ما-->
                            <!--<i class="fa fa-phone fa-2x" aria-hidden="true"></i>-->
                            <!--</div>-->
                        </div>
                        <!-- tabs keeper -->
                        <div class="tabs-keeper">
                            <!-- tabs container -->
                            <div class="container-tabs active" data-tabs-id="cont-tabs1">
                                <div class="info-form">
                                    <h3>اطلاعات شما:</h3>
                                    <form action="" class="contact-form" method="post" novalidate="novalidate">
                                        <p>

                                            <span class="your-name">
                                                <input id="inp" class="info-form-input" type="text" name="name" value="" size="40" placeholder="نام شما..." aria-invalid="false" disabled="disabled">
                                            </span>
                                        </p>
                                        <p class="form-tel">
                                            <span class="your-name">
                                                <!--<a class="profile-info" href="#"><i class="fa fa-pencil-square-o"></i></a>-->
                                                <input type="text" class="info-form-input" name="name" value="" size="40" placeholder="شماره تلفن همراه شما..." aria-invalid="false" disabled="disabled">
                                            </span>
                                        </p>
                                        <p class="form-tel" style="float: right;">
                                            <span class="your-name">
                                                <!--<a class="profile-info" href="#"><i class="fa fa-pencil-square-o"></i></a>-->
                                                <input type="text" class="info-form-input" name="name" value="" size="40" placeholder="شماره تلفن ثابت شما..." aria-invalid="false" disabled="disabled">
                                            </span>
                                        </p>
                                        <p>
                                            <span class="your-email">
                                                <!--<a class="profile-info" href="#"><i class="fa fa-pencil-square-o"></i></a>-->
                                                <input type="text" class="info-form-input" name="phone" value="" size="40" placeholder="ایمیل شما..." aria-invalid="false" disabled="true">
                                            </span>
                                        </p>
                                    </form>
                                    <div class="form-button">
                                        <button id="edit" class="cws-button bt-color-1 border-radius alt large profile-info profile-button">ویرایش</button>
                                        <button class="cws-button bt-color-2 border-radius alt large confirm-button profile-button">ثبت ویرایش</button>
                                    </div>

                                </div>

                                <br>
                                <br>

                                <div class="profile-favorite">
                                    <label id="TagLable" for="profile-input">
                                        <!--<label id="TagLable">-->
                                        <span class="profile-title">علاقه مندی ها:</span>
                                        <br>
                                        <br>
                                        <select id="profile-input" class="js-example-basic-multiple" multiple="multiple" style="width: 100%" >
                                            <!--<select class="js-example-basic-multiple" multiple="multiple">-->
                                            <option value="AL">Alabama</option>
                                            <option value="BB">belabela</option>
                                            <option value="CC">corecore</option>
                                            <option value="WY">Wyoming</option>
                                            <option value="AL">Alabama123</option>
                                            <option value="BB">belabela123</option>
                                            <option value="CC">corecore123</option>
                                            <option value="WY">Wyoming123</option>
                                        </select>
                                    </label>
                                </div>

                            </div>
                            <!--/tabs container -->

                            <!-- tabs container -->
                            <div class="container-tabs profile-message" data-tabs-id="cont-tabs2">
                                <div>
                                    <img class="unseen profile-message-img" src="pic/75x75-img-1.jpg" data-at2x="pic/370x270-img-4@2x.jpg" alt>
                                    <span class="message-preview">
                                        neque euismod, vel luctus nulla tincidunt. Praesent ut dui sit amet ipsum scelerisque rhoncus. Vivamus eu porttitor lectus.
                                        Nullam varius lacinia congue. Donec ac dapibus elit. Proin facilisis nulla in est mattis, ut dapibus justo euismod.
                                        Proin sollicitudin a mivel fermentum.
                                    </span>
                                </div>


                                <button id="myBtn1" class="cws-button border-radius alt smaller myBtn" modal-target="modal1">read more</button>


                                <br>
                                <br>

                                <hr>

                                <br>

                                <div id="modal1" class="modal myModal">
                                    <div class="modal-content">
                                        <span class="close"> &times; </span>
                                        <div class="profile-message-content">
                                            <div class="quotes clear-fix">
                                                <div class="quote-avatar-author clear-fix"><img src="pic/60x60-img-2.jpg" data-at2x="pic/60x60-img-2@2x.jpg" alt><div class="author-info">Jasica Doe<br/><span>Writer</span></div></div>
                                                <q><b>Vestibulum et metus a tellus sagittis</b><br/>
                                                    Praesent sagittis magna nec neque viverra lobortis. Quisque tincidunt tortor ac nisl elementum, a congue dui vestibulum Sed nisl nisl, faucibus non eros ac, posuere pulvinar sem. Quisque volutpat tortor nec malesuada ullamcorper donec a elit non elit vehicula fermentum.
                                                </q>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div>
                                    <img class="profile-message-img" src="pic/75x75-img-1.jpg" data-at2x="pic/370x270-img-4@2x.jpg" alt>
                                    <span class="message-preview">
                                        neque euismod, vel luctus nulla tincidunt. Praesent ut dui sit amet ipsum scelerisque rhoncus. Vivamus eu porttitor lectus.
                                        Nullam varius lacinia congue. Donec ac dapibus elit. Proin facilisis nulla in est mattis, ut dapibus justo euismod.
                                        Proin sollicitudin a mivel fermentum.
                                    </span>
                                </div>

                                <button id="myBtn2" class="cws-button border-radius alt smaller myBtn" modal-target="modal2">read more</button>

                                <div id="modal2" class="modal myModal">
                                    <div class="modal-content">
                                        <span class="close"> &times; </span>
                                        <div class="profile-message-content">
                                            <div class="quotes clear-fix">
                                                <div class="quote-avatar-author clear-fix"><img src="pic/60x60-img-2.jpg" data-at2x="pic/60x60-img-2@2x.jpg" alt><div class="author-info">Jasica Doe<br/><span>Writer</span></div></div>
                                                <q><b>Vestibulum et metus a tellus sagittis</b><br/>
                                                    Praesent sagittis magna nec neque viverra lobortis. Quisque tincidunt tortor ac nisl elementum, a congue dui vestibulum Sed nisl nisl, faucibus non eros ac, posuere pulvinar sem. Quisque volutpat tortor nec malesuada ullamcorper donec a elit non elit vehicula fermentum.
                                                </q>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <br>

                                <div class="page-pagination clear-fix">
                                    <a href="#"><i class="fa fa-angle-double-left"></i></a><!--
								--><a href="#">1</a><!--
								--><a href="#">2</a><!--
								--><a href="#" class="active">3</a><!--
								--><a href="#"><i class="fa fa-angle-double-right"></i></a>
                                </div>


                            </div>
                            <!--/tabs container -->

                            <!-- tabs container -->
                            <div class="container-tabs profile-table" data-tabs-id="cont-tabs3">
                                <div id="profile-table" class="datagrid">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>ردیف</th>
                                            <th>نام</th>
                                            <th>کد تخفیف</th>
                                            <th>مقدار تخفیف</th>
                                            <th>انقضا</th>
                                            <th>وضعیت</th>
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
                                        <tr>
                                            <td>1</td>
                                            <td>اسمی نسبتا بلند</td>
                                            <td>ogGM_pzr3ybW</td>
                                            <td>5٪</td>
                                            <td>96/2/1</td>
                                            <td>
                                                <div class="status-active">فعال</div>
                                            </td>
                                            <!--<td class="profile-edit">-->
                                            <!--<a href="#"><i class="fa fa-pencil-square-o"></i>ویرایش</a>-->
                                            <!--</td>-->
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>خانواده رجبی</td>
                                            <td>Gd+CsYxn8_PE</td>
                                            <td>10٪</td>
                                            <td>96/3/1</td>
                                            <td>
                                                <div class="status-deactive">غیرفعال</div>
                                            </td>
                                            <!--<td class="profile-edit">-->
                                            <!--<a href="#"><i class="fa fa-pencil-square-o"></i>ویرایش</a>-->
                                            <!--</td>-->
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--/tabs container -->

                            <!-- tabs container -->
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
                                <div class="gallery-item course-item">
                                    <div class="popular-item">
                                        <div class="picture">
                                            <div class="hover-effect"></div>
                                            <div class="link-cont">
                                                <a href="#" class="cws-left fancy fa fa-qrcode" title="QR code"></a>
                                                <a href="pic/370x270-img-3%402x.jpg" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                            </div>
                                            <img src="pic/270x200-img-5.jpg" data-at2x="pic/270x200-img-5@2x.jpg" alt>
                                        </div>
                                        <div class="course-name clear-fix">
                                            <span class="price">$45</span>
                                            <h3><a href="#">Design Practice</a></h3>
                                        </div>
                                        <div class="course-date bg-color-3 clear-fix">
                                            <div class="day"><i class="fa fa-calendar"></i>27 January</div><div class="time"><i class="fa fa-clock-o"></i>At 8:00 pm</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-item course-item">
                                    <div class="popular-item">
                                        <div class="picture">
                                            <div class="hover-effect"></div>
                                            <div class="link-cont">
                                                <a href="#" class="cws-left fancy fa fa-qrcode" title="QR code"></a>
                                                <a href="pic/370x270-img-3%402x.jpg" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                            </div>
                                            <img src="pic/270x200-img-2.jpg" data-at2x="pic/270x200-img-2@2x.jpg" alt>
                                        </div>
                                        <div class="course-name clear-fix">
                                            <span class="price">$105</span>
                                            <h3><a href="#">Design Practice</a></h3>
                                        </div>
                                        <div class="course-date bg-color-1 clear-fix">
                                            <div class="day"><i class="fa fa-calendar"></i>11 January</div><div class="time"><i class="fa fa-clock-o"></i>At 11:00 pm</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-item course-item">
                                    <div class="popular-item">
                                        <div class="picture">
                                            <div class="hover-effect"></div>
                                            <div class="link-cont">
                                                <a href="#" class="cws-left fancy fa fa-qrcode" title="QR code"></a>
                                                <a href="pic/370x270-img-3%402x.jpg" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                            </div>
                                            <img src="pic/270x200-img-2.jpg" data-at2x="pic/270x200-img-2@2x.jpg" alt>
                                        </div>
                                        <div class="course-name clear-fix">
                                            <span class="price">$45</span>
                                            <h3><a href="#">Design Practice</a></h3>
                                        </div>
                                        <div class="course-date bg-color-2 clear-fix">
                                            <div class="day"><i class="fa fa-calendar"></i>22 January</div><div class="time"><i class="fa fa-clock-o"></i>At 8:00 pm</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-item course-item">
                                    <div class="popular-item">
                                        <div class="picture">
                                            <div class="hover-effect"></div>
                                            <div class="link-cont">
                                                <a href="#" class="cws-left fancy fa fa-qrcode" title="QR code"></a>
                                                <a href="pic/370x270-img-3%402x.jpg" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                            </div>
                                            <img src="pic/270x200-img-4.jpg" data-at2x="pic/270x200-img-4@2x.jpg" alt>
                                        </div>
                                        <div class="course-name clear-fix">
                                            <span class="price">$45</span>
                                            <h3><a href="#">Science In The New Era</a></h3>
                                        </div>
                                        <div class="course-date bg-color-4 clear-fix">
                                            <div class="day"><i class="fa fa-calendar"></i>25 January</div><div class="time"><i class="fa fa-clock-o"></i>At 7:00 pm</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-item course-item">
                                    <div class="popular-item">
                                        <div class="picture">
                                            <div class="hover-effect"></div>
                                            <div class="link-cont">
                                                <a href="#" class="cws-left fancy fa fa-qrcode" title="QR code"></a>
                                                <a href="pic/370x270-img-3%402x.jpg" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                            </div>
                                            <img src="pic/270x200-img-5.jpg" data-at2x="pic/270x200-img-5@2x.jpg" alt>
                                        </div>
                                        <div class="course-name clear-fix">
                                            <span class="price">$45</span>
                                            <h3><a href="#">Design Practice</a></h3>
                                        </div>
                                        <div class="course-date bg-color-3 clear-fix">
                                            <div class="day"><i class="fa fa-calendar"></i>27 January</div><div class="time"><i class="fa fa-clock-o"></i>At 8:00 pm</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-item course-item">
                                    <div class="popular-item">
                                        <div class="picture">
                                            <div class="hover-effect"></div>
                                            <div class="link-cont">
                                                <a href="#" class="cws-left fancy fa fa-qrcode" title="QR code"></a>
                                                <a href="pic/370x270-img-3%402x.jpg" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                            </div>
                                            <img src="pic/270x200-img-1.jpg" data-at2x="pic/270x200-img-1@2x.jpg" alt>
                                        </div>
                                        <div class="course-name clear-fix">
                                            <span class="price">$75</span>
                                            <h3><a href="#">Science In The New Era</a></h3>
                                        </div>
                                        <div class="course-date  bg-color-3 clear-fix">
                                            <div class="day"><i class="fa fa-calendar"></i>09 January</div><div class="time"><i class="fa fa-clock-o"></i>At 9:00 pm</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-item course-item">
                                    <div class="popular-item">
                                        <div class="picture">
                                            <div class="hover-effect"></div>
                                            <div class="link-cont">
                                                <a href="#" class="cws-left fancy fa fa-qrcode" title="QR code"></a>
                                                <a href="pic/370x270-img-3%402x.jpg" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                            </div>
                                            <img src="pic/270x200-img-2.jpg" data-at2x="pic/270x200-img-2@2x.jpg" alt>
                                        </div>
                                        <div class="course-name clear-fix">
                                            <span class="price">$105</span>
                                            <h3><a href="#">Design Practice</a></h3>
                                        </div>
                                        <div class="course-date bg-color-1 clear-fix">
                                            <div class="day"><i class="fa fa-calendar"></i>11 January</div><div class="time"><i class="fa fa-clock-o"></i>At 11:00 pm</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-item course-item">
                                    <div class="popular-item">
                                        <div class="picture">
                                            <div class="hover-effect"></div>
                                            <div class="link-cont">
                                                <a href="#" class="cws-left fancy fa fa-qrcode" title="QR code"></a>
                                                <a href="pic/370x270-img-3%402x.jpg" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                            </div>
                                            <img src="pic/270x200-img-2.jpg" data-at2x="pic/270x200-img-2@2x.jpg" alt>
                                        </div>
                                        <div class="course-name clear-fix">
                                            <span class="price">$45</span>
                                            <h3><a href="#">Design Practice</a></h3>
                                        </div>
                                        <div class="course-date bg-color-2 clear-fix">
                                            <div class="day"><i class="fa fa-calendar"></i>22 January</div><div class="time"><i class="fa fa-clock-o"></i>At 8:00 pm</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-item course-item">
                                    <div class="popular-item">
                                        <div class="picture">
                                            <div class="hover-effect"></div>
                                            <div class="link-cont">
                                                <a href="#" class="cws-left fancy fa fa-qrcode" title="QR code"></a>
                                                <a href="pic/370x270-img-3%402x.jpg" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                            </div>
                                            <img src="pic/270x200-img-4.jpg" data-at2x="pic/270x200-img-4@2x.jpg" alt>
                                        </div>
                                        <div class="course-name clear-fix">
                                            <span class="price">$45</span>
                                            <h3><a href="#">Science In The New Era</a></h3>
                                        </div>
                                        <div class="course-date bg-color-4 clear-fix">
                                            <div class="day"><i class="fa fa-calendar"></i>25 January</div><div class="time"><i class="fa fa-clock-o"></i>At 7:00 pm</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-item course-item">
                                    <div class="popular-item">
                                        <div class="picture">
                                            <div class="hover-effect"></div>
                                            <div class="link-cont">
                                                <a href="#" class="cws-left fancy fa fa-qrcode" title="QR code"></a>
                                                <a href="pic/370x270-img-3%402x.jpg" class="fancy fa fa-search" title="اطلاعات بیشتر"></a>
                                            </div>
                                            <img src="pic/270x200-img-5.jpg" data-at2x="pic/270x200-img-5@2x.jpg" alt>
                                        </div>
                                        <div class="course-name clear-fix">
                                            <span class="price">$45</span>
                                            <h3><a href="#">Design Practice</a></h3>
                                        </div>
                                        <div class="course-date bg-color-3 clear-fix">
                                            <div class="day"><i class="fa fa-calendar"></i>27 January</div><div class="time"><i class="fa fa-clock-o"></i>At 8:00 pm</div>
                                        </div>
                                    </div>
                                </div>
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
                                <div class="gallery-item">
                                    <div class="item-instructor bg-color-5">
                                        <div class="info-box">
                                            <h3>بسته طراحی وب</h3>
                                            <div class="divider"></div>
                                            <p>بسته طراحی وب شامل درس‌هایی‌ مانند طراحی وب، وب متفرقه، وب جذاب...</p>
                                            <button class="cws-button bt-color-6 border-radius alt smaller margin-bottom profile-packages-button">اطلاعات بیشتر</button>
                                            <button class="cws-button bt-color-6 border-radius alt smaller margin-bottom profile-packages-button">QR-code</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-item">
                                    <div class="item-instructor bg-color-4">
                                        <div class="info-box">
                                            <h3>بسته طراحی وب</h3>
                                            <div class="divider"></div>
                                            <p>بسته طراحی وب شامل درس‌هایی‌ مانند طراحی وب، وب متفرقه، وب جذاب...</p>
                                            <button class="cws-button bt-color-6 border-radius alt smaller margin-bottom profile-packages-button">اطلاعات بیشتر</button>
                                            <button class="cws-button bt-color-6 border-radius alt smaller margin-bottom profile-packages-button">QR-code</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-item">
                                    <div class="item-instructor bg-color-3">
                                        <div class="info-box">
                                            <h3>بسته طراحی وب</h3>
                                            <div class="divider"></div>
                                            <p>بسته طراحی وب شامل درس‌هایی‌ مانند طراحی وب، وب متفرقه، وب جذاب...</p>
                                            <button class="cws-button bt-color-6 border-radius alt smaller margin-bottom profile-packages-button">اطلاعات بیشتر</button>
                                            <button class="cws-button bt-color-6 border-radius alt smaller margin-bottom profile-packages-button">QR-code</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-item">
                                    <div class="item-instructor bg-color-6">
                                        <div class="info-box">
                                            <h3>بسته طراحی وب</h3>
                                            <div class="divider"></div>
                                            <p>بسته طراحی وب شامل درس‌هایی‌ مانند طراحی وب، وب متفرقه، وب جذاب...</p>
                                            <button class="cws-button bt-color-5 border-radius alt smaller margin-bottom profile-packages-button">اطلاعات بیشتر</button>
                                            <button class="cws-button bt-color-5 border-radius alt smaller margin-bottom profile-packages-button">QR-code</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-item">
                                    <div class="item-instructor bg-color-5">
                                        <div class="info-box">
                                            <h3>بسته طراحی وب</h3>
                                            <div class="divider"></div>
                                            <p>بسته طراحی وب شامل درس‌هایی‌ مانند طراحی وب، وب متفرقه، وب جذاب...</p>
                                            <button class="cws-button bt-color-6 border-radius alt smaller margin-bottom profile-packages-button">اطلاعات بیشتر</button>
                                            <button class="cws-button bt-color-6 border-radius alt smaller margin-bottom profile-packages-button">QR-code</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-item">
                                    <div class="item-instructor bg-color-4">
                                        <div class="info-box">
                                            <h3>بسته طراحی وب</h3>
                                            <div class="divider"></div>
                                            <p>بسته طراحی وب شامل درس‌هایی‌ مانند طراحی وب، وب متفرقه، وب جذاب...</p>
                                            <button class="cws-button bt-color-6 border-radius alt smaller margin-bottom profile-packages-button">اطلاعات بیشتر</button>
                                            <button class="cws-button bt-color-6 border-radius alt smaller margin-bottom profile-packages-button">QR-code</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-item">
                                    <div class="item-instructor bg-color-3">
                                        <div class="info-box">
                                            <h3>بسته طراحی وب</h3>
                                            <div class="divider"></div>
                                            <p>بسته طراحی وب شامل درس‌هایی‌ مانند طراحی وب، وب متفرقه، وب جذاب...</p>
                                            <button class="cws-button bt-color-6 border-radius alt smaller margin-bottom profile-packages-button">اطلاعات بیشتر</button>
                                            <button class="cws-button bt-color-6 border-radius alt smaller margin-bottom profile-packages-button">QR-code</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-item">
                                    <div class="item-instructor bg-color-6">
                                        <div class="info-box">
                                            <h3>بسته طراحی وب</h3>
                                            <div class="divider"></div>
                                            <p>بسته طراحی وب شامل درس‌هایی‌ مانند طراحی وب، وب متفرقه، وب جذاب...</p>
                                            <button class="cws-button bt-color-5 border-radius alt smaller margin-bottom profile-packages-button">اطلاعات بیشتر</button>
                                            <button class="cws-button bt-color-5 border-radius alt smaller margin-bottom profile-packages-button">QR-code</button>
                                        </div>
                                    </div>
                                </div>
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
<script src="js/jquery.min.js"></script>
<script type='text/javascript' src='js/jquery.validate.min.js'></script>
<script src="js/jquery.form.min.js"></script>
<script src="js/TweenMax.min.js"></script>
<script src="js/main.js"></script>
<script src="js/jquery.isotope.min.js"></script>

<script src="js/owl.carousel-v2.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jflickrfeed.min.js"></script>
<script src="js/jquery.tweet.js"></script>
<!--<script type='text/javascript' src='tuner/js/colorpicker.js'></script>-->
<!--<script type='text/javascript' src='tuner/js/scripts.js'></script>-->
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/retina.min.js"></script>
<!--<script src="js/profile-add-tags.js"></script>-->
<script src="js/select2.js"></script>
<!--<script src="js/select2.min.js"></script>-->
<script src="js/Kimia.js"></script>

</body>

</html>
