<?php
include_once 'init.php';
Template::header();
?>

    <!-- Page Content -->
    <div class="container">

        <header>
            <h1 class="text-center">Login</h1>
            <h2 class="text-center bg-warning"></h2>
            <div class="col-sm-4 col-sm-offset-5">
                <form class="" action="" method="post" enctype="multipart/form-data">


                    <div class="form-group"><label for="">
                            username<input type="text" name="username" class="form-control"></label>
                    </div>
                    <div class="form-group"><label for="password">
                            Password<input type="password" name="password" class="form-control"></label>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>


        </header>


    </div>

<?php Template::footer(); ?>