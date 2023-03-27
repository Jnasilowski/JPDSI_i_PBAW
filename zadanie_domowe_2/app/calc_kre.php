<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów
include _ROOT_PATH.'/app/security/check.php';
function getParams(&$N,&$r,&$k,&$n){
	$N = isset($_REQUEST['N']) ? $_REQUEST['N'] : null;
	$r = isset($_REQUEST['r']) ? $_REQUEST['r'] : null;
	$k = isset($_REQUEST['k']) ? $_REQUEST['k'] : null;
	$n = isset($_REQUEST['n']) ? $_REQUEST['n'] : null;
}





// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$N,&$r,&$k,&$n,&$messages){



// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($N) && isset($r) && isset($k) && isset($n) )) {
	
	return false;
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $N == "") {
	$messages [] = 'Nie podano kwoty udzielonego kredytu!';
}
if ( $r == "") {
	$messages [] = 'Nie podano oprocentowania!';
}
if ( $k == "") {
	$messages [] = 'Nie podano liczby rat płatnych w skali roku!';
}
if ( $n == "") {
	$messages [] = 'Nie podano liczby rat!';
}

	//nie ma sensu walidować dalej gdy brak parametrów
	if (count ( $messages ) != 0) return false;
	
	
		if (! is_numeric( $N )) {
			$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą!';
		}
		
		if (! is_numeric( $r )) {
			$messages [] = 'Druga wartość nie jest liczbą zmiennoprzecinkową!';
		}
		if (! is_numeric( $k )) {
			$messages [] = 'Trzecia wartość nie jest liczbą całkowitą!';
		}	
		if (! is_numeric( $n )) {
			$messages [] = 'Czwarta wartość nie jest liczbą całkowitą!';
		}		
		if (count ( $messages ) != 0) return false;
	else return true;
	
}

function process(&$N,&$r,&$k,&$n,&$messages,&$result,&$cal,&$kk){
// 3. wykonaj zadanie jeśli wszystko w porządku


		
		//konwersja parametrów na int
		$N = doubleval($N);
		$r = doubleval($r);
		$k = doubleval($k);
		$n = doubleval($n);
		$r=$r/100;
		$d = 1;
		
		
		for ($x=0; $x<$n; $x++) {
		$d = $d * ($k/($k+$r));
	}
		$d =(1-$d);
		$d = $k * $d;
		$result = ($N*$r);
		$result = round(($result / $d), 2);
		
		$cal = round(($n*$result),2);
		$kk = round(($cal - $N),2);
	

	
}
$N = null;
$n = null;
$r = null;
$k = null;
$cal = null;
$kk = null;
$result = null;

$messages = array();
getParams($N,$r,$k,$n);
	if(validate($N,$r,$k,$n,$messages)){
		process($N,$r,$k,$n,$messages,$result,$cal,$kk);
	}


// 4. Wywołanie widoku z przekazaniem zmiennych
//   będą dostępne w dołączonym skrypcie
include 'calc_kre_view.php';