<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 08:55:54
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Ajax/Forum.tpl" */ ?>
<?php /*%%SmartyHeaderCode:145344308162b0361a7720f3-88951330%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15ec8b8aa689f9268b3b6a7541d63e4ed11e4e7d' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Ajax/Forum.tpl',
      1 => 1522313732,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145344308162b0361a7720f3-88951330',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'commentList' => 0,
    '_comment' => 0,
    'adminIds' => 0,
    'commentAuthors' => 0,
    'user' => 0,
    'discuss_categories' => 0,
    '_attachment' => 0,
    'uploadsUrl' => 0,
    '_sub' => 0,
    'request' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0361a7c20c2_50404348',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0361a7c20c2_50404348')) {function content_62b0361a7c20c2_50404348($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.date_format.php';
?><?php if ($_smarty_tpl->tpl_vars['commentList']->value){?>
	<?php  $_smarty_tpl->tpl_vars['_comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commentList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_comment']->key => $_smarty_tpl->tpl_vars['_comment']->value){
$_smarty_tpl->tpl_vars['_comment']->_loop = true;
?>
		<?php if (!$_smarty_tpl->tpl_vars['_comment']->value['children']){?><?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable(" noChildren", null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['class'] = new Smarty_variable('', null, 0);?><?php }?>
			<li<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['_comment']->value['author_id'])){?> class="avatar"<?php }else{ ?><?php if (in_array($_smarty_tpl->tpl_vars['_comment']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)){?> class="sa"<?php }else{ ?> data-initial="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['_comment']->value['nick'],1,'');?>
" <?php }?><?php }?>>
			<div>
			<div class="author">
				<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['_comment']->value['author_id'])){?><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['_comment']->value['author_id']);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_comment']->value['nick'];?>
"><?php }?>
				<strong><?php echo $_smarty_tpl->tpl_vars['_comment']->value['nick'];?>
</strong>
				<?php if ($_smarty_tpl->tpl_vars['_comment']->value['author_id']){?>
					<?php if (!in_array($_smarty_tpl->tpl_vars['_comment']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)){?>
						<?php if ($_smarty_tpl->tpl_vars['commentAuthors']->value[$_smarty_tpl->tpl_vars['_comment']->value['author_id']]){?>
							<p>Posty: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['commentAuthors']->value[$_smarty_tpl->tpl_vars['_comment']->value['author_id']]['props']['forum']['count'])===null||$tmp==='' ? 0 : $tmp);?>
</p>
							<p>Pierwszy post: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['commentAuthors']->value[$_smarty_tpl->tpl_vars['_comment']->value['author_id']]['props']['forum']['date'])===null||$tmp==='' ? "-" : $tmp);?>
</p>
						<?php }else{ ?>
							<p>Konto usunięte</p>
						<?php }?>	
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['user']->value&&$_smarty_tpl->tpl_vars['user']->value['id']!=$_smarty_tpl->tpl_vars['_comment']->value['author_id']&&$_smarty_tpl->tpl_vars['commentAuthors']->value[$_smarty_tpl->tpl_vars['_comment']->value['author_id']]){?>
						<?php if (in_array($_smarty_tpl->tpl_vars['_comment']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)){?>
							<p class="padd"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'message'),$_smarty_tpl);?>
"><span class="postme2">napisz wiadomość</span></a></p>
						<?php }else{ ?>
							<p class="padd"><span class="postme" data-aid="<?php echo $_smarty_tpl->tpl_vars['_comment']->value['author_id'];?>
">napisz wiadomość</span></p>
						<?php }?>	
					<?php }?>	
				<?php }else{ ?>
					<p>niezarejestrowany</p>
				<?php }?>
			</div>
			<div class="comment">
				<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'thread','id'=>$_smarty_tpl->tpl_vars['_comment']->value['id']),$_smarty_tpl);?>
" class="title"><?php echo $_smarty_tpl->tpl_vars['_comment']->value['topic'];?>
</a>
				<?php echo nl2br(htmlspecialchars_decode($_smarty_tpl->tpl_vars['_comment']->value['content'], ENT_QUOTES));?>

				<p class="date">utworzony: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['_comment']->value['create_date'],"%d-%m-%Y (%H:%M:%S)");?>
 <span>w kategorii: <?php echo $_smarty_tpl->tpl_vars['discuss_categories']->value[$_smarty_tpl->tpl_vars['_comment']->value['cat_id']]['title'];?>
</span></p>
				<?php if ($_smarty_tpl->tpl_vars['_comment']->value['attachments']['DiscussImage']){?>
					<p class="attachments">
						<?php  $_smarty_tpl->tpl_vars['_attachment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_attachment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_comment']->value['attachments']['DiscussImage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_attachment']->key => $_smarty_tpl->tpl_vars['_attachment']->value){
$_smarty_tpl->tpl_vars['_attachment']->_loop = true;
?><a data-fancybox="forum_image" <?php if ($_smarty_tpl->tpl_vars['_attachment']->value['title']){?> data-fancybox-title="<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['title'];?>
"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['filename'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['filename'];?>
" alt="<?php if ($_smarty_tpl->tpl_vars['_attachment']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['_attachment']->value['title'];?>
<?php }else{ ?>Grafika do wpisu<?php }?>"></a><?php } ?>
					</p>
				<?php }?>
			</div>
			
			<div class="reply-box">
				<span class="framed reply-trigger" data-parent="<?php echo $_smarty_tpl->tpl_vars['_comment']->value['id'];?>
" data-parent-type="<?php echo $_smarty_tpl->tpl_vars['_comment']->value['cat_id'];?>
">Odpowiedz</span>
			</div>
			</div>
			
			<?php if ($_smarty_tpl->tpl_vars['_comment']->value['children']){?>
				<ul>
				<?php  $_smarty_tpl->tpl_vars['_sub'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_sub']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_comment']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_sub']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['_sub']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['_sub']->key => $_smarty_tpl->tpl_vars['_sub']->value){
$_smarty_tpl->tpl_vars['_sub']->_loop = true;
 $_smarty_tpl->tpl_vars['_sub']->iteration++;
?>
					<li<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['_sub']->value['author_id'])){?>
							class="avatar<?php if ($_smarty_tpl->tpl_vars['_sub']->iteration>3){?> covered<?php }?>"
						<?php }else{ ?>
							<?php if (in_array($_smarty_tpl->tpl_vars['_sub']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)){?> 
								class="sa<?php if ($_smarty_tpl->tpl_vars['_sub']->iteration>3){?> covered<?php }?>"
							<?php }else{ ?> 
								data-initial="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['_sub']->value['nick'],1,'');?>
"<?php if ($_smarty_tpl->tpl_vars['_sub']->iteration>3){?> class="covered"<?php }?>
							<?php }?>
					<?php }?>>
						<div class="author">
							<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['_sub']->value['author_id'])){?><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['_sub']->value['author_id']);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_sub']->value['nick'];?>
"><?php }?>
							<strong><?php echo $_smarty_tpl->tpl_vars['_sub']->value['nick'];?>
</strong>
							<?php if ($_smarty_tpl->tpl_vars['_sub']->value['author_id']){?>
								<?php if (!in_array($_smarty_tpl->tpl_vars['_sub']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)){?>
									<?php if ($_smarty_tpl->tpl_vars['commentAuthors']->value[$_smarty_tpl->tpl_vars['_sub']->value['author_id']]){?>
										<p>Posty: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['commentAuthors']->value[$_smarty_tpl->tpl_vars['_sub']->value['author_id']]['props']['forum']['count'])===null||$tmp==='' ? 0 : $tmp);?>
</p>
										<p>Pierwszy post: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['commentAuthors']->value[$_smarty_tpl->tpl_vars['_sub']->value['author_id']]['props']['forum']['date'])===null||$tmp==='' ? "-" : $tmp);?>
</p>
									<?php }else{ ?>
										<p>Konto usunięte</p>
									<?php }?>	
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['user']->value&&$_smarty_tpl->tpl_vars['user']->value['id']!=$_smarty_tpl->tpl_vars['_sub']->value['author_id']){?>
									<?php if (in_array($_smarty_tpl->tpl_vars['_sub']->value['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)){?>
										<p class="padd"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'message'),$_smarty_tpl);?>
"><span class="postme2">napisz wiadomość</span></a></p>
									<?php }else{ ?>
										<p class="padd"><span class="postme" data-aid="<?php echo $_smarty_tpl->tpl_vars['_sub']->value['author_id'];?>
">napisz wiadomość</span></p>
									<?php }?>	
								<?php }?>	
							<?php }else{ ?>
								<p>niezarejestrowany</p>
							<?php }?>
						</div>
						<div class="comment">
							<?php echo nl2br(htmlspecialchars_decode($_smarty_tpl->tpl_vars['_sub']->value['content'], ENT_QUOTES));?>

							<p class="date">utworzony: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['_sub']->value['create_date'],"%d-%m-%Y (%H:%M:%S)");?>
</p>
							<?php if ($_smarty_tpl->tpl_vars['_sub']->value['attachments']['DiscussImage']){?>
								<p class="attachments">
									<?php  $_smarty_tpl->tpl_vars['_attachment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_attachment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_sub']->value['attachments']['DiscussImage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_attachment']->key => $_smarty_tpl->tpl_vars['_attachment']->value){
$_smarty_tpl->tpl_vars['_attachment']->_loop = true;
?><a data-fancybox="forum_image" <?php if ($_smarty_tpl->tpl_vars['_attachment']->value['title']){?> data-fancybox-title="<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['title'];?>
"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['filename'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['uploadsUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_attachment']->value['childAttachments']['thumb'][0]['filename'];?>
" alt="<?php if ($_smarty_tpl->tpl_vars['_attachment']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['_attachment']->value['title'];?>
<?php }else{ ?>Grafika do wpisu<?php }?>"></a><?php } ?>
								</p>
							<?php }?>
						</div>
					</li>
				<?php } ?>
				</ul>
				<?php if ($_smarty_tpl->tpl_vars['_sub']->total>3){?><div class="more-box"><span class="show-more">pokaż więcej odpowiedzi</span></div><?php }?>
			<?php }?>
		</li>
	<?php } ?>
<?php }else{ ?>
	<li class="empty">
		W tej kategorii jeszcze nie ma wpisów, <a href="javascript:" class="blue" onClick="Project.setForm(<?php echo $_smarty_tpl->tpl_vars['request']->value['cid'];?>
);">dodaj nowy temat</a>.
	</li>
<?php }?><?php }} ?>