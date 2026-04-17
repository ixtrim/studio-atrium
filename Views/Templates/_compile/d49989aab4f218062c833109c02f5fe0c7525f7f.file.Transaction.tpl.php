<?php /* Smarty version Smarty-3.1.11, created on 2022-06-21 15:07:12
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Panel/Transaction.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18766206162b1dea0873978-69907796%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd49989aab4f218062c833109c02f5fe0c7525f7f' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Panel/Transaction.tpl',
      1 => 1500463882,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18766206162b1dea0873978-69907796',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'transactions' => 0,
    '_transaction' => 0,
    '_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b1dea0891175_11746876',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b1dea0891175_11746876')) {function content_62b1dea0891175_11746876($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("Panel/_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="content">
	<?php if ($_smarty_tpl->tpl_vars['transactions']->value){?>
		<table class="default">
			<colgroup>
				<col style="width: 150px;">
				<col style="width: 170px;">
				<col>
				<col style="width: 200px;">
				<col style="width: 250px;">
			</colgroup>
			<tr class="header">
				<td class="center">Nr zamówienia</td>
				<td class="center">Data zamówienia</td>
				<td>Produkty</td>
				<td class="center">Cena</td>
				<td>Uwagi</td>
			</tr>	
			<?php  $_smarty_tpl->tpl_vars['_transaction'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_transaction']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['transactions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_transaction']->key => $_smarty_tpl->tpl_vars['_transaction']->value){
$_smarty_tpl->tpl_vars['_transaction']->_loop = true;
?>
				<tr>
					<td class="center"><?php echo $_smarty_tpl->tpl_vars['_transaction']->value['id'];?>
/<?php echo smarty_modifier_date_format(time(),"%y");?>
</td>
					<td class="center"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['_transaction']->value['add_date'],"%d-%m-%Y");?>
</td>
					<td>
						<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_transaction']->value['transactionItems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
?>
							<p><?php echo $_smarty_tpl->tpl_vars['_item']->value['description'];?>
 <?php if ($_smarty_tpl->tpl_vars['_item']->value['type']=='project'){?> <span>(<?php echo $_smarty_tpl->tpl_vars['_item']->value['props']['projectVersion'];?>
)</span><?php }?></p>
						<?php } ?>
					</td>
					<td class="low center">
						<strong><?php echo $_smarty_tpl->tpl_vars['_transaction']->value['props']['totalPayment'];?>
 zł</strong>
						<p class="small">w tym koszt dostawy: <strong><?php echo $_smarty_tpl->tpl_vars['_transaction']->value['props']['deliveryPrice'];?>
 zł</strong></p>
					</td>
					<td class="low">
						<?php if ($_smarty_tpl->tpl_vars['_transaction']->value['props']['registerUserDiscount']||$_smarty_tpl->tpl_vars['_transaction']->value['props']['discountValue']||$_smarty_tpl->tpl_vars['_transaction']->value['note']){?>
							<?php if ($_smarty_tpl->tpl_vars['_transaction']->value['props']['registerUserDiscount']){?><p>rabat za rejestrację: <strong><?php echo $_smarty_tpl->tpl_vars['_transaction']->value['props']['registerUserDiscount'];?>
 zł</strong></p><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['_transaction']->value['props']['discountValue']){?><p>kod rabatowy: <strong><?php echo $_smarty_tpl->tpl_vars['_transaction']->value['props']['discountValue'];?>
 <?php if ($_smarty_tpl->tpl_vars['_transaction']->value['props']['discountType']=='percent'){?>%<?php }else{ ?>zł<?php }?></strong></p><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['_transaction']->value['note']){?><p>uwagi:</p><p><i><?php echo $_smarty_tpl->tpl_vars['_transaction']->value['note'];?>
</i></p><?php }?>
						<?php }else{ ?>
						brak
						<?php }?>	
					</td>
				</tr>
			<?php } ?>	
		</table>
	<?php }else{ ?>
		<h3>Brak zamówień</h3>
		<p class="center">Jeszcze nie złożyłeś żadnego zamówienia poprzez stronę www.studioatrium.pl.</p>
	<?php }?>
</div><?php }} ?>