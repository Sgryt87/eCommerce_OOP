<?php
include "../../init.php";
include '../includes/header.php';
$db = Database::instance();


if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $db->addCategory($title);
}
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Add Category
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <form action="" method="post">
            <div class="form-group">
                <label for="category-title">Title</label>
                <input name="title" type="text" class="form-control">
            </div>
            <div class="form-group">
                <input name="add" type="submit" class="btn btn-primary" value="Add Category">
            </div>


        </form>


    </div>


</div>

<?php include "../includes/footer.php"; ?>
