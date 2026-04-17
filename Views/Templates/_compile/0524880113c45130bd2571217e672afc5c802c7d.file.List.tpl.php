<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 08:35:22
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/ForumArchive/List.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124954254962b0314a3ef381-30060606%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0524880113c45130bd2571217e672afc5c802c7d' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/ForumArchive/List.tpl',
      1 => 1495610740,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124954254962b0314a3ef381-30060606',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'request' => 0,
    'forum_thread' => 0,
    'archive' => 0,
    'total' => 0,
    'pages' => 0,
    'page' => 0,
    'url' => 0,
    'userName' => 0,
    '_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0314a4170c4_07455061',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0314a4170c4_07455061')) {function content_62b0314a4170c4_07455061($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_replace')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.replace.php';
?><div class="wrapper">
	<div class="box spaced">
		<h1>Archiwum forum</h1>
		
		<ul class="threads">
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'forum_archive','link_title'=>'Dom Studia Atrium','postId'=>1),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->tpl_vars['request']->value['postId']==1||$_smarty_tpl->tpl_vars['forum_thread']->value['parent_id']==1){?> class="selected"<?php }?>>Dom Studia Atrium</a> | </li>
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'forum_archive','link_title'=>'Budownictwo ogólne','postId'=>2),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->tpl_vars['request']->value['postId']==2||$_smarty_tpl->tpl_vars['forum_thread']->value['parent_id']==2){?> class="selected"<?php }?>>Budownictwo ogólne</a> | </li>
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'forum_archive','link_title'=>'Prawo i budowa','postId'=>3),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->tpl_vars['request']->value['postId']==3||$_smarty_tpl->tpl_vars['forum_thread']->value['parent_id']==3){?> class="selected"<?php }?>>Prawo i budowa</a> | </li>
			<li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'forum_archive','link_title'=>'Uwagi o serwisie','postId'=>4),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->tpl_vars['request']->value['postId']==4||$_smarty_tpl->tpl_vars['forum_thread']->value['parent_id']==4){?> class="selected"<?php }?>>Uwagi o serwisie</a></li>
		</ul>
		
		<?php if ($_smarty_tpl->tpl_vars['archive']->value){?>	
		<div class="control-box">
			<ul>
				<li><span>Znalezionych wpisów <strong><?php echo (($tmp = @$_smarty_tpl->tpl_vars['total']->value)===null||$tmp==='' ? 0 : $tmp);?>
</strong></span></li>
				<li>
				<?php if ($_smarty_tpl->tpl_vars['pages']->value>1){?>
					<?php echo $_smarty_tpl->getSubTemplate ("Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value,'query'=>'.html'), 0);?>

				<?php }?>
				</li>
			</ul>
		</div>
		<?php }?>
	</div>
</div>

<?php if ($_smarty_tpl->tpl_vars['forum_thread']->value){?>
	<?php if ($_smarty_tpl->tpl_vars['forum_thread']->value['old_user_name']){?>
		<?php $_smarty_tpl->tpl_vars['userName'] = new Smarty_variable($_smarty_tpl->tpl_vars['forum_thread']->value['old_user_name'], null, 0);?>
	<?php }else{ ?>
		<?php $_smarty_tpl->tpl_vars['userName'] = new Smarty_variable($_smarty_tpl->tpl_vars['forum_thread']->value['user']['login'], null, 0);?>
	<?php }?>

	<div class="archive-box">	
		<p>
			<?php if ($_smarty_tpl->tpl_vars['userName']->value){?>
			<span><?php if ($_smarty_tpl->tpl_vars['forum_thread']->value['old_user_name']){?><?php echo $_smarty_tpl->tpl_vars['forum_thread']->value['old_user_name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['forum_thread']->value['user']['login'];?>
<?php }?></span>
			<?php }?>
			<span>rozpoczęty: <strong><?php echo $_smarty_tpl->tpl_vars['forum_thread']->value['date_added'];?>
</strong></span>
			<span>odpowiedzi: <strong><?php echo $_smarty_tpl->tpl_vars['forum_thread']->value['reply_count'];?>
</strong></span>
		</p>
		<div>
			<?php echo $_smarty_tpl->tpl_vars['forum_thread']->value['content'];?>

		</div>
	</div>
<?php }elseif($_smarty_tpl->tpl_vars['archive']->value){?>
	<div class="articles-box">	
		<div class="list-box thread">
			<ul class="list">
				<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['archive']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
?>
				<li>
					<td>
						<?php if (!$_smarty_tpl->tpl_vars['forum_thread']->value){?>
							<p><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'forum_archive','postId'=>$_smarty_tpl->tpl_vars['_item']->value['id'],'link_title'=>smarty_modifier_replace(smarty_modifier_truncate($_smarty_tpl->tpl_vars['_item']->value['title'],70),'Odp.:','')),$_smarty_tpl);?>
"><strong><?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
</strong></a><?php if ($_smarty_tpl->tpl_vars['_item']->value['project']){?> (<?php echo $_smarty_tpl->tpl_vars['_item']->value['project']['symbol_alpha'];?>
-<?php echo $_smarty_tpl->tpl_vars['_item']->value['project']['symbol_num'];?>
 <?php echo $_smarty_tpl->tpl_vars['_item']->value['project']['name'];?>
)<?php }?><?php if ($_smarty_tpl->tpl_vars['_item']->value['old_user_name']){?> - <?php echo $_smarty_tpl->tpl_vars['_item']->value['old_user_name'];?>
<?php }elseif($_smarty_tpl->tpl_vars['_item']->value['user']['login']){?> - <?php echo $_smarty_tpl->tpl_vars['_item']->value['user']['login'];?>
<?php }?></p>
						<?php }?>
						<p>
							<?php if ($_smarty_tpl->tpl_vars['forum_thread']->value){?>
								<?php echo $_smarty_tpl->tpl_vars['_item']->value['content'];?>

							<?php }else{ ?>
								<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['_item']->value['content'],200,"...");?>

							<?php }?>
						</p>
					</td>
				</tr>
				<?php } ?>
			</ul>
			
			<?php if ($_smarty_tpl->tpl_vars['pages']->value>1){?>
			<div class="wrapper">
				<div class="box">
					<div class="control-box">
						<ul>
							<li>
								<?php echo $_smarty_tpl->getSubTemplate ("Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value,'query'=>'.html'), 0);?>

							</li>
						</ul>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
<?php }?><?php }} ?>