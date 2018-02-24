<?php

$user = Login::getCurrentUser();
$rating = $db->getRatingByProductAndUserId($product->id, $user->id);


?>

<div class="col-md-6">
    <h3>Add A review<?php //echo $rating->id; ?></h3>

    <form action="" class="form-inline">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name">
            <input type="hidden" name="id" value="<?php echo $product->id; ?>" id="product_id">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email">
        </div>

        <div>
            <h3>Your Rating</h3>
            <fieldset id='demo1' class="rating">
                <input class="stars" type="radio" id="star5" name="rating"
                       value="5" <?php if (isset($rating)) {
                    echo $rating->points == 5 ? "checked" : '';
                }; ?>/>
                <label class="full" for="star5" title="Awesome - 5 stars"></label>
                <input class="stars" type="radio" id="star4" name="rating"
                       value="4" <?php if (isset($rating)) {
                    echo $rating->points == 4 ? "checked" : '';
                }; ?>/>
                <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                <input class="stars" type="radio" id="star3" name="rating"
                       value="3" <?php if (isset($rating)) {
                    echo $rating->points == 3 ? "checked" : '';
                } ?>/>
                <label class="full" for="star3" title="Meh - 3 stars"></label>
                <input class="stars" type="radio" id="star2" name="rating"
                       value="2" <?php if (isset($rating)) {
                    echo $rating->points == 2 ? "checked" : '';
                }; ?>/>
                <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                <input class="stars" type="radio" id="star1" name="rating"
                       value="1" <?php if (isset($rating)) {
                    echo $rating->points == 1 ? "checked" : '';
                }; ?>/>
                <label class="full" for="star1" title="Sucks big time - 1 star"></label>
            </fieldset>
        </div>

        <br>

        <div class="form-group">
            <textarea name="review" id="" cols="60" rows="10" class="form-control"></textarea>
        </div>

        <br>
        <br>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
        </div>
    </form>

</div>
