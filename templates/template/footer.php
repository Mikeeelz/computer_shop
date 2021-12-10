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
                    <?php foreach ($consultants as $name => $immage) { ?>
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="<?= $immage ?>" alt="" />
                                </div>
                            </a>
                            <p> <?= $name ?></p>
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
                        <?php foreach ($servise as $serv ) { ?>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#"><?= $serv ?></a></li>
                        </ul>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Политика</h2>
                        <?php foreach ($policies as $politic ) { ?>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#"><?= $politic ?></a></li>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>О магазине</h2>
                        <?php foreach ($about_shopper as $shop ) { ?>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#"><?= $shop ?></a></li>
                        </ul>
                        <?php } ?>
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
