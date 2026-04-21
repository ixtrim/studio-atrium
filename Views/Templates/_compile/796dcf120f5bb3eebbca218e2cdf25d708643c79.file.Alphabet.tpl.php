<?php /* Smarty version Smarty-3.1.11, created on 2025-11-07 12:59:58
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Alphabet.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138679897068cbe15b3b36b7-43802164%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '796dcf120f5bb3eebbca218e2cdf25d708643c79' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Project/Alphabet.tpl',
      1 => 1762520392,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138679897068cbe15b3b36b7-43802164',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_68cbe15b3f94d0_04331518',
  'variables' => 
  array (
    'letter' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_68cbe15b3f94d0_04331518')) {function content_68cbe15b3f94d0_04331518($_smarty_tpl) {?><div class="list-header realisation activated">
	<div>
		<div class="header-wrapper">
			<div>
				<h1><span>Alfabetyczna lista projektów</span></h1>
				<p>Poniżej znajduje się ułożona alfabetycznie lista projektów domów z naszej oferty wraz z powierzchnią użytkową.</p>
			</div>
		</div>
	</div>
</div>
<div class="control-box">
	<ul>
		<li class="path"><a href="/">projekty domów</a> &raquo; <a href="/projekty-domow/" class="all">wszystkie projekty domów</a> &raquo; alfabetycznie &raquo; <strong><?php echo $_smarty_tpl->tpl_vars['letter']->value;?>
</strong></li>
	</ul>
	<nav class="alphabet">Wybierz literę alfabetu:
	<div>
		<a href="/alfabetyczna-lista-projektow/"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='A'){?> class="selected"<?php }?>>A</a>
		<a href="/alfabetyczna-lista-projektow/B"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='B'){?> class="selected"<?php }?>>B</a>
		<a href="/alfabetyczna-lista-projektow/C"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='C'){?> class="selected"<?php }?>>C</a>
		<a href="/alfabetyczna-lista-projektow/D"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='D'){?> class="selected"<?php }?>>D</a>
		<a href="/alfabetyczna-lista-projektow/E"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='E'){?> class="selected"<?php }?>>E</a>
		<a href="/alfabetyczna-lista-projektow/F"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='F'){?> class="selected"<?php }?>>F</a>
		<a href="/alfabetyczna-lista-projektow/G"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='G'){?> class="selected"<?php }?>>G</a>
		<a href="/alfabetyczna-lista-projektow/H"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='H'){?> class="selected"<?php }?>>H</a>
		<a href="/alfabetyczna-lista-projektow/I"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='I'){?> class="selected"<?php }?>>I</a>
		<a href="/alfabetyczna-lista-projektow/J"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='J'){?> class="selected"<?php }?>>J</a>
		<a href="/alfabetyczna-lista-projektow/K"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='K'){?> class="selected"<?php }?>>K</a>
		<a href="/alfabetyczna-lista-projektow/L"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='L'){?> class="selected"<?php }?>>L</a>
		<a href="/alfabetyczna-lista-projektow/M"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='M'){?> class="selected"<?php }?>>M</a>
		<a href="/alfabetyczna-lista-projektow/N"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='N'){?> class="selected"<?php }?>>N</a>
		<a href="/alfabetyczna-lista-projektow/O"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='O'){?> class="selected"<?php }?>>O</a>
		<a href="/alfabetyczna-lista-projektow/P"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='P'){?> class="selected"<?php }?>>P</a>
		<a href="/alfabetyczna-lista-projektow/Q"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='Q'){?> class="selected"<?php }?>>Q</a>
		<a href="/alfabetyczna-lista-projektow/R"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='R'){?> class="selected"<?php }?>>R</a>
		<a href="/alfabetyczna-lista-projektow/S"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='S'){?> class="selected"<?php }?>>S</a>
		<a href="/alfabetyczna-lista-projektow/T"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='T'){?> class="selected"<?php }?>>T</a>
		<a href="/alfabetyczna-lista-projektow/U"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='U'){?> class="selected"<?php }?>>U</a>
		<a href="/alfabetyczna-lista-projektow/W"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='W'){?> class="selected"<?php }?>>W</a>
		<a href="/alfabetyczna-lista-projektow/V"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='V'){?> class="selected"<?php }?>>V</a>
		
		
		<a href="/alfabetyczna-lista-projektow/Z"<?php if ($_smarty_tpl->tpl_vars['letter']->value=='Z'){?> class="selected"<?php }?>>Z</a>
		
	</div>
</nav>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("Project/searchDisplayList.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php }} ?>