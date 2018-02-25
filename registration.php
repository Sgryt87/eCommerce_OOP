<?php
include "init.php";
include 'includes/header.php';


if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['confirm_password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    Registration::register($username, $firstname, $lastname, $email, $password, $passwordConfirm);
}


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

                        <h5 class="text-center text-success bg-success center-block">
                            <?php echo Registration::getNotification(Notification::$registrationSuccess) ?>
                        </h5>
                        <form role="form" action="../registration.php" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <h6 class="text-info">*Username (Your Username Must Contain At Least 3 Characters)</h6>
                                <label for="username" class="sr-only">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                       placeholder="Please Enter Your Username">
                                <h5 class="text-center text-danger">
                                    <?php echo Registration::getNotification(Notification::$usernameReuired) ?>
                                    <?php echo Registration::getNotification(Notification::$usernameExists) ?>
                                    <?php echo Registration::getNotification(Notification::$usernameLength) ?>
                                    <?php echo Registration::getNotification(Notification::$usernameLettersAndWhiteSpace) ?>
                                </h5>
                            </div>
                            <div class="form-group">
                                <h6 class="text-info">*Email</h6>
                                <label for="user_email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="Please Enter Your Email">
                                <h5 class="text-center text-danger">
                                    <?php echo Registration::getNotification(Notification::$emailExists) ?>
                                    <?php echo Registration::getNotification(Notification::$emailRequired) ?>
                                    <?php echo Registration::getNotification(Notification::$invalidEmail) ?>
                                </h5>
                            </div>
                            <div class="form-group">
                                <h6 class="text-info">*First Name</h6>
                                <label for="user_firstname" class="sr-only">First Name</label>
                                <input type="text" name="firstname" id="first_name" class="form-control"
                                       placeholder="Please Enter Your First Name">
                                <h5 class="text-center text-danger">
                                    <?php echo Registration::getNotification(Notification::$firstnameRequired) ?>
                                    <?php echo Registration::getNotification(Notification::$firstnameLettersAndWhiteSpace) ?>
                                </h5>
                            </div>
                            <div class="form-group">
                                <h6 class="text-info">*Last Name</h6>
                                <label for="user_lastname" class="sr-only">Last Name</label>
                                <input type="text" name="lastname" id="last_name" class="form-control"
                                       placeholder="Please Enter Your Last Name">
                                <h5 class="text-center text-danger">
                                    <?php echo Registration::getNotification(Notification::$lastnameRequired) ?>
                                    <?php echo Registration::getNotification
                                    (Notification::$lastnameLettersAndWhiteSpace) ?>
                                </h5>
                            </div>
                            <div class="form-group">
                                <h6 class="text-info">*Password (Password Must Contain At Least 8 Characters, One
                                    Capital Letter And
                                    One
                                    Number)</h6>
                                <label for="user_password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control"
                                       placeholder="Please enter Your Password">
                                <h5 class="text-center text-danger">
                                    <?php echo Registration::getNotification(Notification::$passwordRequired) ?>
                                    <?php echo Registration::getNotification(Notification::$passwordLength) ?>
                                    <?php echo Registration::getNotification(Notification::$passwordMustContainCapLetter) ?>
                                    <?php echo Registration::getNotification(Notification::$passwordMustContainNumber) ?>
                                    <?php echo Registration::getNotification(Notification::$passwordDoesntMatch) ?>
                                </h5>
                            </div>
                            <div class="form-group">
                                <h6 class="text-info">*Confirm Password</h6>
                                <label for="user_confirm_password" class="sr-only form-group">Confirm Password</label>
                                <input type="password" name="confirm_password" id="con_key" class="form-control"
                                       placeholder="Confirm Your Password">
                                <h5 class="text-center text-danger">
                                    <h5 class="text-center text-danger">
                                        <?php echo Registration::getNotification(Notification::$passwordDoesntMatch) ?>
                                        <?php echo Registration::getNotification(Notification::$confirmPassword) ?>
                                    </h5>
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
