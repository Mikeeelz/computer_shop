<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2>TWOC</h2>
                        <p>Наши консультанты всегда помогут вам в режиме online</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <?php foreach ($consultants as $consultant) { ?>
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="<?= $consultant['image'] ?>" alt="" />
                                </div>
                            </a>
                            <p> <?= $consultant['name'] ?></p>
                        </div>
                    </div>
                    <?php } ?>

                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="/media/consultants/comp.jpg" alt="111" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Услуги</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">'Связаться с нами'</a></li>
                        </ul>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">'Статус заказа'</a></li>
                        </ul>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">'Изменить местоположение'</a></li>
                        </ul>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">'Часто задаваемые вопросы'</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Политика</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">'Условия эксплуатации'</a></li>
                        </ul>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">'Политика конфиденциальности'</a></li>
                        </ul>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">'Политика возврата'</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>О магазине</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">'Информация о компании'</a></li>
                        </ul>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">'Карьера'</a></li>
                        </ul>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">'Расположение магазина'</a></li>
                        </ul>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">'Партнёрская программа'</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>УДАЛИТЬ?</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->
