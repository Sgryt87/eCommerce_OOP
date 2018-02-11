<?php
include "init.php";
include 'includes/header.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <?php include 'includes/side_nav.php' ?>


            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">

                        <? include 'includes/slider.php' ?>

                    </div>

                </div>

                <div class="row">

                    <?php
                    $db = Database::instance();
                    $products = $db->getAllProducts();
                    foreach ($products as $product) {
                        $product_display = <<<PRODUCT
                        
                    <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <a href="item.php?id=$product->id"><img src=""
                         alt="$product->title"></a>
                        <div class="caption">
                            <h4 class="pull-right">&#36;$product->price}</h4>
                            <h4><a href="item.php?id=$product->id">$product->title</a></h4>
                            <p>$product->description<a href="item.php?id=$product->id" target="_blank"></a></p>
                            <a href="../resources/cart.php?add=$product->id" class="btn btn-primary" target="_blank">Add To Cart</a>
                        </div>
                    </div>
                </div>

PRODUCT;
                        echo $product_display;

                    }
                    ?>


                </div><!-- ROw ends here-->

            </div>

        </div>

    </div>
    <!-- /.container -->
<?php include 'includes/footer.php'; ?>