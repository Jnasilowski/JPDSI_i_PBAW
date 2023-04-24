<?php
/* Smarty version 4.3.1, created on 2023-04-24 15:31:22
  from 'C:\xampp\htdocs\projekty\JPDSI-i-PBAW\zadanie_4 — kopia\app\calc\CalcView.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_644684aa54f1e6_60650294',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1e044032ceeec1260373f19249137e1af0d86ed' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekty\\JPDSI-i-PBAW\\zadanie_4 — kopia\\app\\calc\\CalcView.html',
      1 => 1682343079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_644684aa54f1e6_60650294 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_931191575644684aa544912_07747637', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_540217122644684aa545252_87055529', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ($_smarty_tpl->tpl_vars['conf']->value->root_path).("/templates/main.html"));
}
/* {block 'footer'} */
class Block_931191575644684aa544912_07747637 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_931191575644684aa544912_07747637',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_540217122644684aa545252_87055529 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_540217122644684aa545252_87055529',
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

<?php if (((isset($_smarty_tpl->tpl_vars['result']->value->result)) && (isset($_smarty_tpl->tpl_vars['result']->value->cal)) && (isset($_smarty_tpl->tpl_vars['result']->value->kk)))) {?>
	<h4>Rata kredytu:</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['result']->value->result;?>
zł
	</p>
	<h4>Całkowita kwota spłaty:</h4>
	<p class="cal">
	<?php echo $_smarty_tpl->tpl_vars['result']->value->cal;?>
zł
	</p>
	<h4>koszt kredytu:</h4>
	<p class="kk">
	<?php echo $_smarty_tpl->tpl_vars['result']->value->kk;?>
zł
	</p>

<?php }?>


</div>
</div>

<?php
}
}
/* {/block 'content'} */
}
