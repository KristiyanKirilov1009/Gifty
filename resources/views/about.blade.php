@extends('layouts.master')

@section('content')
 <!-- Page Parallax Header -->
 <div class="parallax-header parallax-window" data-parallax="scroll" data-image-src="{{asset('theme/img/backgrounds/about-header-bg.jpg')}}">
            <div class="ent-overlay">
                <div class="parallax-caption">
                    <div class="parallax-holder">
                        <h1>За нас</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Parallax Header -->

        <!-- Page Content -->
        <div class="container page-container">
            <div class="row">
                <div class="about-content col-sm-12">
                    <!-- Information -->
                    <p>Подаряването е изкуство, а ние сме тук, за да ви помогнем да го усъвършенствате! В нашия магазин ще откриете внимателно подбрани подаръци за мъже, жени и деца – за всеки повод и вкус.</p>
                        <p> <br>Независимо дали търсите нещо стилно, забавно, практично или персонализирано, ние предлагаме разнообразие от идеи, които ще зарадват всеки получател. Вярваме, че всеки подарък носи послание и специален момент, затова се стремим да ви предоставим най-добрите предложения за всяка ситуация.</p>
                        <p> <br> Разгледайте нашата колекция и открийте перфектния подарък, който ще направи някого щастлив!</p>

                    <!-- Space Helper Class -->
                    <div class="padding-top-x70"></div>

                    <!-- Story -->
                    <h3>Как започна всичко?</h3>
                    <div class="footer-separator"></div>
                    <p>Всичко започна с една проста, но важна идея – да улесним избора на перфектния подарък. Често сме се изправяли пред предизвикателството да намерим нещо специално за любимите си хора, затова решихме да създадем място, където всеки да открие идеалния подарък без усилие.</p>
                    <br>
                    <p>С много вдъхновение и внимание към детайла събрахме колекция от стилни, оригинални и внимателно подбрани подаръци за мъже, жени и деца. Днес сме горди, че можем да ви помогнем да създавате незабравими моменти с перфектните изненади!</p>
                    <br>
                    <p>Нашата мисия е да направим процеса на избиране на подарък лесен и приятен. Вярваме, че подаръците имат силата да създават спомени и да събират хората. Затова всеки продукт, който предлагаме, е избран с внимание и любов, за да осигури максимално удовлетворение на вас и вашите близки. За нас е важно не просто да продаваме подаръци, а да помагаме на хората да правят специални моменти още по-незабравими.</p>

                    <!-- Space Helper Class -->
                    <div class="padding-top-x70"></div>
                    {{--
                    <!-- Team Members -->
                    <div class="row text-center">
                        <div class="about-team">
                            <div class="col-sm-6 about-team-item" data-sr='wait 0.1s, ease-in 20px'>
                                <img src="{{asset('theme/img/about/team-1.jpg')}}" alt="Alternative Text" class="img-responsive">
                                <div class="caption">
                                    <h3>Hellen Madison</h3>
                                    <div class="separator"></div>
                                    <h5>Owner / Designer / Creative Director</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim.</p>
                                </div>
                            </div>

                            <div class="col-sm-6 about-team-item" data-sr='wait 0.3s, ease-in 20px'>
                                <img src="{{asset('theme/img/about/team-2.jpg')}}" alt="Alternative Text" class="img-responsive">
                                <div class="caption">
                                    <h3>Ellen Moonday</h3>
                                    <div class="separator"></div>
                                    <h5>Owner / Illustrator / Letterer </h5>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    --}}
                    <!-- Space Helper Class -->
                    <div class="padding-top-x70"></div>

                    <!-- Process -->
                    <div class="row">
                        <div class="col-sm-6" data-sr='wait 0.1s, ease-in 20px'>
                            <h3>Процесът</h3>
                            <div class="footer-separator"></div>
                            <p>Всеки подарък в нашия магазин преминава през внимателен процес на подбор. Нашата цел е да осигурим само най-качествените и уникални продукти, които ще зарадват получателя. Работим с доверени доставчици и внимателно проверяваме всеки артикул, за да гарантираме, че отговаря на нашите високи стандарти.</p>
                            <br>
                            <p>Разбираме, че всеки повод е специален, затова предлагаме персонализирани предложения за подаръци, които да отговарят на индивидуалните предпочитания на нашите клиенти. Независимо дали искате да добавите специално послание или да изберете нещо уникално, ние ще ви помогнем да направите правилния избор, който ще направи подаръка още по-личен и вълнуващ.</p>
                            <br>
                            <p>Ние се стремим да направим процеса на поръчка възможно най-лесен и удобен. След като сте избрали подаръка, просто добавяте артикула в количката и преминавате през бързата ни и сигурна система за плащане. Осигуряваме бърза и надеждна доставка, за да можете да поднесете подаръка навреме и да създадете незабравими моменти.</p>
                        </div>

                        <div class="col-sm-6">
                            <img src="{{asset('theme/img/about/about-process.jpg')}}" alt="Alternative Text" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Content -->
@endsection
