<?php /* Smarty version Smarty-3.1.11, created on 2022-07-02 13:14:50
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Pdf/Plot.tpl" */ ?>
<?php /*%%SmartyHeaderCode:188804281362c044ca63e3f6-23525446%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '236a033f7581e00058e3f9e2e4d2d361d0ea20a8' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Pdf/Plot.tpl',
      1 => 1510827441,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188804281362c044ca63e3f6-23525446',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
    'img' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62c044ca667252_05087242',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62c044ca667252_05087242')) {function content_62c044ca667252_05087242($_smarty_tpl) {?><table cellpadding="0" >
	<tr>
		<td>
			<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 - szkic działki
		</td>
	</tr>
</table>

<img src="img/tmp/<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
">
<?php }} ?>