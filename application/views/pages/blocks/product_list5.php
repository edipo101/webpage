        <div class="latest-product <?=  $pb28; ?>">
            <div class="container">
                <div class="section-title mb-30">
                    <div class="title-icon">
                        <i class="<?= $icon ?>"></i>
                    </div>
                    <h3><?= $title?></h3>
                </div> <!-- section title end -->
                <!-- featured category start -->
                <div class="latest-product-active slick-padding slick-arrow-style">
                    <?php foreach($products as $key => $row): ?>
                    <!-- product single item start -->
                    <div class="product-item fix">
                        <div class="product-thumb">
                            <a href="<?= base_url(); ?>home/page/product_details">
                                <img src="<?= base_url(); ?>assets/img/product/product-img<?= $row->product_id ?>.jpg" class="img-pri" alt="">
                            </a>
                            <?php if (isset($label) && !is_null($label)): ?>
                            <div class="product-label"><span><?= $label ?></span></div>
                            <?php endif; ?>
                        </div>
                        <div class="product-content">
                            <h4><a href="<?= base_url(); ?>home/page/product_details"><?= $row->title ?></a></h4>
                            <div class="pricebox">
                                <span class="regular-price">Bs <?= number_format($row->sale_price, 2) ?></span>
                                <div class="ratings">
                                    <?php 
                                    $rating = ($row->rating_num > 0) ? $row->rating_total/$row->rating_num : 0;
                                    for ($i = 0; $i < 5; $i++):
                                        $class = ($i == 4) ? '': ' class="good"';
                                        $icon = ($i < $rating) ? 'fa fa-star' : 'fa fa-star-o';
                                    ?>
                                    <span<?= $class ?>><i class="<?= $icon ?>"></i></span>
                                    <?php endfor; ?>
                                    <div class="pro-review">
                                        <span><?= $row->rating_num?> review(s)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product single item end -->
                    <?php endforeach; ?>

                </div>
                <!-- featured category end -->
            </div>
        </div>
        <!-- latest product end -->