<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.
require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';
// 1. pobranie parametrów
include _ROOT_PATH.'/app/security/check.php';
function getParams(&$form){
	$form['N'] = isset($_REQUEST['N']) ? $_REQUEST['N'] : null;
	$form['r'] = isset($_REQUEST['r']) ? $_REQUEST['r'] : null;
	$form['k'] = isset($_REQUEST['k']) ? $_REQUEST['k'] : null;
	$form['n'] = isset($_REQUEST['n']) ? $_REQUEST['n'] : null;
}





// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$form,&$messages){



// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($form['N']) && isset($form['r']) && isset($form['k']) && isset($form['n']) )) {
	
	return false;
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $form['N'] == "") {
	$messages [] = 'Nie podano kwoty udzielonego kredytu!';
}
if ( $form['r'] == "") {
	$messages [] = 'Nie podano oprocentowania!';
}
if ( $form['k'] == "") {
	$messages [] = 'Nie podano liczby rat płatnych w skali roku!';
}
if ( $form['n'] "") {
	$messages [] = 'Nie podano liczby rat!';
}

	//nie ma sensu walidować dalej gdy brak parametrów
	if (count ( $messages ) != 0) return false;
	
	
		if (! is_numeric( $form['N'] )) {
			$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą!';
		}
		
		if (! is_numeric( $form['r'])) {
			$messages [] = 'Druga wartość nie jest liczbą zmiennoprzecinkową!';
		}
		if (! is_numeric( $form['k'])) {
			$messages [] = 'Trzecia wartość nie jest liczbą całkowitą!';
		}	
		if (! is_numeric( $form['n'] )) {
			$messages [] = 'Czwarta wartość nie jest liczbą całkowitą!';
		}		
		if (count ( $messages ) != 0) return false;
	else return true;
	
}

function process(&$form,&$messages,&$result,&$cal,&$kk){
// 3. wykonaj zadanie jeśli wszystko w porządku


		
		//konwersja parametrów na int
		$form['N'] = doubleval($form['N']);
		$form['r'] = doubleval($form['r']);
		$form['k'] = doubleval($form['k']);
		$form['n'] = doubleval($form['n']);
		$form['r']=$form['r']/100;
		$d = 1;
		
		
		for ($x=0; $x<$n; $x++) {
		$d = $d * ($form['k']/($form['k']+$form['r']));
	}
		$d =(1-$d);
		$d = $form['k'] * $d;
		$result = ($form['N']*$form['r']);
		$result = round(($result / $d), 2);
		
		$cal = round(($n*$result),2);
		$kk = round(($cal - $N),2);
	

	
}
$form['N'] = null;
$form['n'] = null;
$form['r'] = null;
$form['k'] = null;
$cal = null;
$kk = null;
$result = null;

$messages = array();
getParams($N,$r,$k,$n);
	if(validate($N,$r,$k,$n,$messages)){
		process($N,$r,$k,$n,$messages,$result,$cal,$kk);
	}
	$smarty = new Smarty();

	$smarty->assign('app_url',_APP_URL);
	$smarty->assign('root_path',_ROOT_PATH);
	$smarty->assign('page_title','Przykład 04');
	$smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece Smarty');
	$smarty->assign('page_header','Szablony Smarty');
	
	$smarty->assign('hide_intro',$hide_intro);
	
	//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
	$smarty->assign('form',$form);
	$smarty->assign('result',$result);
	$smarty->assign('messages',$messages);
	$smarty->assign('infos',$infos);
	
	// 5. Wywołanie szablonu
	$smarty->display(_ROOT_PATH.'/app/calc.html');