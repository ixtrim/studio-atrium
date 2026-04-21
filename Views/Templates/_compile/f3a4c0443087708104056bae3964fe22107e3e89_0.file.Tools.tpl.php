<?php
/* Smarty version 4.5.6, created on 2026-05-03 21:54:24
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Layout/Tools.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_69f7a7f0893742_23654936',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f3a4c0443087708104056bae3964fe22107e3e89' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Layout/Tools.tpl',
      1 => 1776175186,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69f7a7f0893742_23654936 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="tool-box" class="off">
	<div id="tool-user">
		<?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
			<span class="tab user<?php if ($_smarty_tpl->tpl_vars['notifications']->value) {?> notify<?php }?>"></span>
			<div class="tab-box user padded">
				<p>Twoje konto</p>
				
				<p class="username">Witaj <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'panel','action'=>'helo'),$_smarty_tpl ) );?>
"><span><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['surname'];?>
</span></a>!

				<nav id="user-menu">
					<p><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'panel','action'=>'account'),$_smarty_tpl ) );?>
">Twoje konto</a></p>
					<p><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'panel','action'=>'message'),$_smarty_tpl ) );?>
">Korespondencja</a></p>
										<p><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'panel','action'=>'forum'),$_smarty_tpl ) );?>
">Forum</a></p>
					<p><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'panel','action'=>'promo'),$_smarty_tpl ) );?>
">Promocje</a></p>
					<p><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'panel','action'=>'transaction'),$_smarty_tpl ) );?>
">Zamówienia</a></p>
				</nav>

				<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'authenticate','action'=>'logout'),$_smarty_tpl ) );?>
" class="framed">Wyloguj</a>
			</div>
		<?php } else { ?>
		<span class="tab login"></span>
		<div class="tab-box login">
			<p>Twoje konto</p>
			<a href="javascript:" id="login" class="login-trigger">Zaloguj</a><span> / </span><a href="javascript:" id="register" class="register-trigger">Zarejestruj</a>
		</div>
		<?php }?>
	</div>
	
	<div id="tool-fav">
		<span id="tab-fav" class="tab favourite notify<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'count' ][ 0 ], array( $_smarty_tpl->tpl_vars['favouriteIds']->value )) == 0) {?> hidden<?php }?>" data-hover="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'count' ][ 0 ], array( $_smarty_tpl->tpl_vars['favouriteIds']->value ));?>
"></span>
		<div class="tab-box fav-wrapper" id="tool-fav-box">
			<p id="fav-projects"><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'favourite','action'=>'list'),$_smarty_tpl ) );?>
">Ulubione projekty</a></p>
		</div>
	</div>
	
	<div id="tool-cart">
		<span class="tab cart<?php if ($_smarty_tpl->tpl_vars['basket']->value) {?> notify<?php }?>"></span>
		<div class="tab-box<?php if ($_smarty_tpl->tpl_vars['basket']->value) {?> padded<?php } else { ?> emptyCart<?php }?>" id="tabBasketContent">
			<p>Twój koszyk</p>
			<?php if ($_smarty_tpl->tpl_vars['basket']->value) {?>
			<ul id="basketTabContent">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['basket']->value, '_basket');
$_smarty_tpl->tpl_vars['_basket']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_basket']->value) {
$_smarty_tpl->tpl_vars['_basket']->do_else = false;
?>
				<li>
					<ul>
						<?php if ($_smarty_tpl->tpl_vars['_basket']->value['pid']) {?>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['link'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['thumb'];?>
" alt="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'unicode' ][ 0 ], array( urldecode($_smarty_tpl->tpl_vars['_basket']->value['name']) ));?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'unicode' ][ 0 ], array( urldecode($_smarty_tpl->tpl_vars['_basket']->value['name']) ));
if ($_smarty_tpl->tpl_vars['_basket']->value['version'] == 'mirror') {?> <small>(odbicie lustrzane)</small><?php }?></a></li>
							<li><span class="price"><?php echo $_smarty_tpl->tpl_vars['_basket']->value['price'];?>
 zł</span></li>
							<li><span class="remove" data-project="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['pid'];?>
" data-version="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['version'];?>
"></span></li>
						<?php } else { ?>
							<li><img src="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['thumb'];?>
" alt="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'unicode' ][ 0 ], array( urldecode($_smarty_tpl->tpl_vars['_basket']->value['name']) ));?>
" class="extras"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'unicode' ][ 0 ], array( urldecode($_smarty_tpl->tpl_vars['_basket']->value['name']) ));?>
</li>
							<li><span class="price"><?php echo $_smarty_tpl->tpl_vars['_basket']->value['price'];?>
 zł</span></li>
							<li><span class="remove" data-extras="<?php echo $_smarty_tpl->tpl_vars['_basket']->value['eid'];?>
"></span></li>
						<?php }?>	
					</ul>
				</li>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ul>
			<?php } else { ?>
				<span id="emptyBasket">Nie masz nic w koszyku</span>
				<ul id="basketTabContent"></ul>
			<?php }?>
			<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'order','action'=>'cart'),$_smarty_tpl ) );?>
" class="framed" id="finalBasketAction"<?php if (!$_smarty_tpl->tpl_vars['basket']->value) {?> style="display: none;"<?php }?>>Finalizuj zakupy</a>
		</div>
	</div>
	
	<div id="tool-fbook">
		<span class="tab fbook"></span>
		<div class="tab-box">
			<p>Facebook</p>
			<div id="fbook-placeholder"></div>
		</div>
	</div>
</div><?php }
}
