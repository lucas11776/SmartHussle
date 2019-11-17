<div class="col-xl-4 col-md-6 grid-item sale">
    <div class="product">
        <div class="product_image">
            <img src="<?= base_url($picture) ?>" alt="<?= $name ?>">
        </div>
        <div class="product_content">
            <div class="product_info d-flex flex-row align-items-start justify-content-start">
                <div>
                    <div>
                        <div class="product_name">
                            <a class="text-capitalize" href="<?= base_url('store/' . $slug) ?>"><?= $name ?></a>
                        </div>
                        <div class="product_category">
                            Category : <a class="text-capitalize" href="<?= base_url('categories/' . $category) ?>)"><?= $category ?></a>
                        </div>
                    </div>
                </div>
                <div class="ml-auto text-right">
                    <!-- Removed home_item_rating -->
                    <div class="product_price text-right">
                        R<?= number_format($price, 0) ?><span>.<?= $this->products->price_decimal($price) ?></span>
                    </div>
                </div>
            </div>
            <div class="product_buttons">
                <a href="<?= base_url('order/product/' . $pid) ?>" class="text-right d-flex flex-row align-items-start justify-content-start" title="Order Online Now...">
                    <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                        <div>
                            <div>
                                <img src="<?= base_url('assets/images/cart.svg') ?>" class="svg" alt="Order Online..."><div>+</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>