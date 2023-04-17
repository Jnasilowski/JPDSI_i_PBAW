<?php
//Tu już nie ładujemy konfiguracji - sam widok nie będzie już punktem wejścia do aplikacji.
//Wszystkie żądania idą do kontrolera, a kontroler wywołuje skrypt widoku.
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Kalkulator</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

<div style="width:90%; margin: 2em auto;">
	
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto;">

<form action="<?php print(_APP_URL);?>/app/calc_kre.php" method="post">
	<label for="id_N">Kwota udzielonego kredytu: </label>
	<input id="id_N" type="text" name="N" value="" /><br />

	<label for="id_r">Oprocentowanie kredytu w skali roku: </label>
	<input id="id_r" type="text" name="r" value="" />%<br />
	
	<label for="id_k">Liczba rat płatnych w skali roku: </label>
	<input id="id_k" type="text" name="k" value="" /><br />

	<label for="id_n">Liczba rat: </label>
	<input id="id_n" type="text" name="n" value="" /><br />


	
	<button class="button-large pure-button" type="submit" value="Oblicz" >Oblicz</button>
</form>	


<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php global $role; if (isset($result)&& $role=='user'){ ?>
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