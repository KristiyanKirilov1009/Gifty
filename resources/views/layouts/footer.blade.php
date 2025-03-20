<!-- Footer Start -->
<footer class="footer">
    <div class="container">
        <div class="row">

            <!-- About -->
            <div class="col-sm-6 footer-col">
                <h3>За нас</h3>
                <div class="footer-separator"></div>
                <div class="footer-about">
                    <p>Ние вярваме, че всеки подарък трябва да носи усмивка и специално послание. В нашия магазин ще откриете внимателно подбрани подаръци за мъже, жени и деца – за всеки повод и вкус.</p>
                </div>
            </div>

            <!-- Support Links -->
            <div class="col-sm-2 footer-col">
                <h3>За Клиенти</h3>
                <div class="footer-separator"></div>
                <ul>
                    <li><a href="{{ route('terms') }}">Доставка и Връщане</a></li>
                    <li><a href="{{ route('terms') }}">Общи Условия</a></li>
                    <li><a href="{{ route('terms') }}">F.A.Q</a></li>
                    <li><a href="{{ route('contact') }}">Контакти</a></li>
                </ul>
            </div>

            <!-- Social Links -->
            <div class="col-sm-2 footer-col">
                <h3>Последвайте ни</h3>
                <div class="footer-separator"></div>
                <ul class="footer-social">
                    <li><a href="#"><i class="fa-brands fa-facebook-square fa-lg"></i> Facebook</a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram fa-lg"></i> Instagram</a></li>
                    <li><a href="#"><i class="fa-brands fa-youtube fa-lg"></i>YouTube</a></li>
                    <li><a href="#"><i class="fa-brands fa-tiktok fa-lg"></i> TikTok</a></li>
                </ul>
            </div>

            <!-- Shop -->
            <div class="col-sm-2 footer-col">
                <h3>Артикули</h3>
                <div class="footer-separator"></div>
                <ul>
                    @foreach($categories as $category)
                        <li><a href="{{ route('categories', ['category' => $category]) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

<!-- Footer Bar Start -->
<div class="footer-bar">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <!-- Copyright -->
            <div class="">
                <p>Kristiyan Kirilov KST II kurs &copy; {{ date("Y") }} All rights reserved.</p>
            </div>
        </div>
    </div>
</div>
<!-- Footer Bar End -->
