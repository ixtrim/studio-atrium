<?php /* Smarty version Smarty-3.1.11, created on 2022-06-21 15:06:54
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Panel/Forum.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53575801062b1de8eb28368-96210951%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '731b0b029d17e17d3247745dd2f1c626a832fc10' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Panel/Forum.tpl',
      1 => 1523263753,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53575801062b1de8eb28368-96210951',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'forum' => 0,
    'pages' => 0,
    'page' => 0,
    'url' => 0,
    '_item' => 0,
    '_threadId' => 0,
    'categories' => 0,
    '_attachment' => 0,
    'uploadsUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b1de8eb4ecc9_95920537',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b1de8eb4ecc9_95920537')) {function content_62b1de8eb4ecc9_95920537($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("Panel/_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="content">
	<ul class="choice">
		<li class="selected"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'forum'),$_smarty_tpl);?>
">Twoje wpisy na forum</a></li>

		<li class="last"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'forum_message'),$_smarty_tpl);?>
">Skrzynka wiadomości</a></li>
	</ul>

	<?php if ($_smarty_tpl->tpl_vars['forum']->value){?>
	
		<?php if ($_smarty_tpl->tpl_vars['pages']->value>1){?>
		<div class="pager-box">
			<?php echo $_smarty_tpl->getSubTemplate ("Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value), 0);?>

		</div>
		<?php }?>
	
	
		<ul class="comments">
		<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['forum']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['_item']->value['parent_id']){?>
				<?php $_smarty_tpl->tpl_vars['_threadId'] = new Smarty_variable($_smarty_tpl->tpl_vars['_item']->value['parent_id'], null, 0);?>
			<?php }else{ ?>
				<?php $_smarty_tpl->tpl_vars['_threadId'] = new Smarty_variable($_smarty_tpl->tpl_vars['_item']->value['id'], null, 0);?>
			<?php }?>
		
			<li>
				<?php if (!$_smarty_tpl->tpl_vars['_item']->value['parent_id']){?>
					Temat: <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'thread','id'=>$_smarty_tpl->tpl_vars['_threadId']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['_item']->value['topic'];?>
</a> 
				<?php }else{ ?>
					Odpowiedź na temat: <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'thread','id'=>$_smarty_tpl->tpl_vars['_threadId']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['_item']->value['parent']['topic'];?>
</a>
				<?php }?>
					
				| <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['_item']->value['create_date'],"%d-%m-%Y");?>

				
				<p>Kategoria: <?php echo $_smarty_tpl->tpl_vars['categories']->value[$_smarty_tpl->tpl_vars['_item']->value['cat_id']]['title'];?>
</p>
				
				<?php if ($_smarty_tpl->tpl_vars['_item']->value['project_id']){?>
					<p>Projekt: <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_item']->value['project']['id'],'link_title'=>$_smarty_tpl->tpl_vars['_item']->value['project']['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['_item']->value['project']['name'];?>
</a></p>
				<?php }?>
				
				<p>
					<?php echo nl2br($_smarty_tpl->tpl_vars['_item']->value['content']);?>

					<?php if (!$_smarty_tpl->tpl_vars['_item']->value['parent_id']){?>
						<a class="edit-post" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'edit_thread','cid'=>$_smarty_tpl->tpl_vars['_item']->value['cat_id'],'id'=>$_smarty_tpl->tpl_vars['_item']->value['id']),$_smarty_tpl);?>
">edytuj post</a>
					<?php }else{ ?>
						<a class="edit-post" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'edit_post','cid'=>$_smarty_tpl->tpl_vars['_item']->value['cat_id'],'id'=>$_smarty_tpl->tpl_vars['_item']->value['id']),$_smarty_tpl);?>
">edytuj post</a>
					<?php }?>
				</p>

				<?php if ($_smarty_tpl->tpl_vars['_item']->value['attachments']['DiscussImage']){?>
					<div class="attList">
					<?php  $_smarty_tpl->tpl_vars['_attachment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_attachment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_item']->value['attachments']['DiscussImage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_attachment']->key => $_smarty_tpl->tpl_vars['_attachment']->value){
$_smarty_tpl->tpl_vars['_attachment']->_loop = true;
?>
						<a data-fancybox="forum_image" <?php if ($_smarty_tpl->tpl_vars['_attachment']->value['title']){?> data-caption="<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['title'];?>
"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['filename'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['filename'];?>
" alt="Załącznik do wpisu"></a>
					<?php } ?>
					</div>
				<?php }?>
			</li>
		<?php } ?>
		</ul>
	<?php }else{ ?>
		<p class="shout">Nie masz jeszcze żadnych wpisów na forum. Napisz coś!</p>
	<?php }?>
</div><?php }} ?>