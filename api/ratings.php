<?php
include_once "../init.php";


if (isset($_POST['vote'])) {
    $id = (int)$_POST['title'];
    $point = (int)$_POST['points'];

    $stmt = $pdo->prepare("SELECT votes, points FROM ratings WHERE `id` = ?");
    $stmt->execute(array($id));
    while ($row = $stmt->fetchObject()) {
        $pointsUpdate = ($row->points + $point);
        $votesUpdate = ($row->votes + 1);

        $res = $pdo->prepare("UPDATE `ratings` SET `votes` = ?, `points` = ? WHERE `id` = ?");
        if ($res->execute(array($votesUpdate, $pointsUpdate, $id))) {
            $calculate = round(($pointsUpdate / $votesUpdate), 1);
            die(json_encode(array('average' => $calculate, 'votes' => $votosUpd)));
        }
    }
}
?>