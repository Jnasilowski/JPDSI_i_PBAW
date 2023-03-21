<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$N = $_REQUEST ['N'];
$r = $_REQUEST ['r'];
$k = $_REQUEST ['k'];
$n = $_REQUEST ['n'];


// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($N) && isset($r) && isset($k) && isset($n) )) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
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
if (empty( $messages )) {
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $N )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą!';
	}
	
//	if (! is_double( $r )) {
	//	$messages [] = 'Druga wartość nie jest liczbą zmiennoprzecinkową!';
	//}
	if (! is_numeric( $k )) {
		$messages [] = 'Trzecia wartość nie jest liczbą całkowitą!';
	}	
	if (! is_numeric( $n )) {
		$messages [] = 'Czwarta wartość nie jest liczbą całkowitą!';
	}		

}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
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

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';