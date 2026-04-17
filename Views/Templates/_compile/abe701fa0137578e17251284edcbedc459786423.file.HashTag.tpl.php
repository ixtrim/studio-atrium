<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 08:34:48
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Article/HashTag.tpl" */ ?>
<?php /*%%SmartyHeaderCode:160937299762b031289e6323-72326299%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'abe701fa0137578e17251284edcbedc459786423' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Article/HashTag.tpl',
      1 => 1506601781,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160937299762b031289e6323-72326299',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'allTags' => 0,
    'request' => 0,
    'tid' => 0,
    '_tag' => 0,
    'total' => 0,
    'pages' => 0,
    'page' => 0,
    'url' => 0,
    'query' => 0,
    'articles' => 0,
    'article' => 0,
    '_tagId' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b03128a22ad4_55453231',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b03128a22ad4_55453231')) {function content_62b03128a22ad4_55453231($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/studioatrium/7point.pl/lib/php/Packages/Smarty3/plugins/modifier.truncate.php';
?><div class="wrapper">
	<div class="box spaced">
		<h1 class="article-title"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'article','action'=>'all_tags'),$_smarty_tpl);?>
">Baza wiedzy</a></h1>
		<ul class="article-tags">
			<li><a href="/projekty-domow/">projekty domów</a></li>
			<?php  $_smarty_tpl->tpl_vars['_tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_tag']->_loop = false;
 $_smarty_tpl->tpl_vars['tid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allTags']->value['main']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_tag']->key => $_smarty_tpl->tpl_vars['_tag']->value){
$_smarty_tpl->tpl_vars['_tag']->_loop = true;
 $_smarty_tpl->tpl_vars['tid']->value = $_smarty_tpl->tpl_vars['_tag']->key;
?>
				<li<?php if ($_smarty_tpl->tpl_vars['request']->value['tag']==$_smarty_tpl->tpl_vars['tid']->value){?> class="selected"<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'article','action'=>'hash_tag','id'=>$_smarty_tpl->tpl_vars['tid']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['_tag']->value;?>
</a></li>
			<?php } ?>
		</ul>
		
		<div class="control-box">
			<ul>
				<li><span>Znalezionych tekstów <strong><?php echo (($tmp = @$_smarty_tpl->tpl_vars['total']->value)===null||$tmp==='' ? 0 : $tmp);?>
</strong></span></li>
				<li>
					<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'article','action'=>'hash_tag'),$_smarty_tpl);?>
" method="get">
						<fieldset>
							<input name="search" value="<?php if ($_smarty_tpl->tpl_vars['request']->value['search']){?><?php echo $_smarty_tpl->tpl_vars['request']->value['search'];?>
<?php }?>" placeholder="<?php if ($_smarty_tpl->tpl_vars['request']->value['search']){?><?php echo $_smarty_tpl->tpl_vars['request']->value['search'];?>
<?php }else{ ?>wpisz szukane wyrażenie<?php }?>" type="text">
							<input type="submit" value="szukaj w bazie wiedzy">
						</fieldset>
					</form>
				</li>
				<li>
				<?php if ($_smarty_tpl->tpl_vars['pages']->value>1){?>
					<?php echo $_smarty_tpl->getSubTemplate ("Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value,'query'=>$_smarty_tpl->tpl_vars['query']->value), 0);?>

				<?php }?>
				</li>
			</ul>
		</div>
	</div>
</div>

<div class="articles-box">
	<div id="article-list-box" class="list-box">
		<ul class="list">
			<?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value){
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
			<li>
				<div>
					<a href="/<?php if ($_smarty_tpl->tpl_vars['article']->value['doctype']=='news'){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'news','action'=>'item','docId'=>$_smarty_tpl->tpl_vars['article']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['article']->value['title']),$_smarty_tpl);?>
<?php }elseif($_smarty_tpl->tpl_vars['article']->value['doctype']=='page'){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'document','action'=>'item','docId'=>$_smarty_tpl->tpl_vars['article']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['article']->value['title']),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'article','action'=>'item','docId'=>$_smarty_tpl->tpl_vars['article']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['article']->value['title']),$_smarty_tpl);?>
<?php }?>">
						<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['articleImage'][0][0]->fArticleImage(array('document'=>$_smarty_tpl->tpl_vars['article']->value),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
">
					</a>
				</div>
				
				<h6>
					<a href="/<?php if ($_smarty_tpl->tpl_vars['article']->value['doctype']=='news'){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'news','action'=>'item','docId'=>$_smarty_tpl->tpl_vars['article']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['article']->value['title']),$_smarty_tpl);?>
<?php }elseif($_smarty_tpl->tpl_vars['article']->value['doctype']=='page'){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'document','action'=>'item','docId'=>$_smarty_tpl->tpl_vars['article']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['article']->value['title']),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'article','action'=>'item','docId'=>$_smarty_tpl->tpl_vars['article']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['article']->value['title']),$_smarty_tpl);?>
<?php }?>">
						<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>

					</a>
				</h6>
				
				<?php if ($_smarty_tpl->tpl_vars['article']->value['extra_data']['hashTags']){?>
				<ul class="article-tags">
					<?php  $_smarty_tpl->tpl_vars['_tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_tag']->_loop = false;
 $_smarty_tpl->tpl_vars['_tagId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['article']->value['extra_data']['hashTags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_tag']->key => $_smarty_tpl->tpl_vars['_tag']->value){
$_smarty_tpl->tpl_vars['_tag']->_loop = true;
 $_smarty_tpl->tpl_vars['_tagId']->value = $_smarty_tpl->tpl_vars['_tag']->key;
?>
					<li<?php if ($_smarty_tpl->tpl_vars['request']->value['tag']==$_smarty_tpl->tpl_vars['_tagId']->value){?> class="selected"<?php }?>>
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'article','action'=>'hash_tag','id'=>$_smarty_tpl->tpl_vars['_tagId']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['_tag']->value;?>
</a>
					</li>
					<?php } ?>
				</ul>
				<?php }?>
				
				<p>
					<?php if ($_smarty_tpl->tpl_vars['article']->value['doctype']=='page'&&!$_smarty_tpl->tpl_vars['article']->value['teaser']){?>
						<?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['article']->value['content']),"300");?>

					<?php }else{ ?>
						<?php echo nl2br($_smarty_tpl->tpl_vars['article']->value['teaser']);?>

					<?php }?>
				</p>
				<p>
					<a class="framed" href="/<?php if ($_smarty_tpl->tpl_vars['article']->value['doctype']=='news'){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'news','action'=>'item','docId'=>$_smarty_tpl->tpl_vars['article']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['article']->value['title']),$_smarty_tpl);?>
<?php }elseif($_smarty_tpl->tpl_vars['article']->value['doctype']=='page'){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'document','action'=>'item','docId'=>$_smarty_tpl->tpl_vars['article']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['article']->value['title']),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'article','action'=>'item','docId'=>$_smarty_tpl->tpl_vars['article']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['article']->value['title']),$_smarty_tpl);?>
<?php }?>">Zobacz więcej</a>
				</p>
			</li>
			<?php } ?>
		</ul>
	</div>
	
	<aside>
		<p>Kategorie</p>
		
		<ul class="main-tags">
		<?php  $_smarty_tpl->tpl_vars['_tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_tag']->_loop = false;
 $_smarty_tpl->tpl_vars['tid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allTags']->value['main']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_tag']->key => $_smarty_tpl->tpl_vars['_tag']->value){
$_smarty_tpl->tpl_vars['_tag']->_loop = true;
 $_smarty_tpl->tpl_vars['tid']->value = $_smarty_tpl->tpl_vars['_tag']->key;
?>
			<li class="main<?php if ($_smarty_tpl->tpl_vars['request']->value['tag']==$_smarty_tpl->tpl_vars['tid']->value){?> selected<?php }?>"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'article','action'=>'hash_tag','id'=>$_smarty_tpl->tpl_vars['tid']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['_tag']->value;?>
</a></li>
		<?php } ?>
		</ul>
		
		<div id="tagList">
			<p>Lista tagów</p>
			<ul class="tags">
			<?php  $_smarty_tpl->tpl_vars['_tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_tag']->_loop = false;
 $_smarty_tpl->tpl_vars['tid'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allTags']->value['normal']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_tag']->key => $_smarty_tpl->tpl_vars['_tag']->value){
$_smarty_tpl->tpl_vars['_tag']->_loop = true;
 $_smarty_tpl->tpl_vars['tid']->value = $_smarty_tpl->tpl_vars['_tag']->key;
?>
				<li<?php if ($_smarty_tpl->tpl_vars['request']->value['tag']==$_smarty_tpl->tpl_vars['tid']->value){?> class="selected"<?php }?>><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'article','action'=>'hash_tag','id'=>$_smarty_tpl->tpl_vars['tid']->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['_tag']->value;?>
</a></li>
			<?php } ?>
			</ul>
		</div>
		
		<p>Archiwum forum</p>
		<ul class="archive">
			<li><a href="/archiwum/Forum,Dom-studia-atrium,1.html">Dom Studia Atrium</a></li>
			<li><a href="/archiwum/Forum,Budownictwo-ogolne,2.html">Budownictwo ogólne</a></li>
			<li><a href="/archiwum/Forum,Prawo-i-budowa,3.html">Prawo i budowa</a></li>
			<li><a href="/archiwum/Forum,Uwagi-o-serwisie,4.html">Uwagi o serwisie</a></li>
		</ul>
	</aside>
</div>

<?php if ($_smarty_tpl->tpl_vars['pages']->value>1){?>
<div class="wrapper">
	<div class="box">
		<div class="control-box">
			<ul>
				<li>
					<?php echo $_smarty_tpl->getSubTemplate ("Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value,'query'=>$_smarty_tpl->tpl_vars['query']->value), 0);?>

				</li>
			</ul>
		</div>
	</div>
</div>
<?php }?><?php }} ?>