<?php
include "../../init.php";
Utils::redirectIfSet('id', '../products/index.php');
include '../includes/header.php';

$db = Database::instance();
$product = $db->getProduct($_GET['id']);
$img_path_product = Config::getMediaProductRoot();
$categories = $db->getAllCategories();
if (isset($_POST['publish'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

    $image_tmp = $_FILES['file']['tmp_name'];
    $image = $_FILES['file']['name'];

    $unique_img = File::makeImageUnique($image);
    $res = File::uploadProductImage($image_tmp, $unique_img);
    if (!$res) {
        Sessions::setMessage('Image upload error');
    } else {
        File::deleteProductImage($product->image);
        Sessions::setMessage('Uploaded');
    }
    $product = $db->updateProduct($title, $category_id, $price, $quantity, $description, $unique_img, $id);
}
?>

    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Edit Product
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="" method="post" enctype="multipart/form-data">


                <div class="col-md-8">

                    <div class="form-group">
                        <label for="product-title">Product Title </label>
                        <input type="text" name="id" class="hidden" value="<?php echo $product->id; ?>">
                        <input type="text" name="title" class="form-control" value="<?php echo
                        $product->title; ?>">
                    </div>


                    <div class="form-group">
                        <label for="product-title">Product Description</label>
                        <textarea name="description" id="" cols="30" rows="12"
                                  class="form-control"><?php echo $product->description; ?></textarea>
                    </div>

                </div><!--Main Content-->


                <!-- SIDEBAR-->

                <aside id="admin_sidebar" class="col-md-4">


                    <!-- Product Categories-->

                    <div class="form-group">
                        <label for="product-title">Product Category</label>

                        <select name="category_id" id="" class="form-control">
                            <option value="<?php echo $product->category_id ?>"><?php echo 'current_product_category';
                                ?></option>
                            <?php
                            foreach ($categories as $category) {
                                $categories_display = <<<CATEGORIES

                                <option value="$category->id">$category->title</option>
CATEGORIES;
                                echo $categories_display;
                            }
                            ?>
                        </select>
                    </div>


                    <!-- Product Brands-->


                    <div class="form-group">
                        <label for="product-title">Product Quantity</label>
                        <input type="number" name="quantity" class="form-control" min="0"
                               value="<?php echo $product->quantity; ?>">
                        <h6 class="text-danger"><?php ?></h6>
                    </div>

                    <div class="form-group ">

                        <label for="product-price">Product Price</label>
                        <input type="number" name="price" class="form-control" size="60" step="any"
                               value="<?php echo $product->price; ?>">
                        <h6 class="text-danger"><?php ?></h6>

                    </div>


                    <!-- Product Image -->
                    <div class="form-group">
                        <img src="<?php echo Config::getMediaProductImageUrl() . $product->image; ?>"
                             alt="<?php echo $product->title ?>" width="294px;">
                    </div>
                    <div class="form-group">
                        <label for="product-title">Product Image</label>
                        <input type="file" name="file">
                        <hr>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="draft" class="btn btn-warning btn-sm" value="Draft">
                        <input type="submit" name="publish" class="btn btn-primary btn-sm" value="Publish">
                    </div>


                </aside><!--SIDEBAR-->

            </form>
        </div>
    </div>

<?php include '../includes/footer.php'; ?>