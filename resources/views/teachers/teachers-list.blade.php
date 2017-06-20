<!DOCTYPE HTML>
<html>

<head>
    <title>UniLearn - Education and Courses Template</title>
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
    <link rel="stylesheet" href="css/Kimia.css">
    <!--styles -->
</head>
<body class="">
<header>
    <!-- main menu -->
@include('header')
<!-- / main menu -->
    <div class="page-title">
        <div class="grid-row">
            <h1>اساتید</h1>
            <nav class="bread-crumb">
                <a href="/">خانه</a>
                <i class="fa fa-long-arrow-left"></i>
                <a href="/teachers">اساتید</a>
            </nav>
        </div>
    </div>
</header>
<div class="page-content">
    <main>
        <div class="container">
            <div class="category-search course-grid-category-search">
                <i class="fa fa-search"></i><!--
						 --><form>
                    <select name="category-id" class="category-id">
                        <option>کتگوری ها</option>
                        <option value="eng">English</option>
                        <option value="ua">China</option>
                        <option value="ru">Russian</option>
                    </select><!--
							 --><input type="text" class="input-text" value placeholder="کلید واژه"><!--
							 --><button class="cws-button smaller border-radius alt">جستجو</button>
                </form>
            </div>
            <section class="clear-fix">
                <h2>با اساتید ما آشنا شوید</h2>
                <div class="grid-col-row">
                    <div class="grid-col grid-col-6">
                        <div class="item-instructor bg-color-1">
                            <a href="profile-v2.html" class="instructor-avatar">
                                <img src="pic/210x220-img-1.jpg" data-at2x="pic/210x220-img-1@2x.jpg" alt>
                            </a>
                            <div class="info-box">
                                <h3>Jenny Doe</h3>
                                <span class="instructor-profession">Professor of Methematic</span>
                                <div class="divider"></div>
                                <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>
                                <div class="social-link">
                                    <a href="#" class="fa fa-linkedin"></a>
                                    <a href="#" class="fa fa-google-plus"></a>
                                    <a href="#" class="fa fa-globe"></a>
                                </div>
                            </div>
                        </div>
                        <div class="item-instructor bg-color-3">
                            <a href="profile-v2.html" class="instructor-avatar">
                                <img src="pic/210x220-img-3.jpg" data-at2x="pic/210x220-img-3@2x.jpg" alt>
                            </a>
                            <div class="info-box">
                                <h3>James Doe</h3>
                                <span class="instructor-profession">Professor of Economics</span>
                                <div class="divider"></div>
                                <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>
                                <div class="social-link">
                                    <a href="#" class="fa fa-linkedin"></a>
                                    <a href="#" class="fa fa-google-plus"></a>
                                    <a href="#" class="fa fa-globe"></a>
                                </div>
                            </div>
                        </div>
                        <div class="item-instructor bg-color-2">
                            <a href="profile-v2.html" class="instructor-avatar">
                                <img src="pic/210x220-img-2.jpg" data-at2x="pic/210x220-img-2@2x.jpg" alt>
                            </a>
                            <div class="info-box">
                                <h3>John Doe</h3>
                                <span class="instructor-profession">Lecturer of Design</span>
                                <div class="divider"></div>
                                <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>
                                <div class="social-link">
                                    <a href="#" class="fa fa-linkedin"></a>
                                    <a href="#" class="fa fa-google-plus"></a>
                                    <a href="#" class="fa fa-globe"></a>
                                </div>
                            </div>
                        </div>
                        <div class="item-instructor bg-color-6">
                            <a href="profile-v2.html" class="instructor-avatar">
                                <img src="pic/210x220-img-4.jpg" data-at2x="pic/210x220-img-4@2x.jpg" alt>
                            </a>
                            <div class="info-box">
                                <h3>Jade Doe</h3>
                                <span class="instructor-profession">Assistant</span>
                                <div class="divider"></div>
                                <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>
                                <div class="social-link">
                                    <a href="#" class="fa fa-linkedin"></a>
                                    <a href="#" class="fa fa-google-plus"></a>
                                    <a href="#" class="fa fa-globe"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-col grid-col-6">
                        <div class="item-instructor bg-color-2">
                            <a href="profile-v2.html" class="instructor-avatar">
                                <img src="pic/210x220-img-2.jpg" data-at2x="pic/210x220-img-2@2x.jpg" alt>
                            </a>
                            <div class="info-box">
                                <h3>John Doe</h3>
                                <span class="instructor-profession">Lecturer of Design</span>
                                <div class="divider"></div>
                                <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>
                                <div class="social-link">
                                    <a href="#" class="fa fa-linkedin"></a>
                                    <a href="#" class="fa fa-google-plus"></a>
                                    <a href="#" class="fa fa-globe"></a>
                                </div>
                            </div>
                        </div>
                        <div class="item-instructor bg-color-6">
                            <a href="profile-v2.html" class="instructor-avatar">
                                <img src="pic/210x220-img-4.jpg" data-at2x="pic/210x220-img-4@2x.jpg" alt>
                            </a>
                            <div class="info-box">
                                <h3>Jade Doe</h3>
                                <span class="instructor-profession">Assistant</span>
                                <div class="divider"></div>
                                <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>
                                <div class="social-link">
                                    <a href="#" class="fa fa-linkedin"></a>
                                    <a href="#" class="fa fa-google-plus"></a>
                                    <a href="#" class="fa fa-globe"></a>
                                </div>
                            </div>
                        </div>
                        <div class="item-instructor bg-color-1">
                            <a href="profile-v2.html" class="instructor-avatar">
                                <img src="pic/210x220-img-1.jpg" data-at2x="pic/210x220-img-1@2x.jpg" alt>
                            </a>
                            <div class="info-box">
                                <h3>Jenny Doe</h3>
                                <span class="instructor-profession">Professor of Methematic</span>
                                <div class="divider"></div>
                                <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>
                                <div class="social-link">
                                    <a href="#" class="fa fa-linkedin"></a>
                                    <a href="#" class="fa fa-google-plus"></a>
                                    <a href="#" class="fa fa-globe"></a>
                                </div>
                            </div>
                        </div>
                        <div class="item-instructor bg-color-3">
                            <a href="profile-v2.html" class="instructor-avatar">
                                <img src="pic/210x220-img-3.jpg" data-at2x="pic/210x220-img-3@2x.jpg" alt>
                            </a>
                            <div class="info-box">
                                <h3>James Doe</h3>
                                <span class="instructor-profession">Professor of Economics</span>
                                <div class="divider"></div>
                                <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>
                                <div class="social-link">
                                    <a href="#" class="fa fa-linkedin"></a>
                                    <a href="#" class="fa fa-google-plus"></a>
                                    <a href="#" class="fa fa-globe"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="page-pagination clear-fix">
                <a href="#"><i class="fa fa-angle-double-left"></i></a>
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#"><i class="fa fa-angle-double-right"></i></a>
            </div>
            <hr class="divider-color" />
            <br>
            <section class="padding-top-none">
                <div class="carousel-container">
                    <div class="title-carousel">
                        <h2>Popular Teachers</h2>
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
                                    <a href="profile-v2.html" class="instructor-avatar">
                                        <img src="pic/210x220-img-5.jpg" data-at2x="pic/210x220-img-5@2x.jpg" alt>
                                    </a>
                                    <div class="info-box">
                                        <h3>Lucy Doe</h3>
                                        <span class="instructor-profession">Junior Lecturer</span>
                                        <div class="divider"></div>
                                        <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>
                                        <div class="social-link">
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-globe"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery-item">
                                <div class="item-instructor bg-color-4">
                                    <a href="profile-v2.html" class="instructor-avatar">
                                        <img src="pic/210x220-img-6.jpg" data-at2x="pic/210x220-img-6@2x.jpg" alt>
                                    </a>
                                    <div class="info-box">
                                        <h3>Max Doe</h3>
                                        <span class="instructor-profession">Writer</span>
                                        <div class="divider"></div>
                                        <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>
                                        <div class="social-link">
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-globe"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery-item">
                                <div class="item-instructor bg-color-3">
                                    <a href="profile-v2.html" class="instructor-avatar">
                                        <img src="pic/210x220-img-7.jpg" data-at2x="pic/210x220-img-7@2x.jpg" alt>
                                    </a>
                                    <div class="info-box">
                                        <h3>Piter Doe</h3>
                                        <span class="instructor-profession">Writer</span>
                                        <div class="divider"></div>
                                        <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>
                                        <div class="social-link">
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-globe"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery-item">
                                <div class="item-instructor bg-color-6">
                                    <a href="profile-v2.html" class="instructor-avatar">
                                        <img src="pic/210x220-img-1.jpg" data-at2x="pic/210x220-img-1@2x.jpg" alt>
                                    </a>
                                    <div class="info-box">
                                        <h3>Jenny Doe</h3>
                                        <span class="instructor-profession">Professor of Methematic</span>
                                        <div class="divider"></div>
                                        <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>
                                        <div class="social-link">
                                            <a href="#" class="fa fa-linkedin"></a>
                                            <a href="#" class="fa fa-google-plus"></a>
                                            <a href="#" class="fa fa-globe"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</div>
<!-- footer -->
@include('footer')
<!-- / footer -->
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
</body>

</html>