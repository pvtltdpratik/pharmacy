<style>
    .product-img-holder {
        width: 100%;
        height: 15em;
        overflow: hidden;
    }

    .product-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center center;
        transition: all .3s ease-in-out;
    }

    .product-item:hover .product-img {
        transform: scale(1.2)
    }
</style>
<section class="py-3">
    <div class="container">
        <div class="content bg-gradient-maroon py-5 px-3">
            <h4 class="">Our Available Products</h4>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-11">
                    <div class="card border-0 rounded-3 shadow">
                        <div class="card-body">
                            <div class="row row-cols-xl-4 row-md-6 row-cols-1 gy-4 gx-4">
                                <?php
                                $qry = $conn->query("SELECT *, (COALESCE((SELECT SUM(quantity) FROM `stock_list` where product_id = product_list.id and (expiration IS NULL or date(expiration) > '" . date("Y-m-d") . "') ), 0) - COALESCE((SELECT SUM(quantity) FROM `order_items` where product_id = product_list.id), 0)) as `available` FROM `product_list` where (COALESCE((SELECT SUM(quantity) FROM `stock_list` where product_id = product_list.id and (expiration IS NULL or date(expiration) > '" . date("Y-m-d") . "') ), 0) - COALESCE((SELECT SUM(quantity) FROM `order_items` where product_id = product_list.id), 0)) > 0 order by RAND()");
                                while ($row = $qry->fetch_assoc()) :
                                ?>
                                    <div class="col">
                                        <a class="card rounded-3 shadow-sm product-item text-decoration-none text-reset" href="./?p=products/view_product&id=<?= $row['id'] ?>">
                                            <div class="position-relative">
                                                <div class="img-top position-relative product-img-holder">
                                                    <img src="<?= validate_image($row['image_path']) ?>" alt="" class="img-fluid rounded">
                                                </div>
                                            </div>
                                            <div class="position-absolute top-0 end-0 mt-3 me-3">
                                                <span class="badge bg-secondary"><?= format_num($row['price'], 2) ?></span>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title mb-0"><?= $row['name'] ?></h5>
                                                <p class="card-text"><small class="text-muted"><?= $row['brand'] ?></small></p>
                                                <p class="card-text"><small class="text-muted">Available: <?= format_num($row['available'], 0) ?></small></p>
                                            </div>
                                        </a>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>