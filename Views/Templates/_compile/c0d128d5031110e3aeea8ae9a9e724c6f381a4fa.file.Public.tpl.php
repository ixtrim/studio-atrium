<?php /* Smarty version Smarty-3.1.11, created on 2022-06-25 16:35:43
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Selfie/Public.tpl" */ ?>
<?php /*%%SmartyHeaderCode:170886659862b7395f9dac04-46409273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0d128d5031110e3aeea8ae9a9e724c6f381a4fa' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Selfie/Public.tpl',
      1 => 1496061288,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170886659862b7395f9dac04-46409273',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'project' => 0,
    'selfie' => 0,
    'selfie_path' => 0,
    'fileToSave' => 0,
    'currentUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b7395f9e3f23_93423576',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b7395f9e3f23_93423576')) {function content_62b7395f9e3f23_93423576($_smarty_tpl) {?><div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.6&appId=100720913594772";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="pro-box">
	<span class="header">Selfie z projektem <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
"><strong><?php echo $_smarty_tpl->tpl_vars['project']->value['name'];?>
</strong></a>: "<?php echo $_smarty_tpl->tpl_vars['selfie']->value['title'];?>
"</span>
	<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
">powrót &raquo;</a>

	<div class="currentSelfie">
		<img src="<?php echo $_smarty_tpl->tpl_vars['selfie_path']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['selfie']->value['selfie_img_url'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['selfie']->value['name'];?>
">
		<p><a href="<?php echo $_smarty_tpl->tpl_vars['fileToSave']->value;?>
" class="button" download="selfie-<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['fixLinkTitle'][0][0]->mFixLinkTitle($_smarty_tpl->tpl_vars['selfie']->value['title']);?>
.jpg">zapisz na dysku</a></p>
		<div class="fb-share-button" data-href="<?php echo $_smarty_tpl->tpl_vars['currentUrl']->value;?>
" data-layout="button" data-mobile-iframe="true"></div>
	</div>
</div><?php }} ?>