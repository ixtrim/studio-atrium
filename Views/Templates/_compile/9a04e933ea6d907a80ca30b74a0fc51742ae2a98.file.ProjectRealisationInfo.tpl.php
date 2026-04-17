<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 18:43:17
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Ajax/ProjectRealisationInfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:165421305562b0bfc5710e20-69316050%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a04e933ea6d907a80ca30b74a0fc51742ae2a98' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Ajax/ProjectRealisationInfo.tpl',
      1 => 1546516888,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165421305562b0bfc5710e20-69316050',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'project' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b0bfc57349e4_41482902',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b0bfc57349e4_41482902')) {function content_62b0bfc57349e4_41482902($_smarty_tpl) {?><div style="max-width: 800px; padding-bottom: 32px;">
	<strong>Projekt w fazie koncepcyjnej - zapytaj o termin realizacji</strong>
	<p style="margin-bottom: 35px; margin-top: 12px;">Wybrany przez Ciebie projekt jest aktualnie tylko naszą koncepcją projektową. Pełną dokumentację techniczną do niego rozpoczniemy tworzyć w momencie złożenia zamówienia na ten projekt.</p>
	<p style="text-align: center;"><a href="<?php if ($_smarty_tpl->tpl_vars['user']->value){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'panel','action'=>'message','project_id'=>$_smarty_tpl->tpl_vars['project']->value['id']),$_smarty_tpl);?>
<?php }else{ ?>javascript:AjaxInfo.showConsultant();<?php }?>" style=" text-transform: uppercase;">zapytaj konsultanta o termin realizacji projektu</a></p>
</div><?php }} ?>