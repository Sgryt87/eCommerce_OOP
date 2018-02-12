<?php
include "../../init.php";
include '../includes/header.php';
$db = Database::instance();
$user = $db->getUser($_GET['id']);

?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Edit User
            <small><?php echo $user->username ?></small>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-4 user_image_box">

            <a href="#" data-toggle="modal" data-target="#photo-library"><img class="img-responsive" src="<?php
                echo $user->image ?>" alt=""></a>

        </div>


        <form action="" method="post" enctype="multipart/form-data">


            <div class="col-md-8">

                <div class="form-group">

                    <input type="file" name="file">

                </div>


                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $user->username ?>">

                </div>


                <div class="form-group">
                    <label for="first name">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="<?php echo $user->firstname ?>">

                </div>

                <div class="form-group">
                    <label for="last name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="<?php echo $user->lastname ?>">

                </div>


                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $user->password ?>">

                </div>

                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="c_password" class="form-control" value="">

                </div>

                <div class="form-group">

                    <a id="user-id" class="btn btn-danger" href="">Delete</a>

                    <input type="submit" name="update_user" class="btn btn-primary pull-right" value="Update">

                </div>
            </div>
        </form>
    </div>
</div>
<?php include '../includes/footer.php'; ?>





    