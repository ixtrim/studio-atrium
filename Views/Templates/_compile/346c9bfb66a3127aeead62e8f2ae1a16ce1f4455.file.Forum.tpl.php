<?php /* Smarty version Smarty-3.1.11, created on 2025-11-26 14:12:15
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Discuss/Forum.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19475450162b038415a3861-78033307%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '346c9bfb66a3127aeead62e8f2ae1a16ce1f4455' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Discuss/Forum.tpl',
      1 => 1764164892,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19475450162b038415a3861-78033307',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b038415c49c5_79420544',
  'variables' => 
  array (
    'categories' => 0,
    '_key' => 0,
    '_item' => 0,
    'request' => 0,
    'comment' => 0,
    'posts' => 0,
    'adminIds' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b038415c49c5_79420544')) {function content_62b038415c49c5_79420544($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.date_format.php';
?><div class="wrapper">
	<div class="box spaced">
		
		<h1 class="hilite">Forum</h1>

		<p>Witamy na Forum dyskusyjnym Studia Atrium. To dział naszego serwisu przeznaczony dla wszystkich zainteresowanych projektami i budową domu wg projektów Studia Atrium. 
		Mamy nadzieję, że będą się Państwo dzielić swoimi przemyśleniami i doświadczeniami, by proces budowy stał się łatwiejszy i przyjemniejszy. Studio Atrium będzie uważnie 
		śledzić te dyskusje, ale Forum to miejsce przede wszystkim dla Was! Uwaga - warto się zalogować! Dla zarejestrowanych użytkowników dostępne bowiem będą wszystkie 
		funkcjonalności: historia dyskusji, powiadomienia, edycja postów, dodawanie grafik. Zapraszamy! <span class="ajax-info" data-url="/?module=ajax&action=get_comment_regulations">Regulamin korzystania</span>.</p>	

		<div id="search-forum">
			<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'search'),$_smarty_tpl);?>
" method="get" id="forum-filters-form">
				<fieldset>
					<ul class="filters-box">
						<li>
							<input id="forum-search-field" name="query" value="" placeholder="wpisz szukane słowo" type="text" autocomplete="off">
						</li>
						<li>
							<div class="select-wrapper">
								<div class="jui-select-box dark" id="category-select-box">
									<select id="category-select" name="cid">
										<option value="0">w kategorii</option>
										<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_smarty_tpl->tpl_vars['_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_key']->value = $_smarty_tpl->tpl_vars['_item']->key;
?>
										<option value="<?php echo $_smarty_tpl->tpl_vars['_key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
</option>
										<?php } ?>
									</select>
								</div>
							</div>
						</li>
						<li class="forum-projects-box">
							<input id="forum-project-field" value="<?php if ($_smarty_tpl->tpl_vars['request']->value['project']){?><?php echo $_smarty_tpl->tpl_vars['request']->value['project'];?>
<?php }?>" placeholder="<?php if ($_smarty_tpl->tpl_vars['request']->value['project']){?><?php echo $_smarty_tpl->tpl_vars['request']->value['project'];?>
<?php }else{ ?>wpisz nazwę projektu<?php }?>" type="text" autocomplete="off">
							<ul id="projects-holder" style="display: none;"></ul>
						</li>
						<li><input type="submit" class="baton" value="Szukaj"></li>
					</ul>
					
					<input type="hidden" id="search-pid" name="pid" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['request']->value['pid'])===null||$tmp==='' ? 0 : $tmp);?>
">
				</fieldset>
			</form>
		</div>
		
		<ul class="forum-header main">
			<li>
				<p>Kategorie</p>
			</li>
			<li>
				<p>Ostatni temat</p>
			</li>
		</ul>

		<?php if ($_smarty_tpl->tpl_vars['comment']->value['user']['nick']){?>
			<?php $_smarty_tpl->tpl_vars['nick'] = new Smarty_variable($_smarty_tpl->tpl_vars['comment']->value['user']['nick'], null, 0);?>
		<?php }else{ ?>
			<?php $_smarty_tpl->tpl_vars['nick'] = new Smarty_variable($_smarty_tpl->tpl_vars['comment']->value['author'], null, 0);?>
		<?php }?>

		<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_smarty_tpl->tpl_vars['_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_key']->value = $_smarty_tpl->tpl_vars['_item']->key;
?>
		<div class="forum-cats">
			<ul class="iconized">
				<li class="<?php echo $_smarty_tpl->tpl_vars['_item']->value['class'];?>
">
					<h4><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'category','id'=>$_smarty_tpl->tpl_vars['_key']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
</a></h4>
					<p><?php echo $_smarty_tpl->tpl_vars['_item']->value['descr'];?>
</p>
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'category','id'=>$_smarty_tpl->tpl_vars['_key']->value),$_smarty_tpl);?>
">zobacz wszystkie tematy</a>
				</li>
				
				<li>
					<ul>
						<li>
							<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['author_id'])){?>
								<p class="avatar"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['avatar'][0][0]->mAvatar($_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['author_id']);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['nick'];?>
"><?php echo $_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['nick'];?>
</p>
							<?php }else{ ?>
								<p <?php if (in_array($_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['author_id'],$_smarty_tpl->tpl_vars['adminIds']->value)){?> class="nick sa"<?php }else{ ?> class="nick" data-initial="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['nick'],1,'');?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['nick'];?>
</p>
							<?php }?>
							<p><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['create_date'],"%d-%m-%Y");?>
</p>
							<p>(<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['create_date'],"%H:%M:%S");?>
)</p>
						</li>
						<li>
							<div>
								<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'discuss','action'=>'thread','id'=>$_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['id']),$_smarty_tpl);?>
">
									<h6><?php echo $_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['topic'];?>
</h6>
									<p><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hideEmails'][0][0]->mHideEmails(smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['posts']->value[$_smarty_tpl->tpl_vars['_key']->value]['content']),160));?>
</p>
								</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<?php } ?>
	</div>
</div><?php }} ?>