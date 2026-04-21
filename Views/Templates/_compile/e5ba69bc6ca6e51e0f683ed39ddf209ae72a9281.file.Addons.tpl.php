<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 08:59:33
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/ProjectExtend/Addons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:196315612162b036f5059203-98058403%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5ba69bc6ca6e51e0f683ed39ddf209ae72a9281' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/ProjectExtend/Addons.tpl',
      1 => 1499415809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196315612162b036f5059203-98058403',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'project' => 0,
    'extras' => 0,
    'stockPath' => 0,
    '_extra' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b036f5074ff4_18307803',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b036f5074ff4_18307803')) {function content_62b036f5074ff4_18307803($_smarty_tpl) {?><div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Dodatki do <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
">projektu <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
</a></h1>
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
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['attachments']['ExtrasImage'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['attachments']['ExtrasImage'][0]['filename'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['name'];?>
">
				<p>
					<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['description'];?>

				</p>
				
				<div>
					<p><strong><?php if ($_smarty_tpl->tpl_vars['_extra']->value['package_price']>=0){?><?php echo $_smarty_tpl->tpl_vars['_extra']->value['package_price'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['price'];?>
<?php }?></strong> zł</p>
					<button class="order<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['extrasInBasket'][0][0]->mExtrasInBasket($_smarty_tpl->tpl_vars['_extra']->value['extras'],$_smarty_tpl->tpl_vars['project']->value['id'])){?> disabled<?php }?>"<?php if (!$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['extrasInBasket'][0][0]->mExtrasInBasket($_smarty_tpl->tpl_vars['_extra']->value['extras'],$_smarty_tpl->tpl_vars['project']->value['id'])){?> data-epid="<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
" data-thumb="<?php echo $_smarty_tpl->tpl_vars['stockPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['attachments']['ExtrasImage'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['attachments']['ExtrasImage'][0]['filename'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['name'];?>
" data-extras="<?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['id'];?>
" data-price="<?php if ($_smarty_tpl->tpl_vars['_extra']->value['package_price']>0){?><?php echo $_smarty_tpl->tpl_vars['_extra']->value['package_price'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_extra']->value['extras']['price'];?>
<?php }?>"<?php }?>><?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['extrasInBasket'][0][0]->mExtrasInBasket($_smarty_tpl->tpl_vars['_extra']->value['extras'],$_smarty_tpl->tpl_vars['project']->value['id'])){?>W koszyku<?php }else{ ?>Do koszyka<?php }?></button>
				</div>
			</li>	
			<?php } ?>
		</ul>
	</div>
</div>
<?php }else{ ?>
<article>
<h2>Nie znaleziono dodatków</h2>
<p>Niestety dla projektu <?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
 nie znaleziono żadnych dodatków.</p>
<p>Jeżeli chcesz porozmawiać o jakimś konkretnym dodatku, który Twoim zdaniem powinien się tu znaleźć, <a href="<?php if ($_smarty_tpl->tpl_vars['user']->value){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'message','project_id'=>$_smarty_tpl->tpl_vars['project']->value['id']),$_smarty_tpl);?>
<?php }else{ ?>javascript:<?php }?>"<?php if (!$_smarty_tpl->tpl_vars['user']->value){?> class="consultant"<?php }?>>skontaktuj się z nami!</a></p>
</article>
<?php }?>		<?php }} ?>