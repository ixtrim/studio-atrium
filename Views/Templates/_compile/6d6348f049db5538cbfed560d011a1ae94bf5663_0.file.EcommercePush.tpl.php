<?php
/* Smarty version 3.1.48, created on 2026-10-01 21:30:17
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/EcommercePush.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6abeb4c96af140_98909371',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d6348f049db5538cbfed560d011a1ae94bf5663' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Include/EcommercePush.tpl',
      1 => 1790681094,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6abeb4c96af140_98909371 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['ecommerce_events']->value) {
echo '<script'; ?>
>
window.__saEcommerceEvents = <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'json_encode' ][ 0 ], array( $_smarty_tpl->tpl_vars['ecommerce_events']->value ));?>
;
<?php echo '</script'; ?>
>
<?php }
}
}
