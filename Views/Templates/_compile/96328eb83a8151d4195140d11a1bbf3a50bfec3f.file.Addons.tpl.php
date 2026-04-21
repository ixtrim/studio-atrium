<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 08:34:48
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Varia/Addons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6929786462b03128a77614-55902687%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96328eb83a8151d4195140d11a1bbf3a50bfec3f' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Varia/Addons.tpl',
      1 => 1494588937,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6929786462b03128a77614-55902687',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'extras' => 0,
    'stockPath' => 0,
    '_extra' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b03128a878a6_14273984',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b03128a878a6_14273984')) {function content_62b03128a878a6_14273984($_smarty_tpl) {?><div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Dodatki</h1>
			</div>
		</div>
	</div>
</div>
<?php if ($_smarty_tpl->tpl_vars['extras']->value){?>
<div class="wrapper">
	<div class="box">
		<ul class="addons-box" id="addonsContent">
			<?php  $_smarty_tpl->tpl_vars['_extra'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_extra']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['extras']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_extra']->key => $_smarty_tpl->tpl_vars['_extra']->value){
$_smarty_tpl->tpl_vars['_extra']->_loop = true;
?>
			<li>
				<img src="<?php echo $_smarty_tpl->tpl_vars['stockPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['attachments']['ExtrasImage'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['attachments']['ExtrasImage'][0]['filename'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_extra']->value['name'];?>
">
				<p>
					<?php echo $_smarty_tpl->tpl_vars['_extra']->value['description'];?>

				</p>
				
				<div>
					<p><strong><?php echo $_smarty_tpl->tpl_vars['_extra']->value['price'];?>
</strong> zł</p>
					<button class="order<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['extrasInBasket'][0][0]->mExtrasInBasket($_smarty_tpl->tpl_vars['_extra']->value)){?> disabled<?php }?>"<?php if (!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['extrasInBasket'][0][0]->mExtrasInBasket($_smarty_tpl->tpl_vars['_extra']->value)){?> data-epid="0" data-thumb="<?php echo $_smarty_tpl->tpl_vars['stockPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['attachments']['ExtrasImage'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['attachments']['ExtrasImage'][0]['filename'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['_extra']->value['name'];?>
" data-extras="<?php echo $_smarty_tpl->tpl_vars['_extra']->value['id'];?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['_extra']->value['price'];?>
"<?php }?>><?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['extrasInBasket'][0][0]->mExtrasInBasket($_smarty_tpl->tpl_vars['_extra']->value)){?>W koszyku<?php }else{ ?>Do koszyka<?php }?></button>
				</div>
			</li>	
			<?php } ?>
		</ul>
	</div>
</div>
<?php }else{ ?>
<article>
<h2>Nie znaleziono dodatków</h2>
<p>Niestety aktualnie nie sprzedajemy żadnych dodatków.</p>
</article>
<?php }?>		<?php }} ?>