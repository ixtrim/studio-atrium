<?php
/* Smarty version 3.1.48, created on 2026-10-03 09:36:05
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/DownloadsOverlay.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6ac0b065327d29_55546038',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2fc95f58175e68cfdb5d36ea9b7c37d714e8cecd' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/DownloadsOverlay.tpl',
      1 => 1791012910,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6ac0b065327d29_55546038 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="proj-dload-overlay" class="blue-overlay" aria-hidden="true">
	<div class="form-wrapper" id="proj-dload-wrapper">
		<h4>Pliki do pobrania</h4>

		<?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
			<?php if ($_smarty_tpl->tpl_vars['project']->value['attachments']['ProjectFile'] || call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'isAvailable' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectParams']->value )) || (!$_smarty_tpl->tpl_vars['noestimate']->value && $_smarty_tpl->tpl_vars['project']->value['type'] != 'skeleton')) {?>
				<ul class="proj-dload-list">
					<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'isAvailable' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectParams']->value ))) {?>
						<li><span class="ajax-info" data-url="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'get_request_form','type'=>'sketch','order'=>1),$_smarty_tpl ) );?>
" data-call="ProjectRequest.registerRequestForm">Zamów rysunki szczegółowe</span></li>
						<li><span class="ajax-info" data-url="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'get_request_form','type'=>'materials','order'=>1),$_smarty_tpl ) );?>
" data-call="ProjectRequest.registerRequestForm">Zamów zestawienie materiałów</span></li>
						<?php if ($_smarty_tpl->tpl_vars['project']->value['type'] != 'skeleton') {?>
						<li><span class="ajax-info" data-url="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'get_request_form','type'=>'parcel_dwg','order'=>1),$_smarty_tpl ) );?>
" data-call="ProjectRequest.registerRequestForm">Zamów obrys dwg</span></li>
						<li><span class="ajax-info" data-url="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'get_request_form','type'=>'parcel_pdf','order'=>1),$_smarty_tpl ) );?>
" data-call="ProjectRequest.registerRequestForm">Zamów obrys pdf</span></li>
						<?php }?>
						<li><span class="ajax-info" data-url="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'get_request_form','type'=>'woodwork','order'=>1),$_smarty_tpl ) );?>
" data-call="ProjectRequest.registerRequestForm">Zamów zestawienie stolarki</span></li>
					<?php }?>
					<?php if (!$_smarty_tpl->tpl_vars['noestimate']->value && $_smarty_tpl->tpl_vars['project']->value['type'] != 'skeleton') {?>
					<li><span class="ajax-info" data-url="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'get_request_form','type'=>'estimate','order'=>2),$_smarty_tpl ) );?>
" data-call="ProjectRequest.registerGenRequestForm">Pobierz szacunkowy kosztorys</span></li>
					<?php }?>
				</ul>
			<?php } else { ?>
				<p class="pop-lead">Nie znaleziono plików do pobrania dla tego projektu.</p>
			<?php }?>
		<?php } elseif (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'isAvailable' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectParams']->value ))) {?>
			<p class="pop-lead">
				Aby pobrać <strong>rysunki szczegółowe</strong><?php if ($_smarty_tpl->tpl_vars['project']->value['type'] != 'skeleton' && !$_smarty_tpl->tpl_vars['noestimate']->value) {?>, <strong>kosztorys szacunkowy</strong><?php }?>, <strong>obrysy domu</strong> lub <strong>zestawienie materiałów</strong> do tego projektu,
				<a href="javascript:" class="account login-trigger">zaloguj się do swojego konta</a> i otwórz ponownie listę plików.
			</p>
		<?php } elseif (!$_smarty_tpl->tpl_vars['noestimate']->value && $_smarty_tpl->tpl_vars['project']->value['type'] != 'skeleton') {?>
			<p class="pop-lead">
				Aby pobrać <strong>kosztorys szacunkowy</strong> do tego projektu,
				<a href="javascript:" class="account login-trigger">zaloguj się do swojego konta</a> i otwórz ponownie listę plików.
			</p>
		<?php } else { ?>
			<p class="pop-lead">Nie znaleziono plików do pobrania dla tego projektu.</p>
		<?php }?>
	</div>

	<button type="button" id="proj-dload-overlay-close" class="blue-overlay-close">
		<span class="close-x" aria-hidden="true">✖</span>
		<span>Zamknij</span>
	</button>
</div>
<?php }
}
