<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 08:30:34
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Layout/Tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:117581705162b0302a37acc1-22566495%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0d88607ef7fefc2a7d0e0f8373a8d6a0fc856d2' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Layout/Tools.tpl',
      1 => 1520428801,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117581705162b0302a37acc1-22566495',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'notifications' => 0,
    'favouriteIds' => 0,
    'basket' => 0,
    '_basket' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0302a394d79_27888444',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0302a394d79_27888444')) {function content_62b0302a394d79_27888444($_smarty_tpl) {?><div id="tool-box" class="off">
	<div id="tool-user">
		<?php if ($_smarty_tpl->tpl_vars['user']->value){?>
			<span class="tab user<?php if ($_smarty_tpl->tpl_vars['notifications']->value){?> notify<?php }?>"></span>
			<div class="tab-box user padded">
				<p>Twoje konto</p>
				
				<p class="username">Witaj <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'helo'),$_smarty_tpl);?>
"><span><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['surname'];?>
</span></a>!

				<nav id="user-menu">
					<p><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'account'),$_smarty_tpl);?>
">Twoje konto</a></p>
					<p><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'message'),$_smarty_tpl);?>
">Korespondencja</a></p>
					
					<p><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'forum'),$_smarty_tpl);?>
">Forum</a></p>
					<p><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'promo'),$_smarty_tpl);?>
">Promocje</a></p>
					<p><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'transaction'),$_smarty_tpl);?>
">Zamówienia</a></p>
				</nav>

				<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'authenticate','action'=>'logout'),$_smarty_tpl);?>
" class="framed">Wyloguj</a>
			</div>
		<?php }else{ ?>
		<span class="tab login"></span>
		<div class="tab-box login">
			<p>Twoje konto</p>
			<a href="javascript:" id="login" class="login-trigger">Zaloguj</a><span> / </span><a href="javascript:" id="register" class="register-trigger">Zarejestruj</a>
		</div>
		<?php }?>
	</div>
	
	<div id="tool-fav">
		<span id="tab-fav" class="tab favourite notify<?php if (count($_smarty_tpl->tpl_vars['favouriteIds']->value)==0){?> hidden<?php }?>" data-hover="<?php echo count($_smarty_tpl->tpl_vars['favouriteIds']->value);?>
"></span>
		<div class="tab-box fav-wrapper" id="tool-fav-box">
			<p id="fav-projects"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'favourite','action'=>'list'),$_smarty_tpl);?>
">Ulubione projekty</a></p>
		</div>
	</div>
	
	<div id="tool-cart">
		<span class="tab cart<?php if ($_smarty_tpl->tpl_vars['basket']->value){?> notify<?php }?>"></span>
		<div class="tab-box<?php if ($_smarty_tpl->tpl_vars['basket']->value){?> padded<?php }else{ ?> emptyCart<?php }?>" id="tabBasketContent">
			<p>Twój koszyk</p>
			<?php if ($_smarty_tpl->tpl_vars['basket']->value){?>
			<ul id="basketTabContent">
				<?php  $_smarty_tpl->tpl_vars['_basket'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_basket']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['basket']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_basket']->key => $_smarty_tpl->tpl_vars['_basket']->value){
$_smarty_tpl->tpl_vars['_basket']->_loop = true;
?>
				<li>
					<ul>
						<?php if ($_smarty_tpl->tpl_vars['_basket']->value['pid']){?>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['link'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['thumb'];?>
" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['unicode'][0][0]->mUnicode(urldecode($_smarty_tpl->tpl_vars['_basket']->value['name']));?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['unicode'][0][0]->mUnicode(urldecode($_smarty_tpl->tpl_vars['_basket']->value['name']));?>
<?php if ($_smarty_tpl->tpl_vars['_basket']->value['version']=='mirror'){?> <small>(odbicie lustrzane)</small><?php }?></a></li>
							<li><span class="price"><?php echo $_smarty_tpl->tpl_vars['_basket']->value['price'];?>
 zł</span></li>
							<li><span class="remove" data-project="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
" data-version="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'];?>
"></span></li>
						<?php }else{ ?>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['thumb'];?>
" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['unicode'][0][0]->mUnicode(urldecode($_smarty_tpl->tpl_vars['_basket']->value['name']));?>
" class="extras"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['unicode'][0][0]->mUnicode(urldecode($_smarty_tpl->tpl_vars['_basket']->value['name']));?>
</li>
							<li><span class="price"><?php echo $_smarty_tpl->tpl_vars['_basket']->value['price'];?>
 zł</span></li>
							<li><span class="remove" data-extras="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['eid'];?>
"></span></li>
						<?php }?>	
					</ul>
				</li>
				<?php } ?>
			</ul>
			<?php }else{ ?>
				<span id="emptyBasket">Nie masz nic w koszyku</span>
				<ul id="basketTabContent"></ul>
			<?php }?>
			<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'order','action'=>'cart'),$_smarty_tpl);?>
" class="framed" id="finalBasketAction"<?php if (!$_smarty_tpl->tpl_vars['basket']->value){?> style="display: none;"<?php }?>>Finalizuj zakupy</a>
		</div>
	</div>
	
	<div id="tool-fbook">
		<span class="tab fbook"></span>
		<div class="tab-box">
			<p>Facebook</p>
			<div id="fbook-placeholder"></div>
		</div>
	</div>
</div><?php }} ?>