<!-- menu -->
<!-- header top pannel -->
{{--<div class="page-header-top" style="background-color: white">--}}
<div class="page-header-top">
    <div class="grid-row clear-fix">
        <div class="header-top-panel">
                @if(! Auth::check())
                    <div class="top-header-widget">
                        {{--<a href="/login" class="btn-ajax-login">--}}
                            {{--<i class="ion-log-in mr-3"></i> ورود--}}
                        {{--</a>--}}
                        <a href="/login" class="fa fa-user login-icon" title="Login" ></a>
                    </div>
                    <div class="top-header-widget ">
                        {{--<a href="/register" class="btn-ajax-register">--}}
                            {{--<i class="ion-person-add mr-3"></i> ثبت نام--}}
                        {{--</a>--}}
                        <a href="/register" ><i class="ion-person-add mr-3"></i> ثبت نام </a>
                    </div>
                @else
                    <div class="top-header-widget ">
                        {{Auth::user()->name}}
                        <span>خوش آمدی</span>
                    </div>
                    <div class="top-header-widget hidden-xs">
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            <i class="ion-log-out mr-3"></i> خروج
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                @endif
            </div>
    {{--<div class="grid-row clear-fix">--}}
        {{--<address style="color: black">--}}
        {{--<address >--}}
            {{--<a href="tel:123-123456789" class="phone-number"><i class="fa fa-phone"></i> 123-123456789 </a>--}}
            {{--<a href="mailto:uni@domain.com" class="email"><i class="fa fa-envelope-o"></i>uni@domain.com</a>--}}
        {{--</address>--}}
        {{--<div class="header-top-panel">--}}
            {{--<div>--}}
                {{--<a href="#" class="fa fa-shopping-cart" title="Shopping Cart"></a>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<a href="/login" class="fa fa-user login-icon" title="Login" ></a>--}}
            {{--</div>--}}
            {{--<div id="top_social_links_wrapper" title="Share">--}}
                {{--<div class="share-toggle-button"><i class="share-icon fa fa-share-alt" ></i></div>--}}
                {{--<div class="cws_social_links"><a href="https://plus.google.com/" class="cws_social_link" title="Google +"><i class="share-icon fa fa-google-plus" style="transform: matrix(0, 0, 0, 0, 0, 0);"></i></a><a href="http://twitter.com/" class="cws_social_link" title="Twitter"><i class="share-icon fa fa-twitter"></i></a><a href="http://facebook.com/" class="cws_social_link" title="Facebook"><i class="share-icon fa fa-facebook"></i></a><a href="http://dribbble.com/" class="cws_social_link" title="Dribbble"><i class="share-icon fa fa-dribbble"></i></a></div>--}}
            {{--</div>--}}
            {{--<a href="#" class="search-open" title="Search"><i class="fa fa-search"></i></a>--}}
            {{--<form action="#" class="clear-fix">--}}
                {{--<input type="text" placeholder="Search" class="clear-fix">--}}
            {{--</form>--}}
        {{--</div>--}}
        {{--</div>--}}
