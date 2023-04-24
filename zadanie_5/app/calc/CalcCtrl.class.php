<?php
// KONTROLER strony kalkulatora


// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.
require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/calc/CalcForm.class.php';
require_once $conf->root_path.'/app/calc/CalcResult.class.php';
// 1. pobranie parametrów
class CalcCtrl {

	private $msgs;   //wiadomości dla widoku
	private $infos;  //informacje dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku
	private $hide_intro; //zmienna informująca o tym czy schować intro


	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
		$this->cal = new CalcResult();
		$this->kk = new CalcResult();
		$this->hide_intro = false;
	}

function getParams(){
	$this->form->N = isset($_REQUEST['N']) ? $_REQUEST['N'] : null;
	$this->form->r = isset($_REQUEST['r']) ? $_REQUEST['r'] : null;
	$this->form->k = isset($_REQUEST['k']) ? $_REQUEST['k'] : null;
	$this->form->n = isset($_REQUEST['n']) ? $_REQUEST['n'] : null;
}





// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(){



// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($this->form->N) && isset($this->form->r) && isset($this->form->k) && isset($this->form->n) )) {
	
	return false;
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $this->form->N == "") {
	$messages [] = 'Nie podano kwoty udzielonego kredytu!';
}
if ( $this->form->r == "") {
	$messages [] = 'Nie podano oprocentowania!';
}
if ( $this->form->k == "") {
	$messages [] = 'Nie podano liczby rat płatnych w skali roku!';
}
if ( $this->form->n == "") {
	$messages [] = 'Nie podano liczby rat!';
}

	//nie ma sensu walidować dalej gdy brak parametrów
	if (! $this->msgs->isError()){
	
	
		if (! is_numeric( $this->form->N )) {
			$this->msgs->addError('Pierwsza wartość nie jest liczbą całkowitą!');
		}
		
		if (! is_numeric( $this->form->r)) {
			$this->msgs->addError('Druga wartość nie jest liczbą zmiennoprzecinkową!');
		}
		if (! is_numeric( $this->form->k)) {
			$this->msgs->addError('Trzecia wartość nie jest liczbą całkowitą!');
		}	
		if (! is_numeric( $this->form->n )) {
			$this->msgs->addError('Czwarta wartość nie jest liczbą całkowitą!');
		}		
		
	}
	return ! $this->msgs->isError();
	
}

function process(){
// 3. wykonaj zadanie jeśli wszystko w porządku
		$this->getparams();

		if ($this->validate()) {
		//konwersja parametrów na int
		$this->form->N = doubleval($this->form->N );
		$this->form->r = doubleval($this->form->r );
		$this->form->k = doubleval($this->form->k );
		$this->form->n= doubleval($this->form->n );
		$this->form->r=$this->form->r/100;
		$d = 1;
		
		
		for ($x=0; $x<$this->form->n; $x++) {
		$d = $d * ($this->form->k/($this->form->k+$this->form->r));
	}
		$d =(1-$d);
		$d = $this->form->k * $d;
		$this->result->result = ($this->form->N*$this->form->r);
		$this->result->result = round(($this->result->result/ $d), 2);
		
		$this->result->cal = round(($this->form->n*$this->result->result),2);
		$this->result->kk = round(($this->result->cal - $this->form->N),2);
	
		$this->msgs->addInfo('Wykonano obliczenia.');
	
}
$this->generateView();
}
public function generateView(){
	$smarty = new Smarty();

	global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Przykład 06');
		$smarty->assign('page_description','Aplikacja z jednym "punktem wejścia". Model MVC, w którym jeden główny kontroler używa różnych obiektów kontrolerów w zależności od wybranej akcji - przekazanej parametrem.');
		$smarty->assign('page_header','Kontroler główny');
				
		$smarty->assign('hide_intro',$this->hide_intro);
		
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('result',$this->result);
		
		$smarty->display($conf->root_path.'/app/calc/CalcView.html');
		$smarty->assign('cal',$this->cal);
		$smarty->assign('kk',$this->kk);

	
	// 5. Wywołanie szablonu
}
}