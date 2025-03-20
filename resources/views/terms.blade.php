@extends('layouts.master')

@section('content')
<!-- Page Parallax Header -->
<div class="parallax-header parallax-window" data-parallax="scroll" data-image-src="{{asset('theme/img/backgrounds/faq-header-bg.jpg')}}">
    <div class="ent-overlay">
        <div class="parallax-caption">
            <div class="parallax-holder">
                <h1>Полезна Информация</h1>
            </div>
        </div>
    </div>
</div>
<!-- End Page Parallax Header -->

    <!-- Page Content -->
    <div class="container page-container">
        <div class="row">
            <div class="faq-page">
                <div class="col-md-8 col-md-offset-2">

                    <!-- Tab Navabar -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#terms" id="termsTab" aria-controls="terms" role="tab" data-toggle="tab">Общи условия</a></li>
                        <li role="presentation"><a href="#privacy" id="privacyTab" aria-controls="privacy" role="tab" data-toggle="tab">Политика за поверителност</a></li>
                        <li role="presentation"><a href="#shipping" id="shippingTab" aria-controls="shipping" role="tab" data-toggle="tab">Дoставка и връщане</a></li>
                        <li role="presentation"><a href="#faq" id="faqTab" aria-controls="faq" role="tab" data-toggle="tab">F.A.Q</a></li>
                    </ul>

                    <!-- Tab Panes -->
                    <div class="tab-content">

                        <!-- T&C Panel -->
                        <div role="tabpanel" class="tab-pane fade in active faq-pane-holder" id="terms">

                            <div class="text-center">
                                <h3>Общи условия</h3>
                                <div class="separator"></div>
                                <p>Добре дошли в нашия онлайн магазин за подаръци. Моля, запознайте се с нашите общи условия, които регламентират използването на сайта и услугите ни. Използвайки този уебсайт, вие се съгласявате с посочените по-долу условия.</p>
                            </div>

                            <!-- Accordion Panel -->
                            <div class="accordion">

                                <!-- Group -->
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle active" data-toggle="collapse" href="#collapseOne">
                                            1. Общи разпоредби
                                        </a>
                                    </div>

                                    <div id="collapseOne" class="accordion-body collapse in">
                                        <div class="accordion-inner">
                                            <ul class="list-style-none">
                                                <li>1.1. Настоящите общи условия уреждат отношенията между собственика на сайта и потребителите, използващи платформата за разглеждане, поръчка и покупка на продукти.</li>
                                                <li>1.2. Собственикът на сайта си запазва правото да актуализира и променя условията по всяко време, като публикува промените на тази страница.</li>
                                                <li>1.3. Използването на сайта след промени в условията се счита за приемане на новите правила.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Group -->
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle active" data-toggle="collapse" href="#collapseTwo">
                                            2. Регистрация и лични данни
                                        </a>
                                    </div>

                                    <div id="collapseTwo" class="accordion-body collapse in">
                                        <div class="accordion-inner">
                                            <ul class="list-style-none">
                                                <li>2.1. Поръчки могат да се правят със или без регистрация. При регистрация потребителят носи отговорност за точността на предоставените данни.</li>
                                                <li>2.2. Личните данни се обработват съгласно <a href="javascript:void(0);" class="terms-link" data-target="#privacyTab">Политика за поверителност</a> на сайта.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Group -->
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle active" data-toggle="collapse" href="#collapseThree">
                                            3. Поръчки и плащания
                                        </a>
                                    </div>

                                    <div id="collapseThree" class="accordion-body collapse in">
                                        <div class="accordion-inner">
                                            <ul class="list-style-none">
                                                <li>3.1. Всички поръчки подлежат на потвърждение от страна на администратора на сайта.</li>
                                                <li>3.2. Цените на продуктите са посочени в български лева, освен ако не е упоменато друго.</li>
                                                <li>3.3. Плащането може да бъде извършено чрез наличните методи, посочени в процеса на поръчка.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Group -->
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle active" data-toggle="collapse" href="#collapseFour">
                                            4. Доставка и връщане
                                        </a>
                                    </div>

                                    <div id="collapseFour" class="accordion-body collapse in">
                                        <div class="accordion-inner">
                                            <ul class="list-style-none">
                                                <li>4.1. Условията за доставка и връщане са подробно описани в секцията <a href="javascript:void(0);" class="terms-link" data-target="#shippingTab">Дoставка и връщане</a>.</li>
                                                <li>3.2. Цените на продуктите са посочени в български лева, освен ако не е упоменато друго.</li>
                                                <li>3.3. Плащането може да бъде извършено чрез наличните методи, посочени в процеса на поръчка.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Group -->
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle active" data-toggle="collapse" href="#collapseFive">
                                            5. Авторски права
                                        </a>
                                    </div>

                                    <div id="collapseFive" class="accordion-body collapse in">
                                        <div class="accordion-inner">
                                            <ul class="list-style-none">
                                                <li>5.1. Всички изображения, текстове и съдържание на този сайт са защитени с авторски права и не могат да бъдат използвани без изрично разрешение.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Group -->
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle active" data-toggle="collapse" href="#collapseSix">
                                            6. Отговорност
                                        </a>
                                    </div>

                                    <div id="collapseSix" class="accordion-body collapse in">
                                        <div class="accordion-inner">
                                            <ul class="list-style-none">
                                                <li>6.1. Собственикът на сайта не носи отговорност за временна недостъпност на уебсайта, технически проблеми или неправилно използване на услугите.</li>
                                                <li>6.2. Потребителите носят отговорност за коректността на предоставените данни и извършените действия в платформата.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Group -->
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle active" data-toggle="collapse" href="#collapseSeven">
                                            7. Контакти
                                        </a>
                                    </div>

                                    <div id="collapseSeven" class="accordion-body collapse in">
                                        <div class="accordion-inner">
                                            <ul class="list-style-none">
                                                <li>7.1. Ако имате въпроси относно настоящите условия, можете да се свържете с нас чрез информацията в секцията <a href="{{ route('contact') }}" class="terms-link">„Контакти“</a>.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- End Accordion Panel -->
                        </div>
                        <!-- End T&C Panel -->

                        <!-- Privacy Panel -->
                        <div role="tabpanel" class="tab-pane fade faq-pane-holder" id="privacy">

                            <div class="text-center">
                                <h3>Политика за поверителност</h3>
                                <div class="separator"></div>
                                <p>Ние ценим вашето доверие и поверителност. Настоящата политика описва как събираме, използваме и защитаваме вашите лични данни при използването на нашия уебсайт.</p>
                            </div>

                            <!-- Accordion Panel -->
                            <div role="tablist" aria-multiselectable="true" class="accordion">
                                <div class="accordion">

                                    <!-- Group -->
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle active" data-toggle="collapse" href="#privacyOne">
                                                1. Каква информация събираме?
                                            </a>
                                        </div>

                                        <div id="privacyOne" class="accordion-body collapse in">
                                            <div class="accordion-inner">
                                                <ul class="list-style-none">
                                                    <li>1.1. При регистрация, поръчка или запитване може да събираме следните данни:
                                                        <ul>
                                                            <li>Име и фамилия</li>
                                                            <li>Имейл адрес</li>
                                                            <li>Телефонен номер</li>
                                                            <li>Адрес за доставка</li>
                                                            <li>Платежна информация (не се съхранява на нашите сървъри)</li>
                                                        </ul>
                                                    </li>
                                                    <li>1.2. Също така използваме автоматично събрани данни чрез „бисквитки“ за подобряване на потребителското изживяване.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Group -->
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle active" data-toggle="collapse" href="#privacyTwo">
                                                2. Как използваме вашите данни?
                                            </a>
                                        </div>

                                        <div id="privacyTwo" class="accordion-body collapse in">
                                            <div class="accordion-inner">
                                                <ul class="list-style-none">
                                                    <li>2.1. Събраната информация се използва за:
                                                        <ul>
                                                            <li>Обработване и изпълнение на поръчки</li>
                                                            <li>Подобряване на услугите и персонализиране на съдържанието</li>
                                                            <li>Комуникация с вас относно поръчки, промоции или важни промени в услугите ни</li>
                                                            <li>Спазване на законовите изисквания</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Group -->
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle active" data-toggle="collapse" href="#privacyThree">
                                                3. Как защитаваме вашите данни?
                                            </a>
                                        </div>

                                        <div id="privacyThree" class="accordion-body collapse in">
                                            <div class="accordion-inner">
                                                <ul class="list-style-none">
                                                    <li>3.1. Прилагаме технически и организационни мерки за защита на вашите лични данни от неоторизиран достъп, загуба или злоупотреба.</li>
                                                    <li>3.2. Достъпът до вашите данни е ограничен само до служители и партньори, които ги обработват съгласно тази политика.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Group -->
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle active" data-toggle="collapse" href="#privacyFour">
                                                4. Споделяне на лични данни
                                            </a>
                                        </div>

                                        <div id="privacyFour" class="accordion-body collapse in">
                                            <div class="accordion-inner">
                                                <ul class="list-style-none">
                                                    <li>4.1. Вашите данни няма да бъдат продавани или предоставяни на трети страни, освен в следните случаи:
                                                        <ul>
                                                            <li>За изпълнение на поръчки (куриерски фирми, платежни процесори)</li>
                                                            <li>Когато това е необходимо по закон</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Group -->
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle active" data-toggle="collapse" href="#privacyFive">
                                                5. „Бисквитки“ и технологии за проследяване
                                            </a>
                                        </div>

                                        <div id="privacyFive" class="accordion-body collapse in">
                                            <div class="accordion-inner">
                                                <ul class="list-style-none">
                                                    <li>5.1. Нашият сайт използва „бисквитки“ за подобряване на работата и персонализиране на съдържанието.</li>
                                                    <li>5.2. Можете да управлявате настройките на „бисквитките“ от браузъра си.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Group -->
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle active" data-toggle="collapse" href="#privacySix">
                                                6. Вашите права
                                            </a>
                                        </div>

                                        <div id="privacySix" class="accordion-body collapse in">
                                            <div class="accordion-inner">
                                                <ul class="list-style-none">
                                                    <li>6.1. Имате право да:
                                                        <ul>
                                                            <li>Получите информация за съхраняваните ви данни</li>
                                                            <li>Коригирате или изтриете личните си данни</li>
                                                            <li>Ограничите или възразите срещу обработката на данните</li>
                                                            <li>Оттеглите съгласието си за маркетингови съобщения</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Group -->
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle active" data-toggle="collapse" href="#privacySeven">
                                                7. Промени в политиката
                                            </a>
                                        </div>

                                        <div id="privacySeven" class="accordion-body collapse in">
                                            <div class="accordion-inner">
                                                <ul class="list-style-none">
                                                    <li>7.1. Запазваме правото си да актуализираме тази политика. Всички промени ще бъдат публикувани на тази страница.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Group -->
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle active" data-toggle="collapse" href="#privacyEight">
                                                8. Контакти
                                            </a>
                                        </div>

                                        <div id="privacyEight" class="accordion-body collapse in">
                                            <div class="accordion-inner">
                                                <ul class="list-style-none">
                                                    <li>8.1. Ако имате въпроси относно поверителността, моля, свържете се с нас чрез информацията в секцията <a href="{{ route('contact') }}" class="terms-link">„Контакти“</a>.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Accordion Panel -->
                        </div>
                        <!-- Privacy Panel -->

                        <!-- Shipping Panel -->
                        <div role="tabpanel" class="tab-pane fade faq-pane-holder" id="shipping">

                            <div class="text-center">
                                <h3>Доставка и връщане</h3>
                                <div class="separator"></div>
                                <p>Вашето удобство е наш приоритет! Затова предлагаме безплатна доставка до всяка точка на България, както и възможност за връщане на продукта в рамките на 14 дни от датата на получаване.</p>
                            </div>

                            <!-- Accordion Panel -->
                            <div role="tablist" aria-multiselectable="true" class="accordion">
                                <div class="accordion">

                                    <!-- Group -->
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle active" data-toggle="collapse" href="#shippingOne">
                                                1. Доставка
                                            </a>
                                        </div>

                                        <div id="shippingOne" class="accordion-body collapse in">
                                            <div class="accordion-inner">
                                                <ul class="list-style-none">
                                                    <li>1.1. Всички поръчки се обработват в рамките на 1-3 работни дни.</li>
                                                    <li>1.2. Доставката се извършва чрез надеждни куриерски услуги и е напълно безплатна за цялата страна.</li>
                                                    <li>1.3. След изпращане на поръчката ще получите номер за проследяване.</li>
                                                    <li>1.4. Ако се изисква персонализация на продукта, времето за изработка може да удължи срока за доставка.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Group -->
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle active" data-toggle="collapse" href="#shippingOne">
                                                2. Връщане и замяна
                                            </a>
                                        </div>

                                        <div id="shippingOne" class="accordion-body collapse in">
                                            <div class="accordion-inner">
                                                <ul class="list-style-none">
                                                    <li>2.1. Ако не сте доволни от своята покупка, можете да я върнете в рамките на 14 дни от датата на получаване.</li>
                                                    <li>2.2. За да бъде върнат продуктът, той трябва:
                                                        <ul>
                                                            <li>Да бъде в оригиналното си състояние, без следи от употреба.</li>
                                                            <li>Да бъде в оригиналната си опаковка, заедно с всички придружаващи аксесоари (ако има такива).</li>
                                                        </ul>
                                                    </li>
                                                    <li>2.3. Разходите по връщането са за сметка на клиента.</li>
                                                    <li>2.4. След получаване и проверка на върнатия продукт, сумата ще бъде възстановена по същия начин, по който е извършено плащането, в рамките на 7 работни дни.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Group -->
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle active" data-toggle="collapse" href="#shippingOne">
                                                3. Повредени или дефектни продукти
                                            </a>
                                        </div>

                                        <div id="shippingOne" class="accordion-body collapse in">
                                            <div class="accordion-inner">
                                                <ul class="list-style-none">
                                                    <li>3.1. В случай че получите повреден или дефектен продукт, моля, свържете се с нас до 48 часа след получаването му.</li>
                                                    <li>3.2. Ще ви съдействаме за безплатна замяна или възстановяване на сумата.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Group -->
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle active" data-toggle="collapse" href="#shippingOne">
                                                4. Контакти
                                            </a>
                                        </div>

                                        <div id="shippingOne" class="accordion-body collapse in">
                                            <div class="accordion-inner">
                                                <ul class="list-style-none">
                                                    <li>4.1. Ако имате въпроси относно доставката или връщането, не се колебайте да ни пишете чрез секцията <a href="{{ route('contact') }}" class="terms-link">„Контакти“</a>.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- End Accordion Panel -->
                        </div>
                        <!-- End Shipping Panel -->

                        <!-- FAQ Panel -->
                        <div role="tabpanel" class="tab-pane fade faq-pane-holder" id="faq">

                            <div class="text-center">
                                <h3>Често задавани въпроси (F.A.Q.)</h3>
                                <div class="separator"></div>
                                <p>За ваше удобство събрахме най-често задаваните въпроси относно нашите продукти, доставка и политика за връщане. Ако не откриете отговора, който търсите, не се колебайте да се свържете с нас!</p>
                            </div>

                            <!-- Accordion Panel -->
                            <div role="tablist" aria-multiselectable="true" class="accordion">
                                <div class="accordion">

                                    <!-- Group -->
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle active" data-toggle="collapse" href="#faqOne">
                                                1. Как се изработват продуктите?
                                            </a>
                                        </div>

                                        <div id="faqOne" class="accordion-body collapse in">
                                            <div class="accordion-inner">
                                                <p>Всички наши кожени изделия са 100% ръчна изработка. Всеки продукт се изработва с внимание към детайла и според индивидуалните изисквания на клиента. Поради това времето за изработка може да варира.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Group -->
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle" data-toggle="collapse" href="#faqTwo">
                                                2. Колко време отнема изработката и доставката?
                                            </a>
                                        </div>

                                        <div id="faqTwo" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                                <p>Обичайно изработката отнема 5-7 работни дни, в зависимост от сложността на продукта. Доставката в рамките на България е безплатна и обикновено отнема 1-2 работни дни след изпращането.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Group -->
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle" data-toggle="collapse" href="#faqThree">
                                                3. Мога ли да направя персонална поръчка?
                                            </a>
                                        </div>

                                        <div id="faqThree" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                                <p>Да! Предлагаме персонализация на изделията – можете да добавите инициали, надпис или специфичен дизайн. Свържете се с нас, за да обсъдим вашата идея.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Group -->
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle" data-toggle="collapse" href="#faqFour">
                                                4. Как мога да проследя поръчката си?
                                            </a>
                                        </div>

                                        <div id="faqFour" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                                <p>След изпращане на пратката ще получите номер за проследяване, с който можете да следите нейния статус.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Group -->
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle" data-toggle="collapse" href="#faqFive">
                                                5. Какви материали използвате?
                                            </a>
                                        </div>

                                        <div id="faqFive" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                                <p>Работим с висококачествена естествена кожа, обработена по традиционни методи, за да гарантираме дълготрайност и автентичност на всяко изделие.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Group -->
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle" data-toggle="collapse" href="#faqSix">
                                                6. Как мога да върна продукт?
                                            </a>
                                        </div>

                                        <div id="faqSix" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                                <p>Можете да върнете продукта в 14-дневен срок от получаването, ако не е използван и е в оригиналното си състояние. Повече информация за процеса на връщане ще намерите в секцията <a href="javascript:void(0);" class="terms-link" data-target="#shippingTab">„Доставка и връщане“</a>.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Group -->
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle" data-toggle="collapse" href="#faqSeven">
                                                7. Предлагате ли подаръчни опаковки?
                                            </a>
                                        </div>

                                        <div id="faqSeven" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                                <p>Да! Всички изделия са в луксозна подаръчна опаковка.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Group -->
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a class="accordion-toggle" data-toggle="collapse" href="#faqEight">
                                                8. Как мога да се свържа с вас?
                                            </a>
                                        </div>

                                        <div id="faqEight" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                                <p>Ако имате въпроси, можете да ни пишете чрез секцията <a href="{{ route('contact') }}" class="terms-link">„Тук сме за теб“</a> или на нашия имейл.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- End Accordion Panel -->
                        </div>
                        <!-- End FAQ Panel -->

                    </div>
                    <!-- End Tab Panes -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Content -->
@endsection

@push('js')
<script>
    $(document).ready(function(){
        $('.terms-link').click(function(e){
            e.preventDefault();

            var target = $(this).data('target');
            if (target) {
                $(target).trigger('click');
            } else {
                window.location = $(this).attr('href');
            }
        })
    });
</script>
@endpush
