<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc_kre.php" method="post">
	<label for="id_N">Kwota udzielonego kredytu: </label>
	<input id="id_N" type="text" name="N" value="" /><br />

	<label for="id_r">Oprocentowanie kredytu w skali roku: </label>
	<input id="id_r" type="text" name="r" value="" />%<br />
	
	<label for="id_k">Liczba rat płatnych w skali roku: </label>
	<input id="id_k" type="text" name="k" value="" /><br />

	<label for="id_n">Liczba rat: </label>
	<input id="id_n" type="text" name="n" value="" /><br />


	<input type="submit" value="Oblicz" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: rgb(230,30,120); width:300px;">
<?php echo 'Rata miesięczna: '.$result.'zł'; ?>
</div>
<?php } ?>
<?php if (isset($cal)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: rgb(30,230,120); width:300px;">
<?php echo 'Całkowita kwota spłaty: '.$cal.'zł'; ?>
</div>
<?php } ?>
<?php if (isset($kk)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: rgb(230,129,40); width:300px;">
<?php echo 'Koszt kredytu: '.$kk.'zł'; ?>
</div>
<?php } ?>

</body>
</html>
