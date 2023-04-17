<?php
/* Smarty version 4.3.1, created on 2023-04-17 14:55:10
  from 'C:\xampp\htdocs\projekty\JPDSI-i-PBAW\zadanie_4\app\calc.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_643d41aed5e779_48897720',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa0d5e82eaf7954d56d6bdc92a8db1c566c3d922' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekty\\JPDSI-i-PBAW\\zadanie_4\\app\\calc.html',
      1 => 1681734490,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_643d41aed5e779_48897720 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1137993752643d41aed555c5_13696873', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1111700787643d41aed55c14_90841492', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.html");
}
/* {block 'footer'} */
class Block_1137993752643d41aed555c5_13696873 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_1137993752643d41aed555c5_13696873',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1111700787643d41aed55c14_90841492 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1111700787643d41aed55c14_90841492',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h2 class="content-head is-center">Prosty kalkulator</h2>

<div class="pure-g">
<div class="l-box-lrg pure-u-1 pure-u-med-2-5">
	<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc.php" method="post">
		<fieldset>

			<label for="N">Kwota udzielonego kredytu:</label>
			<input id="N" type="text" placeholder="wartość N" name="N" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['N'];?>
">

			
			<label for="r">Oprocentowanie kredytu w skali roku(%): </label>
			<input id="r" type="text" placeholder="wartość r" name="r" value="">

			<label for="k">Liczba rat płatnych w skali roku: </label>
			<input id="k" type="text" placeholder="wartość k" name="k" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['k'];?>
">

			<label for="n">Liczba rat:</label>
			<input id="n" type="text" placeholder="wartość n" name="n" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['n'];?>
">

			<button type="submit" class="pure-button">Oblicz</button>
		</fieldset>
	</form>
</div>

<div class="l-box-lrg pure-u-1 pure-u-med-3-5">

<?php if ((isset($_smarty_tpl->tpl_vars['messages']->value))) {?>
	<?php if (count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?> 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((isset($_smarty_tpl->tpl_vars['infos']->value))) {?>
	<?php if (count($_smarty_tpl->tpl_vars['infos']->value) > 0) {?> 
		<h4>Informacje: </h4>
		<ol class="inf">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['infos']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if (((isset($_smarty_tpl->tpl_vars['result']->value)) && (isset($_smarty_tpl->tpl_vars['cal']->value)) && (isset($_smarty_tpl->tpl_vars['kk']->value)))) {?>
	<h4>Rata kredytu:</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['result']->value;?>
zł
	</p>
	<h4>Całkowita kwota spłaty:</h4>
	<p class="cal">
	<?php echo $_smarty_tpl->tpl_vars['cal']->value;?>
zł
	</p>
	<h4>koszt kredytu:</h4>
	<p class="kk">
	<?php echo $_smarty_tpl->tpl_vars['kk']->value;?>
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
