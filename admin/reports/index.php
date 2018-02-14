<?php
include "../../init.php";
include '../includes/header.php';

?>
<h1 class="page-header">
    All Products

</h1>

<h3 class="bg-success"></h3>
<table class="table table-hover">


    <thead>

    <tr>
        <th>Id</th>
        <th>Product Id</th>
        <th>Order Id</th>
        <th>Price</th>
        <th>Product title</th>
        <th>Product quantity</th>
        <th>Purchased</th>
        <th>Delete</th>
    </tr>
    </thead>
    <?php
    $db = Database::instance();
    $reports = $db->getAllReports();
    foreach ($reports as $report) {
        $reports_display = <<<REPORTS
        <tr>
        <td>$report->id</td>
        <td>$report->product_id</td>
        <td>$report->order_id</td>
        <td>Price...</td>
        <td>Product Title...</td>
        <td>Prod Quantity...</td>
        <td>$report->purchased</td>
         <td>
                <form action="" method="post">
                <input type="hidden" name="id" value="$report->id">
                <input type="submit" value="X" name="delete" class="btn btn-danger btn-sm">
                </form>
          </td>
        </tr>
REPORTS;
        echo $reports_display;

        if (isset($_POST['id'])) {
            $report_delete = $db->deleteReport($_POST['id']);
            Template::redirect('../reports/index.php');
        }
    }
    ?>
    <tbody>


    </tbody>
</table>

<?php include "../includes/footer.php"; ?>



