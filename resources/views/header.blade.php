<!-- menu -->
<!-- header top pannel -->
    <!--header top sign-in/sign-up-->
@if(! Auth::check())
    <div class="page-header-top">
        <div class="grid-row clear-fix">
            <div class="header-top-panel header-top-panel-sign-in">
                <a href="/login" class="log-in">ورود</a>
                <a href="/register" class="sign-up">ثبت نام</a>
            </div>
            <div class="header-top-panel header-top-panel-search">
                <form action="{{ url('/Search') }}" method="get" class="clear-fix">
                    <input type="text" name="search"  placeholder="جست و جو" class="clear-fix">
                </form>
                <a href="#" class="search-open"><i class="fa fa-search"></i></a>
            </div>
        </div>
    </div>
@else
    <div class="page-header-top">
        <div class="grid-row clear-fix">
            <div class="header-top-panel header-top-panel-sign-in">
                <p>سلام، <span>{{Auth::user()->name}}</span> عزیز</p>
                <a href="{{ url('/logout') }}"
                   onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();" class="sign-out">خروج</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="header-top-panel header-top-panel-search">
                <form action="{{ url('/Search') }}" method="get" class="clear-fix">
                    <input type="text" name="search"  placeholder="جست و جو" class="clear-fix">
                </form>
                <a href="#" class="search-open"><i class="fa fa-search"></i></a>
            </div>
        </div>
    </div>
@endif
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
                    @if(Auth::check())
                        <li>
                            <a href="/profile">صفحه شخصی</a>
                        </li>
                    @endif
                    <li>
                        <a href="/contactUs">ارتباط با ما</a>
                    </li>
                    <li>
                        <a href="/about">درباره ی ما</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- / menu -->