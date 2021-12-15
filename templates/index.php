<?php require_once 'template/template_header.php' ?>

<?php
/**
 * @var array $brands
 * @var array $categories
 * @var array $products
 * @var array $banners
 */
?>

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php foreach ($banners as $key => $banner) { ?>
                            <li data-target="#slider-carousel" data-slide-to="0"
                                class="<?= $key === 0 ? 'active' : '' ?>"></li>
                        <?php } ?>
                    </ol>

                    <div class="carousel-inner">
                        <?php foreach ($banners as $key => $banner) { ?>
                            <div class="item <?= $key === 0 ? 'active' : '' ?>">
                                <div class="col-sm-6">
                                    <h1><?= $banner['title'] ?></h1>
                                    <h2><?= $banner['subtitle'] ?></h2>
                                    <p><?= $banner['description'] ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <img src="<?= $banner['image'] ?>" class="girl img-responsive" alt=""/>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категории</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php foreach ($categories as $category) { ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#"><?= $category['title'] ?></a></h4>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="brands_products"><!--brands_products-->
                        <h2>Производители</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <?php foreach ($brands as $brand) { ?>
                                    <li>
                                        <a href="#"><?= $brand['title'] ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div><!--/brands_products-->
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Новые товары</h2>
                    <?php foreach ($products as $product) { ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?= $product['image'] ?>" alt=""/>
                                        <h2><?= number_format($product['price'], 0, '', ' ') ?> руб.</h2>
                                        <p><?= $product['title'] ?></p>
                                        <a href="#" class="btn btn-default add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            В корзину
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>

<?php require_once 'template/template_footer.php' ?>
