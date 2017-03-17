<footer>
    <div class="grid-row">
        <div class="grid-col-row clear-fix">
            <section class="grid-col grid-col-4 footer-about">
                <h2 class="corner-radius">درباره ما</h2>
                <div>
                    <h3>Sed aliquet dui auctor blandit ipsum tincidunt</h3>
                    <p>Quis rhoncus lorem dolor eu sem. Aenean enim risus, convallis id ultrices eget.</p>
                </div>
                <address>
                    <p></p>
                    <a href="/tel:123-123456789" class="phone-number">123-123456789</a>
                    <br />
                    <a href="/mailto:uni@domain.com" class="email">uni@domain.com</a>
                    <br />
                    <a href="/www.sample.html" class="site">www.sample.com</a>
                    <br />
                    <a href="/www.sample.html" class="address">250 Biscayne Blvd. (North) 11st Floor<br/>New World Tower Miami, 33148</a>
                </address>
                <div class="footer-social">
                    <a href="/#" class="fa fa-twitter"></a>
                    <a href="/#" class="fa fa-skype"></a>
                    <a href="/#" class="fa fa-google-plus"></a>
                    <a href="/#" class="fa fa-rss"></a>
                    <a href="/#" class="fa fa-youtube"></a>
                </div>
            </section>
            <section class="grid-col grid-col-4 footer-latest">
                <h2 class="corner-radius">جدیدترین دوره ها</h2>

                <article>
                    <img src="/pic/83x83-img-2.jpg" alt>
                    <h3>{{$recent_courses[0]->course->name}}</h3>
                    <div class="course-date">
                        <div>10<sup>00</sup></div>
                        <div>23.02.15</div>
                    </div>
                    <p>{{$recent_courses[0]->course->introduction }}</p>
                </article>
                <article>
                    <img src="/pic/83x83-img-1.jpg"  alt>
                    <h3>{{$recent_courses[1]->course->name}}</h3>
                    <div class="course-date">
                        <div>10<sup>00</sup></div>
                        <div>23.02.15</div>
                    </div>
                    <p>{{$recent_courses[1]->course->introduction }}</p>
                </article>
            </section>
            <section class="grid-col grid-col-4 footer-contact-form">
                <h2 class="corner-radius">برای تدریس درخواست دهید</h2>
                <div class="email_server_responce"></div>
                <form action="http://html.creaws.com/unilearn/php/contacts-process.php" class="contact-form" method="post" novalidate="novalidate">
                    <p><span class="your-name"><input type="text" name="name" value="" size="40" placeholder="نام" aria-invalid="false" required></span>
                    </p>
                    <p><span class="your-email"><input type="text" name="phone" value="" size="40" placeholder="شماره همراه" aria-invalid="false" required></span> </p>
                    <p><span class="your-message"><textarea name="message" placeholder="پیغام" cols="40" rows="5" aria-invalid="false" required></textarea></span> </p>
                    <button type="submit" class="cws-button bt-color-3 border-radius alt icon-right">ثبت کنید <i class="fa fa-angle-left"></i></button>
                </form>
            </section>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="grid-row clear-fix">
            <div class="copyright">uniLearn<span></span> 2015 . All Rights Reserved</div>
            <nav class="footer-nav">
                <ul class="clear-fix">
                    <li>
                        <a href="/">خانه</a>
                    </li>
                    <li>
                        <a href="/courses-grid">دوره ها</a>
                    </li>
                    <li>
                        <a href="/content-elements.html">Plans</a>
                    </li>
                    <li>
                        <a href="/blog-default.html">News</a>
                    </li>
                    <li>
                        <a href="/page-about-us.html">Pages</a>
                    </li>
                    <li>
                        <a href="/contact-us.html">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</footer>