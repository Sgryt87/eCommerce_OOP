<?php
include "../../init.php";
include '../includes/header.php';

?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Categories
        </h1>
        <h3 class="bg-success"></h3>
        <a href="../../admin/categories/add.php" class="btn btn-default">Add Category</a>
    </div>
</div>

<div class="row">

    <div class="col-md-12">

        <table class="table">
            <thead>

            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <?php
            $db = Database::instance();
            if (isset($_POST['id'])) {
                $delete_category = $db->deleteCategory($_POST['id']);
            }
            $categories = $db->getAllCategories();
            foreach ($categories as $category) {
                $categories_display = <<<CATEGORIES
            <tr>
                <td>$category->id</td>
                <td>$category->title</td>
                 <td><a href="../categories/edit.php?id=$category->id" class="btn btn-primary">Edit</a><td>
                <form action="" method="post">
                <input type="hidden" name="id" value="$category->id">
                <input type="submit" value="Delete" name="delete" class="btn btn-danger btn-sm">
                </form>
                </td>
            </tr>
CATEGORIES;
                echo $categories_display;
            }
            ?>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
