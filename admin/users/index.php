<?php
include "../../init.php";
include '../includes/header.php';

?>
<div class="row">
    <div class="col-lg-12">


        <h1 class="page-header">
            Users

        </h1>
        <p class="bg-success">

        </p>

        <a href="../index.php?add_user" class="btn btn-primary">Add User</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Image</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Password</th>
                <th>Email</th>
                <th>Role</th>
<!--                <th>Created</th>-->

            </tr>
            </thead>
            <tbody>
            <?php
            $db = Database::instance();
            $users = $db->getAllUsers();
            foreach ($users as $user) {
                $users_display = <<<USERS

            <tr>
                <td>$user->id</td>
                <td>$user->username</td>
                <td>$user->image</td>
                <td>$user->firstname</td>
                <td>$user->lastname</td>
                <td>$user->password</td>
                <td>$user->email</td>
                <td>$user->role</td>

            </tr>
USERS;
                echo $users_display;
            }
            ?>

            </tbody>
        </table> <!--End of Table-->
    </div>
</div>

<?php include '../includes/footer.php'; ?>
    


