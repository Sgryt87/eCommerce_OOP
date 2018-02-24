<?php
include "../init.php";

if (isset($_POST['points']) && isset($_POST['product_id'])) {

    $db = Database::instance();
    $user = Login::getCurrentUser();
    $rating = $db->getRatingByProductAndUserId($_POST['product_id'], $user->id);

    if ($rating == null) {
        $db->addRating($_POST['product_id'], $user->id, $_POST['points']);
        echo(json_encode($rating));
    } else {
        $db->updateRating($_POST['points'], $rating->id);
        echo(json_encode($rating));
        echo('updated');
    }
} else {
    header('HTTP/1.1 400 Bad Request');
}

?>