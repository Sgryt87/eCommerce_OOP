<?php
include "../../init.php";
Utils::redirectIfSet('id', '../categories/index.php');
include '../includes/header.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db = Database::instance();
    $category = $db->getCategory($_GET['id']);

    if (isset($_POST['edit'])) {
        $title = $_POST['title'];
        $updateCategory = $db->updateCategory($title, $id);
    }
}

?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Edit Category
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <form action="" method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" type="text" class="form-control" value="<?php echo $category->title?>">
            </div>
            <div class="form-group">
                <input name="edit" type="submit" class="btn btn-primary" value="Add Category">
            </div>


        </form>


    </div>


</div>

<?php include "../includes/footer.php"; ?>
