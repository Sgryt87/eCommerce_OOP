<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../index.php">Home</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li>
                <a href="../admin">Admin</a>
            </li>
            <li>
                <a href="../contact.php">Contact</a>
            </li>
            <li>
                <a href="../registration.php">Registration</a>
            </li>
            <?php
            if (isset($_SESSION['user'])) {
                $displayName = <<<WELCOME
                
            <li><a href="">Welcome, {$_SESSION['user']->username}</a></li>
            <li><a href="../logout.php">Logout</a></li>
WELCOME;
                echo $displayName;
            } else {
                $displayLogin = <<<LOGIN
                
            <li>
                <a href="../login.php">Login</a>
            </li>
LOGIN;
                echo $displayLogin;
            }
            ?>


            <li>
                <a href="../cart/index.php"><i class="glyphicon glyphicon-shopping-cart"></i>Cart<span
                            id="cartTopNav"><?php echo
                        Cookie::getAllProductCount() ?></span></a>
            </li>
        </ul>

    </div>
    <!-- /.navbar-collapse -->
</div>
<!-- /.container -->