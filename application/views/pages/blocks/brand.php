        <div class="brand-area <?= $brandClass ?>">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title mb-30">
                            <div class="title-icon">
                                <i class="fa fa-crop"></i>
                            </div>
                            <h3>Popular Brand</h3>
                        </div> <!-- section title end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="brand-active slick-padding slick-arrow-style">
                            <?php for ($i=0; $i<count($brand_images); $i++): ?>
                            <div class="brand-item text-center">
                                <a href="#"><img src="<?= base_url(); ?>assets/img/brand/<?= $brand_images[$i]?>" alt=""></a>
                            </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand area end -->