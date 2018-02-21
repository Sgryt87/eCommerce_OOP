<?php
include "../../init.php";
include '../includes/header.php';

?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Users
        </h1>
        <h3 class="bg-success">

        </h3>
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
                <th>Edit</th>
                <th>Joined</th>
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
                <td><img src="$user->image" width="100px"></td>
                <td>$user->firstname</td>
                <td>$user->lastname</td>
                <td>$user->password</td>
                <td>$user->email</td>
                <td>$user->role</td>
                <td>
                <form action="" method="post">
                <input type="hidden" name="id" value="$user->id">
                <input type="submit" value="Disable" name="disable" class="btn btn-warning btn-sm">
                <input type="submit" value="Activate" name="activate" class="btn btn-success btn-sm">
                <input type="submit" value="Delete" name="delete" class="btn btn-danger btn-sm">
                </form>
                </td>
                <td>$user->created</td>  
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
    


