<?php
include "../../init.php";
include '../includes/header.php';

?>

<h1 class="page-header">
    All Products

</h1>

<h3 class="bg-success"></h3>
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
        <td>$product->title</td>
        <td>$product->category_id</td>
        <td>$product->price</td>
        <td>$product->quantity</td>
        <td><a href="edit.php?id=$product->id" class="btn btn-primary">Edit</a><td>
        <td>
                <form action="" method="post">
                <input type="hidden" name="id" value="$product->id">
                <input type="submit" value="Delete" name="delete" class="btn btn-danger btn-sm">
                </form>
        </td>
    </tr>
PRODUCTS;
        echo $products_display;

    }

    ?>


    </tbody>
</table>
<?php include '../includes/footer.php'; ?>


