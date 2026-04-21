<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 09:57:40
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Selfie/Gallery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4222724462b04494cacfc0-63637646%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2bf8807e1c1cece73013c49205b5d377c4bb1255' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Selfie/Gallery.tpl',
      1 => 1529315099,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4222724462b04494cacfc0-63637646',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'total' => 0,
    'pages' => 0,
    'url' => 0,
    'list' => 0,
    'gallery_path' => 0,
    '_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b04494cee2d4_61331197',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b04494cee2d4_61331197')) {function content_62b04494cee2d4_61331197($_smarty_tpl) {?><div class="list-header realisation<?php if ($_smarty_tpl->tpl_vars['page']->value==1){?> activated<?php }?>">
	<div>
		<div class="header-wrapper">
			<div>
				<h1><span>Selfie z projektem</span></h1>
				<p>Poniżej znajduje się galeria selfie z ulubionym projektem. Jeśli chciałbyś się w nietypowy sposób pochwalić znajomym, jaki dom sobie wymarzyłeś, zachęcamy do korzystania z tego zabawnego narzędzia. Link do niego znaleźć można przy każdym projekcie.</p>
			</div>
		</div>
	</div>
</div>
<div class="control-box">
	<ul>
		<li class="path"><a href="/">projekty domów</a> &raquo; <a href="/projekty-domow/" class="all">wszystkie</a> <span>znalezionych selfie: <strong><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</strong></span></li>

		<?php if ($_smarty_tpl->tpl_vars['pages']->value>1){?>
		<li>
			<?php echo $_smarty_tpl->getSubTemplate ("Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value), 0);?>

		</li>
		<?php }?>
	</ul>
</div>

<div class="container" id="selfie-list">
	<section>
		<div class="grid">
		<?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
?>
		<figure class="effect-sadie">
			<img src="<?php echo $_smarty_tpl->tpl_vars['gallery_path']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['selfie_img_url'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
">
			
			<?php if ($_smarty_tpl->tpl_vars['_item']->value['discount']){?><span class="label discount">rabat <?php echo $_smarty_tpl->tpl_vars['_item']->value['discount'];?>
</span><?php }?>
			<span class="close-sadie"></span>

			<figcaption>
				<h6><?php echo $_smarty_tpl->tpl_vars['_item']->value['project']['name'];?>
</h6>
				<div>
					<p>pow. użytkowa: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_item']->value['project']['params_general']);?>
 <span>m<sup>2</sup></p>
					<p>działka minimalna: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelWidth'][0][0]->mParcelWidth($_smarty_tpl->tpl_vars['_item']->value['project']['params_general']);?>
 x <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelHeight'][0][0]->mParcelHeight($_smarty_tpl->tpl_vars['_item']->value['project']['params_general']);?>
 m</p>
					<p class="desc"><?php echo $_smarty_tpl->tpl_vars['_item']->value['project']['short_description'];?>
</p>
				</div>
				<span class="framed"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_item']->value['project']['id'],'link_title'=>$_smarty_tpl->tpl_vars['_item']->value['project']['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
"><span>Zobacz projekt</span></a></span>
				<a href="<?php echo $_smarty_tpl->tpl_vars['gallery_path']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['selfie_img_url'];?>
" data-fancybox="gallery" data-caption="Projekt domu <?php echo $_smarty_tpl->tpl_vars['_item']->value['project']['name'];?>
 - tytuł selfie: <?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
"><span class="mobile-sadie">Selfie: <?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
 <strong><?php echo $_smarty_tpl->tpl_vars['_item']->value['project']['name'];?>
 <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_item']->value['project']['params_general']);?>
 m<sup>2</sup></span></strong></span></a>
			</figcaption>
		</figure>
		<?php } ?>
		<?php if ($_smarty_tpl->tpl_vars['pages']->value>1&&$_smarty_tpl->tpl_vars['page']->value!=$_smarty_tpl->tpl_vars['pages']->value){?>
			<figure class="effect-sadie nextPage">
				<img src="/img/next.png" alt="następna strona">
				<figcaption>
					<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
">następna strona</a>
				</figcaption>	
			</figure>
		<?php }?>
		</div>
	</section>
</div>

<?php if ($_smarty_tpl->tpl_vars['pages']->value>1){?>
<div class="wrapper">
	<div class="box">
		<div class="control-box">
			<ul>
				<li>
					<?php echo $_smarty_tpl->getSubTemplate ("Include/Pager.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('page'=>$_smarty_tpl->tpl_vars['page']->value,'pages'=>$_smarty_tpl->tpl_vars['pages']->value,'baseUrl'=>$_smarty_tpl->tpl_vars['url']->value), 0);?>

				</li>
			</ul>
		</div>
	</div>
</div>
<?php }?><?php }} ?>