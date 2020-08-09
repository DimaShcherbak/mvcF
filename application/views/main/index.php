<header class="masthead" style="background-image: url('public/images/fonstola_129120_1920x1080.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <span class="subheading">F L E X</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php /** @var array $activeBanners */ ?>
            <?php if (count($activeBanners)) { ?>
                <div class="flexslider">
                    <ul class="slides">
                        <?php foreach ($activeBanners as $activeBanner) { ?>
                            <li>
                                <a href="<?= $activeBanner['url'] ?>">
                                    <p><?= $activeBanner['title'] ?></p>
                                    <img src="<?= $activeBanner['image'] ?>">
                                </a>
                            </li>

                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>
</div>