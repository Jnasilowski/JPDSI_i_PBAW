<?php
/* Smarty version 4.3.1, created on 2023-05-08 20:13:51
  from 'C:\xampp\htdocs\projekty\zadanie_5\app\views\CalcView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64593bdf6ff618_22725655',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2af59f05dc0aa30fef58ca6a6aab98d35f4ba73' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekty\\zadanie_5\\app\\views\\CalcView.tpl',
      1 => 1683568715,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64593bdf6ff618_22725655 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2376366064593bdf6f5b90_19182009', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_43341775264593bdf6f62d6_68044685', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'footer'} */
class Block_2376366064593bdf6f5b90_19182009 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_2376366064593bdf6f5b90_19182009',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_43341775264593bdf6f62d6_68044685 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_43341775264593bdf6f62d6_68044685',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h2 class="content-head is-center">Prosty kalkulator</h2>

<div class="pure-g">
<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
	<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute" method="post">
		<fieldset>

			<label for="N">Kwota udzielonego kredytu:</label>
			<input id="N" type="text" placeholder="wartość N" name="N" value="">

			
			<label for="r">Oprocentowanie kredytu w skali roku(%): </label>
			<input id="r" type="text" placeholder="wartość r" name="r" value="">

			<label for="k">Liczba rat płatnych w skali roku: </label>
			<input id="k" type="text" placeholder="wartość k" name="k" value="">

			<label for="n">Liczba rat:</label>
			<input id="n" type="text" placeholder="wartość n" name="n" value="">

			<button type="submit" class="pure-button">Oblicz</button>
		</fieldset>
	</form>
</div>

<div class="l-box-lrg pure-u-1 pure-u-med-3-5">

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
	<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ol>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
	<h4>Informacje: </h4>
	<ol class="inf">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
$_smarty_tpl->tpl_vars['inf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->do_else = false;
?>
	<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ol>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['result']->value->result))) {?>
	<h4>Rata kredytu:</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['result']->value->result;?>

	</p>
	<h4>Całkowita kwota spłaty:</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['result']->value->cal;?>

	</p>
	<h4>koszt kredytu:</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['result']->value->kk;?>

	</p>
<?php }?>

</div>
</div>

<?php
}
}
/* {/block 'content'} */
}
