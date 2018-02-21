<?php

include_once '../init.php';
Utils::redirectIfSet('id', '../index.php');
include '../includes/header.php';

$db = Database::instance();
$product = $db->getProduct($_GET['id']);
?>
    <!-- Page Content -->
    <div class="container">

        <!-- Side Navigation -->

        <?php include '../includes/side_nav.php'; ?>

        <div class="col-md-9">

            <!--Row For Image and Short Description-->

            <div class="row">

                <div class="col-md-7">


                    <img class="img-responsive" src="../media/product_images/<?php echo $product->image ?>"
                         alt="<?php echo $product->title ?>">


                </div>

                <div class="col-md-5">

                    <div class="thumbnail">


                        <div class="caption-full">
                            <h4><?php echo $product->title ?></h4>
                            <hr>
                            <h4 class="">&#36;<?php echo $product->price; ?></h4>

                            <div class="ratings">
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    4.0 stars
                                </p>
                            </div>
                            <p>
                                <?php
                                echo Utils::shrinkString($product->description);
                                ?>
                            </p>

                            <button class="btn btn-primary" onclick="addToCart(<?php echo $product->id ?>)">Add
                            </button>
                            <form action="../cart/index.php" method="post">
                                <div class="form-group">
                                    <input type="hidden" value="<?php echo $product->id ?>" name="id" id="productId">
                                    <input type="submit" value="Buy" name="submit" class="btn btn-primary">
                                </div>
                            </form>

                        </div>

                    </div>

                </div>


            </div><!--Row For Image and Short Description-->


            <hr>


            <!--Row for Tab Panel-->

            <div class="row">

                <div role="tabpanel">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#description"
                                                                  aria-controls="description"
                                                                  role="tab"
                                                                  data-toggle="tab">Description</a></li>
                        <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab"
                                                   data-toggle="tab">Reviews</a>
                        </li>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="description">
                            <p></p>
                            <p><?php echo $product->description; ?></p>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="reviews">

                            <div class="col-md-6">

                                <h3>2 Reviews From </h3>

                                <hr>
                                <?php
                                $reviews = $db->getAllReviews();
                                foreach ($reviews as $review) {
                                    $reviews_display = <<<REVIEWS
                                    
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star-empty"></span>
                                        Anonymous
                                        <span class="pull-right">$review->created</span>
                                        <p>$review->review</p>
                                    </div>
                                </div>

                                <hr>
REVIEWS;
                                    echo $reviews_display;
                                }

                                ?>

                            </div>


                            <?php //include '../rating/index.php'?>
                            <div class="col-md-6">
                                <h3>Add A review</h3>

                                <form action="" class="form-inline">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="test" class="form-control">
                                    </div>

                                    <div>
                                        <h3>Your Rating</h3>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                    </div>

                                    <br>

                                    <div class="form-group">
                                                <textarea name="" id="" cols="60" rows="10"
                                                          class="form-control"></textarea>
                                    </div>

                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="SUBMIT">
                                    </div>
                                </form>

                            </div>

                        </div>

                    </div>

                </div>


            </div><!--Row for Tab Panel-->


        </div><!-- col-md-9 ends here -->


    </div>
    <!-- /.container -->

<?php include "../includes/footer.php"; ?>