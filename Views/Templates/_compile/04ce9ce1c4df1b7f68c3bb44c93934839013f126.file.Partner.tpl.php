<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 18:23:24
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Ajax/Partner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:169335634462b0bb1cc2d6f8-29930420%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04ce9ce1c4df1b7f68c3bb44c93934839013f126' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Ajax/Partner.tpl',
      1 => 1501660823,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169335634462b0bb1cc2d6f8-29930420',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'partners' => 0,
    '_partner' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0bb1cc381d0_06065636',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0bb1cc381d0_06065636')) {function content_62b0bb1cc381d0_06065636($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['partners']->value){?>
<div class="box ajaxed" id="vendors-list" style="display: none;">
	<ul>
	<?php  $_smarty_tpl->tpl_vars['_partner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_partner']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['partners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_partner']->key => $_smarty_tpl->tpl_vars['_partner']->value){
$_smarty_tpl->tpl_vars['_partner']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['_partner']->value['char_id']=='man'){?>
		<li>
			<?php if ($_smarty_tpl->tpl_vars['_partner']->value['teaser']&&strpos($_smarty_tpl->tpl_vars['_partner']->value['teaser'],"http://")!==false){?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['_partner']->value['teaser'];?>
" class="external" rel="nofollow">
					<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['partnerImage'][0][0]->fPartnerImage(array('document'=>$_smarty_tpl->tpl_vars['_partner']->value),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_partner']->value['title'];?>
">
				</a>
			<?php }else{ ?>
				<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['articleImage'][0][0]->fArticleImage(array('document'=>$_smarty_tpl->tpl_vars['_partner']->value),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_partner']->value['title'];?>
">
			<?php }?>		
			<?php echo $_smarty_tpl->tpl_vars['_partner']->value['content'];?>

		</li>
		<?php }?>
	<?php } ?>
	</ul>
	
</div>
<?php }else{ ?>
<div class="box ajaxed" id="partner-list">
	<p class="red">Nie znaleziono żadnych producentów i partnerów.</p>
</div>
<?php }?><?php }} ?>