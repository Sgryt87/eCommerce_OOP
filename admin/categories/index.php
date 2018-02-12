<?php
include "../../init.php";
include '../includes/header.php';

?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Product Categories

        </h1>
    </div>
</div>

<div class="row">
    <div class="col-md-4">

        <h3 class="bg-success"></h3>

        <form action="" method="post">

            <div class="form-group">
                <label for="category-title">Title</label>
                <input name="cat_title" type="text" class="form-control">
            </div>

            <div class="form-group">

                <input name="add_category" type="submit" class="btn btn-primary" value="Add Category">
            </div>


        </form>


    </div>


    <div class="col-md-8">

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
            $categories = $db->getAllCategories();
            foreach ($categories as $category) {
                $categories_display = <<<CATEGORIES
            <tr>
                <td>$category->id</td>
                <td>$category->title</td>
                 <td><a href="edit.php?id=$category->id" class="btn btn-primary">Edit</a><td>
                <form action="" method="post">
                <input type="hidden" name="id" value="$category->id">
                <input type="submit" value="Delete" name="delete" class="btn btn-danger btn-sm">
                </form>
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
