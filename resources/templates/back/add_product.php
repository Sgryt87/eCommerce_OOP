<?php addProductAdmin(); ?>
<div class="col-md-12">

    <div class="row">
        <h1 class="page-header">
            Add Product
        </h1>
    </div>
    <h3 class="text-success"><?php displayMessage(); ?></h3>

    <form action="" method="post" enctype="multipart/form-data">


        <div class="col-md-8">

            <div class="form-group">
                <label for="product-title">Product Title </label>
                <input type="text" name="product_title" class="form-control">

            </div>


            <div class="form-group">
                <label for="product-title">Product Description</label>
                <textarea name="product_description" id="" cols="30" rows="12" class="form-control"></textarea>
            </div>


            <!--            <div class="form-group">-->
            <!--                <label for="product-title">Product Short Description</label>-->
            <!--                <textarea name="short_desc" id="" cols="30" rows="3" class="form-control"></textarea>-->
            <!--            </div>-->


        </div><!--Main Content-->


        <!-- SIDEBAR-->


        <aside id="admin_sidebar" class="col-md-4">


            <!-- Product Categories-->

            <div class="form-group">
                <label for="product-title">Product Category</label>

                <select name="product_category_id" id="" class="form-control">
                    <option value="" disabled>Select Category</option>
                    <?php displayCategoriesInProductsAdmin(); ?>
                </select>
            </div>


            <!-- Product Brands-->


            <div class="form-group">
                <label for="product-title">Product Quantity</label>
                <input type="number" name="product_quantity" class="form-control" min="0">
                <h6 class="text-danger"><?php //message ?></h6>
            </div>

            <div class="form-group ">

                <label for="product-price">Product Price</label>
                <input type="number" name="product_price" class="form-control" size="60" step="any">
                <h6 class="text-danger"><?php //message ?></h6>

            </div>


            <!-- Product Tags -->


            <!--  <div class="form-group">
                   <label for="product-title">Product Keywords</label>
                   <hr>
                 <input type="text" name="product_tags" class="form-control">
             </div>
          -->
            <!-- Product Image -->
            <div class="form-group">
                <label for="product-title">Product Image</label>
                <input type="file" name="file">
                <hr>
            </div>

            <div class="form-group">
                <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
                <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
            </div>


        </aside><!--SIDEBAR-->


    </form>
