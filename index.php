<?php
include "init.php";
include 'includes/header.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <?php include 'includes/side_nav.php'; ?>


            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">

                        <? include 'includes/slider.php';
                        ?>
                    </div>

                </div>

                <div class="row">
                    <?php
                    $db = Database::instance();
                    $products = $db->getAllProducts();
                    foreach ($products as $product) {
                        $description = Utils::shrinkString($product->description);
                        $product_display = <<<PRODUCT
                        
                    <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <a href="item.php?id=$product->id"><img src="../media/product_images/{$product->image}"
                         alt="$product->title" width="200px;"></a>
                        <div class="caption">
                            <h4 class="pull-right">&#36;$product->price</h4>
                            <h4>$product->title</h4>
                            <p>$description</p>
                            <button class="btn btn-primary" onclick="addToCart($product->id)">Add
                            </button>
                            <a href="../products/index.php?id=$product->id" class="btn btn-default" 
                            target="_blank">Info</a>
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