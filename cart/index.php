<?php
include_once '../init.php';
include '../includes/header.php';
?>


<!-- Page Content -->
<div class="container">


    <!-- /.row -->

    <div class="row">
        <h4 class="text-center bg-danger"></h4>
        <h1>Checkout</h1>

        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="business" value="xxx-facilitator@gmail.com">
            <input type="hidden" name="currency_code" value="US">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub-total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $db = Database::instance();
                $productsInCart = Cookie::getAllProducts();
                if (!empty($productsInCart)) {
                    foreach ($productsInCart as $product_id => $product_quantity) {
                        $product = $db->getProduct($product_id);
                        $subtotal = $product_quantity * $product->price;
                        $checkout = <<<CHECKOUT
                    
                <tr id="tr-$product->id">
                    <td>$product->title</td>
                    <td>&#36;$product->price</td>
                    <td><span id="quantity-$product->id">$product_quantity</span>
                    <input id="cart_add_btn-$product->id" type="button" onclick="addToCart($product->id)" value="+"/>
                    <input id="cart_remove_btn-$product->id" type="button" onclick="removeFromCart($product->id)" 
                    value="-"/>
                    </td>
                    <td id="subtotal-$product->id-">&#36;$subtotal</td>
                </tr>
                
CHECKOUT;
                        echo $checkout;
                    }
                    $paypal_btn = <<<BTN

            <input type="image" name="upload"
                   src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                   alt="PayPal - The safer, easier way to pay online">
BTN;
                    echo $paypal_btn;
                } else {
                    echo '<h3 class="">Your shopping cart is empty</h3>';
                }
                ?>
                </tbody>
        </form>

        <!--  ***********CART TOTALS*************-->

        <div class="col-xs-4 pull-right ">
            <h2>Cart Totals</h2>
            <table class="table table-bordered" cellspacing="0">
                <tbody>
                <tr class="cart-subtotal">
                    <th>Items:</th>
                    <td><span class="amount"></span></td>
                </tr>
                <tr class="shipping">
                    <th>Shipping and Handling</th>
                    <td>Free Shipping</td>
                </tr>
                <tr class="order-total">
                    <th>Order Total</th>
                    <td><strong><span class="amount">&#36;</span></strong></td>
                </tr>
                </tbody>
            </table>

        </div><!-- CART TOTALS-->


    </div><!--Main Content-->


</div>
<!-- /.container -->


<?php include '../includes/footer.php'; ?>
