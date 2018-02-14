<?php
include "init.php";
include 'includes/header.php';

//$message = '';
$messageErr = '';
$usernameErr = '';
$emailErr = '';
$firstNameErr = '';
$lastNameErr = '';
$passwordErr = '';
$confirm_passwordErr = '';


if (isset($_POST['submit'])) {
    $db = Database::instance();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $role = '';

    /*
    //username
    if (empty($username)) {
        $usernameErr = "Username Is Required";
    } else if (strlen($username) < 2) {
        $usernameErr = "Your Username Must Contain At Least 2 Characters";
    } else {
        if ($db->isUserExists($username)) {
            $usernameErr = 'This Username Already Exists';
        } else if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
            $usernameErr = "Only Letters And White Space Allowed";
        }
    }

    //useremail
    if (empty($user_email)) {
        $emailErr = "Email Is Required";
    } else {
        if ($db->isEmailExists($email)) {
            $emailErr = 'This Email Already Exists';
        } else if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
            $emailErr = "Invalid Email";
        }
    }

    //first_name
    if (empty($firstname)) {
        $firstNameErr = 'First Name Is Required';
    } else if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
        $firstNameErr = 'Only Letters And White Space Allowed';
    }

    //last_name
    if (empty($lastname)) {
        $lastNameErr = 'Last Name Is Required';
    } else if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
        $lastNameErr = 'Only Letters And White Space Allowed';
    }

    //password
    if (empty($password)) {
        $passwordErr = 'Password Is Required';
        if (empty($onfirm_password)) {
            $confirm_passwordErr = 'You Have To Confirm Your Password';
        }
    } else {
        if ($password !== $confirm_password) {
            $confirm_passwordErr = 'Password Doesn\'t Match';
        } else if (strlen($password) <= 2) { // has to be 8 digits
            $passwordErr = 'Your Password Must Contain At Least 8 Characters';
        } elseif (!preg_match("#[0-9]+#", $user_password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Number!";
        } elseif (!preg_match("#[A-Z]+#", $user_password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
        }
    }

    if (
        $usernameErr === '' &&
        $emailErr === '' &&
        $firstNameErr === '' &&
        $lastNameErr === '' &&
        $passwordErr === '' &&
        $confirm_passwordErr === '') {
    */

    $password = User::passwordHash($password);

    $user = $db->addUser($username, $firstname, $lastname, $password, $email, $role = 'subscriber');

//        setMessage('Congratulations, You Have Been Registered!');
//    }
} // end if


?>
<!-- Page Content -->
<div class="container">
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Registration</h1>
                        <h6 class="text-info">* - required fields</h6>
                        <br>

                        <h5 class="text-center text-success bg-success center-block"><?php //message ?></h5>
                        <form role="form" action="../registration.php" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <h6 class="text-info">*Username (Your Username Must Contain At Least 3 Characters)</h6>
                                <label for="username" class="sr-only">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                       placeholder="Please Enter Your Username">
                                <h5 class="text-center text-danger"><?php echo $usernameErr; ?></h5>
                            </div>
                            <div class="form-group">
                                <h6 class="text-info">*Email</h6>
                                <label for="user_email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="Please Enter Your Email">
                                <h5 class="text-center text-danger"><?php echo $emailErr; ?></h5>
                            </div>
                            <div class="form-group">
                                <h6 class="text-info">*First Name</h6>
                                <label for="user_firstname" class="sr-only">First Name</label>
                                <input type="text" name="firstname" id="first_name" class="form-control"
                                       placeholder="Please Enter Your First Name">
                                <h5 class="text-center text-danger"><?php echo $firstNameErr; ?></h5>
                            </div>
                            <div class="form-group">
                                <h6 class="text-info">*Last Name</h6>
                                <label for="user_lastname" class="sr-only">Last Name</label>
                                <input type="text" name="lastname" id="last_name" class="form-control"
                                       placeholder="Please Enter Your Last Name">
                                <h5 class="text-center text-danger"><?php echo $lastNameErr;; ?></h5>
                            </div>
                            <div class="form-group">
                                <h6 class="text-info">*Password (Password Must Contain At Least 8 Characters, One
                                    Capital Letter And
                                    One
                                    Number)</h6>
                                <label for="user_password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control"
                                       placeholder="Please enter Your Password">
                                <h5 class="text-center text-danger"><?php echo $passwordErr; ?></h5>
                            </div>
                            <div class="form-group">
                                <h6 class="text-info">*Confirm Password</h6>
                                <label for="user_confirm_password" class="sr-only form-group">Confirm Password</label>
                                <input type="password" name="confirm_password" id="con_key" class="form-control"
                                       placeholder="Confirm Your Password">
                                <h5 class="text-center text-danger">
                                    <h5 class="text-center text-danger"><?php echo $confirm_passwordErr; ?></h5>
                            </div>
                            <input type="submit" name="submit" id="btn-login" class="btn btn-default btn-lg btn-block"
                                   value="Register">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>
    <?php include 'includes/footer.php'; ?>
