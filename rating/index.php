<?php
$id = (int)$_GET['id'];
$res = $pdo->prepare("SELECT * FROM ratings WHERE id = ?");
$res->execute(array($id));
while ($rating = $res->fetchObject()) {
		$calculate = ($rating->pontos == 0) ? 0 : round(($rating->pontos/$rating->votos), 1);
?>
<h1><?php echo utf8_encode($rating->title);?> - <a href="index.php">Voltar</a></h1>
<span class="ratingAverage" data-average="<?php echo $calculate;?>"></span>
<span class="article" data-id="<?php echo $id;?>"></span>

<div class="barra">
	<span class="bg"></span>
	<span class="stars">
<?php for($i=1; $i<=5; $i++):?>


<span class="star" data-vote="<?php echo $i;?>">
	<span class="starAbsolute"></span>
</span>
<?php
	endfor;
	echo '</span></div><p class="votos"><span>'.$rating->votos.'</span> votos</p>';
}
?>