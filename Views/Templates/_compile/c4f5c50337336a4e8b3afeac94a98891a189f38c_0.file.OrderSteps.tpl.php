<?php
/* Smarty version 3.1.48, created on 2026-10-01 21:38:46
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/OrderSteps.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abeb6c6874d49_95093151',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4f5c50337336a4e8b3afeac94a98891a189f38c' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/OrderSteps.tpl',
      1 => 1790883322,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6abeb6c6874d49_95093151 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="order-steps" aria-label="Etapy zamówienia">
	<ol class="order-steps__list">
		<li class="order-steps__item<?php if ($_smarty_tpl->tpl_vars['orderStep']->value == 'cart') {?> is-current<?php } elseif ($_smarty_tpl->tpl_vars['orderStep']->value == 'data' || $_smarty_tpl->tpl_vars['orderStep']->value == 'summary') {?> is-done<?php }?>">
			<?php if ($_smarty_tpl->tpl_vars['orderStep']->value != 'cart') {?>
				<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'order','action'=>'cart'),$_smarty_tpl ) );?>
" class="order-steps__link">
					<span class="order-steps__num">1</span>
					<span class="order-steps__label">Koszyk</span>
				</a>
			<?php } else { ?>
				<span class="order-steps__link">
					<span class="order-steps__num">1</span>
					<span class="order-steps__label">Koszyk</span>
				</span>
			<?php }?>
		</li>
		<li class="order-steps__item<?php if ($_smarty_tpl->tpl_vars['orderStep']->value == 'data') {?> is-current<?php } elseif ($_smarty_tpl->tpl_vars['orderStep']->value == 'summary') {?> is-done<?php } else { ?> is-disabled<?php }?>">
			<?php if ($_smarty_tpl->tpl_vars['orderStep']->value == 'summary') {?>
				<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'order','action'=>'data'),$_smarty_tpl ) );?>
" class="order-steps__link">
					<span class="order-steps__num">2</span>
					<span class="order-steps__label">Dane osobowe</span>
				</a>
			<?php } else { ?>
				<span class="order-steps__link">
					<span class="order-steps__num">2</span>
					<span class="order-steps__label">Dane osobowe</span>
				</span>
			<?php }?>
		</li>
		<li class="order-steps__item<?php if ($_smarty_tpl->tpl_vars['orderStep']->value == 'summary') {?> is-current<?php } else { ?> is-disabled<?php }?>">
			<span class="order-steps__link">
				<span class="order-steps__num">3</span>
				<span class="order-steps__label">Podsumowanie</span>
			</span>
		</li>
	</ol>
</nav>
<?php }
}
