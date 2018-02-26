<?php
include "../../init.php";
include '../includes/header.php';

?>

<h1 class="page-header">
    All Products
</h1>

<h3 class="bg-success"><?php echo Session::getMessage(); ?></h3>
<a href="../products/add.php" class="btn btn-default">Add Product</a>
<br>
<table class="table table-hover">

    <thead>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Category</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $db = Database::instance();
    $products = $db->getAllProducts();
    foreach ($products as $product) {
        $products_display = <<<PRODUCTS
        
        <tr>
        <td>$product->id</td>
        <td>$product->title
        <br>
        <img src="../../media/product_images/$product->image" alt="$product->title" width="100px">
        </td>
        <td>$product->category_id</td>
        <td>$product->price</td>
        <td>$product->quantity</td>
        <td><a href="../products/edit.php?id=$product->id" class="btn btn-primary btn-sm">Edit</a><td>
        <td>
                <form action="" method="post">
                <input type="hidden" name="id" value="$product->id">
                <input type="submit" value="Delete" name="delete" class="btn btn-danger btn-sm">
                </form>
        </td>
    </tr>
PRODUCTS;
        echo $products_display;
        if (isset($_POST['id'])) {
            $product_delete = $db->deleteProduct($_POST['id']);
            Template::redirect('../products/index.php');
        }
    }
    ?>

    </tbody>
</table>
<?php include '../includes/footer.php'; ?>


