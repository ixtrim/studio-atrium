<?php /* Smarty version Smarty-3.1.11, created on 2025-03-28 10:27:14
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Catalog/Form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173003575962b0428b9bf291-86080586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fbdb17ce2058e6b659ec6a62eefc8f87e3f3b572' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Catalog/Form.tpl',
      1 => 1743157628,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173003575962b0428b9bf291-86080586',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0428b9cc9c7_69372713',
  'variables' => 
  array (
    'isPayAvailable' => 0,
    'description' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0428b9cc9c7_69372713')) {function content_62b0428b9cc9c7_69372713($_smarty_tpl) {?><div class="list-header">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>Nasz katalog domów</h1>
			</div>
		</div>
	</div>
</div>
<?php if ($_smarty_tpl->tpl_vars['isPayAvailable']->value==0){?>
<style>p.pay { display: none;}</style>
<?php }?>

<div class="options">
	<div class="box">
		<ul>
			<li class="selected"><div><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'catalog','action'=>'form'),$_smarty_tpl);?>
"><span class="free">Bezpłatny</span></a></div></li>
			<li><div><a href="/katalog-projektow-online.html"><span class="free">Online</span></a></div></li>
			<?php if ($_smarty_tpl->tpl_vars['isPayAvailable']->value==1){?><li><div><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'catalog','action'=>'form_pay'),$_smarty_tpl);?>
"><span class="nonfree" id="similiar">Płatny</span></a></div></li><?php }?>
		</ul>
	</div>
</div>
<div class="wrapper">
	<div class="box">
	
		<div class="text-box">
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['fixArticleContent'][0][0]->mFixArticleContent($_smarty_tpl->tpl_vars['description']->value['content'],$_smarty_tpl->tpl_vars['description']->value['id']);?>

		</div>
	
	
	</div>
</div><?php }} ?>