</div>
<!-- / header top pannel -->
<div class="sticky-wrapper">
    <div class="sticky-menu">
        <div class="grid-row clear-fix">
            <!-- logo -->
            <a href="/" class="logo">
                <h1 style="position: relative; top:5px;">وستا</h1>
                <img src="/img/logo.png"  alt>
                <h1 style="position: relative; top:5px;right: 5px">کمپ</h1>

            </a>
            <!-- / logo -->
            <nav class="main-nav">
                <ul class="clear-fix">
                    <li>
                        <a href="/" class="active">خانه</a>
                        <!-- sub menu -->
                        {{--<ul>--}}
                            {{--<li><a href="index.html" class="active">Full-Width Slider</a></li>--}}
                            {{--<li><a href="index-fullscreen.html">Full-Screen Slider</a></li>--}}
                            {{--<li><a href="index-bg-video.html">Video Slider</a></li>--}}
                        {{--</ul>--}}
                        <!-- / sub menu -->
                    </li>
                    <li class="megamenu">
                        <a href="/courses-grid">دوره ها</a>
                        <!-- sub mega menu -->
                        {{--<ul class="clear-fix">--}}
                            {{--<li><div class="header-megamenu">Pages</div>--}}
                                {{--<ul>--}}
                                    {{--<li><a href="packages-grid">بسته ها</a></li>--}}
                                    {{--<li><a href="page-about-us.html">About Us</a></li>--}}
                                    {{--<li><a href="page-our-staff.html">Our Staff</a></li>--}}
                                    {{--<li><a href="page-services.html">Services</a></li>--}}
                                    {{--<li><a href="page-full-width.html">Full-Width Page</a></li>--}}
                                    {{--<li><a href="page-left-sidebar.html">Page Left Sidebar</a></li>--}}
                                    {{--<li><a href="page-right-sidebar.html">Page Right Sidebar</a></li>--}}
                                    {{--<li><a href="page-double-sidebars.html">Double Sidebars</a></li>--}}
                                    {{--<li><a href="page-faq.html">Faq Page</a></li>--}}
                                    {{--<li><a href="page-sitemap.html">SiteMap</a></li>--}}
                                    {{--<li><a href="page-404.html">404 Page</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li><div class="header-megamenu">Content</div>--}}
                                {{--<ul>--}}
                                    {{--<li><a href="content-elements.html">Content Elements</a></li>--}}
                                    {{--<li><a href="page-content-typography.html">Typography</a></li>--}}
                                    {{--<li><a href="page-pricing-plans.html">Pricing Plans</a></li>--}}
                                    {{--<li><a href="page-login.html">Login</a></li>--}}

                                {{--</ul>--}}
                                {{--<img src="pic/250x150-img-2.jpg" alt>--}}
                            {{--</li>--}}
                            {{--<li><div class="header-megamenu">Portfolio</div>--}}
                                {{--<ul>--}}
                                    {{--<li><a href="portfolio-one-column.html">One Column</a></li>--}}
                                    {{--<li><a href="portfolio-two-columns.html">Two Columns</a></li>--}}
                                    {{--<li><a href="portfolio-three-columns.html">Three Columns</a></li>--}}
                                    {{--<li><a href="portfolio-four-columns.html">Four Columns</a></li>--}}
                                    {{--<li><a href="portfolio-gallery.html">Gallery</a></li>--}}
                                    {{--<li><a href="portfolio-filtered.html">Filtered</a></li>--}}
                                {{--</ul>--}}
                                {{--<img src="pic/250x150-img-3.jpg" alt>--}}
                            {{--</li>--}}
                            {{--<li><div class="header-megamenu">Blog</div>--}}
                                {{--<ul>--}}
                                    {{--<li><a href="blog-default.html">Default</a></li>--}}
                                    {{--<li><a href="blog-two-columns.html">Two Columns</a></li>--}}
                                    {{--<li><a href="blog-three-columns.html">Three Columns</a></li>--}}
                                    {{--<li><a href="blog-fullwidth.html">Full Width</a></li>--}}
                                    {{--<li><a href="blog-post.html">Blog Post</a></li>--}}
                                {{--</ul>--}}
                                {{--<img src="pic/250x150-img-4.jpg" alt>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        <!-- / sub mega menu -->
                    </li>
                    <li>
                        <a href="/packages-grid">بسته ها</a>
                        <!-- sub menu -->
                        {{--<ul>--}}
                            {{--<li><a href="/courses-grid">Courses grid</a></li>--}}
                            {{--<li><a href="courses-list.html">Courses list</a></li>--}}
                            {{--<li><a href="courses-single-item.html">Courses single item</a></li>--}}
                        {{--</ul>--}}
                        <!-- / sub menu -->
                    </li>
                    <li>
                        <a href="/teachers">اساتید</a>
                        <!-- sub menu -->
                        {{--<ul>--}}
                            {{--<li><a href="event-calendar.html">Events Calendar</a></li>--}}
                            {{--<li><a href="events-single-item.html">Events Single Item</a></li>--}}
                        {{--</ul>--}}
                        <!-- / sub menu -->
                    </li>
                    <li>
                        <a href="/profile">صفحه شخصی</a>
                        <!-- sub menu -->
                        {{--<ul>--}}
                            {{--<li><a href="shop-product-list.html">Product List</a></li>--}}
                            {{--<li><a href="shop-single-product.html">Single Product</a></li>--}}
                            {{--<li><a href="shop-checkout.html">Checkout</a></li>--}}
                            {{--<li><a href="shop-cart.html">Shop Cart</a></li>--}}
                        {{--</ul>--}}
                        <!-- / sub menu -->
                    </li>
                    <li>
                        <a href="/contactUs">ارتباط با ما</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- / menu -->