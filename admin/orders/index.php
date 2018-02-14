<?php
include "../../init.php";
include '../includes/header.php';

?>
    <div class="row">
        <div class="col-md-12">

            <h1 class="page-header">
                All Orders
            </h1>
            <h4 class="bg-success"><?php ?></h4>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Price</th>
                    <th>Transaction</th>
                    <th>Currency</th>
                    <th>Status</th>
                    <!--                    <th>Ordered</th>-->
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $db = Database::instance();
                $orders = $db->getAllOrders();

                foreach ($orders as $order) {
                    $orders_display = <<<ORDERS

                <tr>
                <td>$order->id</td>
                <td>&#36;$order->price</td>
                <td>$order->transaction</td>
                <td>$order->currency</td>
                <td>$order->status</td>
                <td>
                <form action="" method="post">
                <input type="hidden" name="id" value="$order->id">
                <input type="submit" value="X" name="delete" class="btn btn-danger btn-sm">
                </form>
                </td>
                </tr>
                
ORDERS;
                    echo $orders_display;

                    if (isset($_POST['id'])) {
                        $order_delete = $db->deleteOrder($_POST['id']);
                        Template::redirect('../orders/index.php');
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include '../includes/footer.php'; ?>