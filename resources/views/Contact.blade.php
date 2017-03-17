<!DOCTYPE HTML>
<html>
<head>
    <title>UniLearn - Education and Courses Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <!-- style -->
    <link rel="shortcut icon" href="/img/favicon.png">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/fi/flaticon.css">
    <link rel="stylesheet" href="/css/main.css">
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/colorpicker.css" />-->
    <!--<link rel="stylesheet" type="text/css" href="tuner/css/styles.css" />-->
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css" />
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/rs-plugin/css/settings.css" media="screen">
    <link rel="stylesheet" href="/css/fateme.css">
    <link rel="stylesheet" href="/css/Kimia.css">
    <!--styles -->

</head>
<body class="contact-page">

<!-- page header -->
<header>
    @include('header')
    <!-- page title -->
    <div class="page-title">
        <div class="grid-row">
            <h1>Contact Us</h1>
            <!-- bread crumb -->
            <nav class="bread-crumb">
                <a href="index.html">Home</a>
                <i class="fa fa-long-arrow-right"></i>
                <a href="contact-us.html">Contact Us</a>
            </nav>
            <!-- / bread crumb -->
        </div>
    </div>
    <!-- page title -->
</header>
<!-- / page header -->
<!-- page content -->
<div class="page-content woocommerce">
    <!-- map -->
    <div class="container clear-fix">
        <div class="map wow fadeInUp">
            <div id="map" class="google-map"></div>
            <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
            <script type="text/javascript">
                function mapinitialize() {
                    var latlng = new google.maps.LatLng(-33.86938,151.204834);
                    var myOptions = {
                        zoom: 14,
                        center: latlng,
                        scrollwheel: false,
                        scaleControl: false,
                        disableDefaultUI: false,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        // Google Map Color Styles
                        styles: [{featureType:"landscape",stylers:[{saturation:-100},{lightness:65},{visibility:"on"}]},{featureType:"poi",stylers:[{saturation:-100},{lightness:51},{visibility:"simplified"}]},{featureType:"road.highway",stylers:[{saturation:-100},
                            {visibility:"simplified"}]},{featureType:"road.arterial",stylers:[{saturation:-100},{lightness:30},{visibility:"on"}]},{featureType:"road.local",stylers:[{saturation:-100},{lightness:40},{visibility:"on"}]},{featureType:"transit",stylers:[{saturation:-100},
                            {visibility:"simplified"}]},{featureType:"administrative.province",stylers:[{visibility:"off"}]/**/},{featureType:"administrative.locality",stylers:[{visibility:"off"}]},{featureType:"administrative.neighborhood",stylers:[{visibility:"on"}
                        ]/**/},{featureType:"water",elementType:"labels",stylers:[{visibility:"on"},{lightness:-25},{saturation:-100}]},{featureType:"water",elementType:"geometry",stylers:[{hue:"#ffff00"},{lightness:-25},{saturation:-97}]}]
                    };
                    var map = new google.maps.Map(document.getElementById("map"),myOptions);
                    var image = "/images/map-pin.png";
                    var image = new google.maps.MarkerImage("/images/map-pin.png", null, null, null, new google.maps.Size(84,30));
                    var marker = new google.maps.Marker({
                        map: map,
                        icon: image,
                        position: map.getCenter()
                    });
                    var contentString = '<b>Office</b><br>Streetname 13<br>50000 Sydney';
                    var infowindow = new google.maps.InfoWindow({
                        content: contentString
                    });
                    google.maps.event.addListener(marker, 'click', function() {
                        infowindow.open(map,marker);
                    });
                }
                mapinitialize();
            </script>
        </div>
    </div>
    <!-- / map -->
    <!-- contact form section -->
    <div class="grid-row clear-fix">
        <div class="grid-col-row">
            <div class="grid-col grid-col-8">
                <section>
                    <h2>ارتباط با ما</h2>
                    <div class="widget-contact-form">
                        <!-- contact-form -->
                        <div class="info-boxes error-message alert-boxes error-alert" id="feedback-form-errors">
                            <strong>Attention!</strong>
                            <div class="message"></div>
                        </div>
                        <div class="email_server_responce"></div>
                        <form method="post" action="/SaveContact" class="contact-form alt clear-fix">
                            {{csrf_field()}}
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
                            <input type="text" name="Name" value="" size="40" placeholder="نام و نام خانوادگی" aria-invalid="false" aria-required="true">
                            <input type="text" name="Email" value="" size="40" placeholder="ایمیل" aria-required="true">
                            <input type="text" name="Subject" value="" size="40" placeholder="موضوع" aria-invalid="false" aria-required="true">
                            <textarea name="Description"  cols="40" rows="3" placeholder="متن پیام" aria-invalid="false" aria-required="true"></textarea>
                            <input type="submit" value="ارسال" class="cws-button border-radius alt">
                        </form>
                        <!--/contact-form -->
                    </div>
                </section>
            </div>
            <div class="grid-col grid-col-4 widget-address">
                <section>
                    <h2>Our Offices</h2>
                    <address>
                        <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis justo at suscipit. Etiam id faucibus augue, sit amet ultricies nisi.</p>
                        <p><strong class="fs-18">Address:</strong><br/>250 Biscayne Blvd. (North) 11st Floor<br/>New World Tower Miami, Florida 33148</p>
                        <p><strong class="fs-18">Phone number:</strong><br/>
                            <a href="tel:305-333552">(305)333-5522</a><br/>
                            <a href="tel:305-333552">(305)333-5522</a>
                        </p>
                        <p><strong class="fs-18">E-mail:</strong><br/>
                            <a href="mailto:uni@domain.com">uni@domain.com</a><br/>
                            <a href="mailto:uni@domain.com">sales@your-site.com</a>
                        </p>
                    </address>
                </section>
            </div>
        </div>
    </div>
    <!-- / contact form section -->
</div>
<!-- / page content -->

<!-- footer -->
@include('footer')
<!-- / footer -->


<script src="/js/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<!--<script type="text/javascript" src="../../google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox_packed.html"></script>-->
<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
<script type='text/javascript' src='/js/jquery.validate.min.js'></script>
<script src="/js/jquery.form.min.js"></script>
<script type='text/javascript' src='/js/jquery.validate.min.js'></script>
<script src="/js/jquery.form.min.js"></script>
<script src="/js/TweenMax.min.js"></script>
<script src="/js/main.js"></script>
<script src="/js/jquery.isotope.min.js"></script>

<script src="/js/owl.carousel.min.js"></script>
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