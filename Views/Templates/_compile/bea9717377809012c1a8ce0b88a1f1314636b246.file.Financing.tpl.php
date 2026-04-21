<?php /* Smarty version Smarty-3.1.11, created on 2023-04-12 12:11:46
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Varia/Financing.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1866900729632ae858304618-96430553%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bea9717377809012c1a8ce0b88a1f1314636b246' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Varia/Financing.tpl',
      1 => 1681301291,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1866900729632ae858304618-96430553',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_632ae858343eb2_12589627',
  'variables' => 
  array (
    'list' => 0,
    'isSearch' => 0,
    'request' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_632ae858343eb2_12589627')) {function content_632ae858343eb2_12589627($_smarty_tpl) {?><div class="list-header finance">
	<div>
		<div class="header-wrapper">
			<div>
				<h1>
					<span>Finansowanie</span>
				</h1>
			</div>
		</div>
	</div>
</div>

<div class="control-box">
	<ul>
		<li class="path"><a href="/">Studio Atrium</a> &raquo; finansowanie</li>
	</ul>
</div>
<section>
	<div class="box">
		<div class="companyInfo">
			<a href="https://mfinanse.pl/formularz-biznespartner/?fn=studio-atrium&f=FBP-0125&e=98082" target="_blank">
				<img src="/img/company/m1.jpg" alt="mFinanse" style="display: block; max-width: 100%; height: 100%; margin: auto;">
				<img src="/img/company/m2.jpg" alt="mFinanse" style="display: block; max-width: 100%; height: 100%; margin: auto;">
			</a>
		</div>
		<div class="companyInfo">
			<p class="line">&nbsp;</p>
			<a href="/click.php?rel=sadf32489sd98jsdfj348gjsdkfjsd934" target="_blank" rel="nofollow"><img src="/img/company/pko.png" alt="PKO BP" class="logo"></a>
			Wiemy, że budowa nowego domu to przedsięwzięcie, które zazwyczaj jest dla Inwestorów nie lada wyzwaniem finansowym. Wiadomo, że nie wszyscy mogą pozwolić sobie na sfinansowanie inwestycji ze zgromadzonych środków pieniężnych.
			Powszechnym rozwiązaniem w takiej sytuacji jest sfinansowanie całości bądź części inwestycji z kredytu hipotecznego z korzystnym oprocentowaniem. 
			Aby choć trochę ułatwić Państwu zrealizowanie marzeń o własnym nowym domu, postanowiliśmy nawiązać współpracę z Bankiem PKO BP, który ma dla Państwa ciekawą propozycję kredytu "Własny kąt hipoteczny".
			Może on posłużyć także jako pomoc między innymi w wykończeniu, remoncie i wyposażeniu domu, czy też zakupie działki budowlanej.<br><br>
			Zapraszamy do zapoznania się z ofertą. Wystarczy kliknąć w poniższy banner, który przekieruje Państwa do szczegółów oferty oraz formularza kontaktowego. Po jego wypełnieniu wyspecjalizowani doradcy finansowi z PKO Bank Polski, 
			skontaktują się z Państwem by odpowiedzieć na wszystkie pytania związane z kredytem i doradzić w kwestiach finansowania inwestycji budowy domu bądź zakupu działki budowlanej.
			<div class="offer"><a href="/click.php?rel=834jfoisdf034gsdvlsdv934ksf4f8hsd" target="_blank" rel="nofollow"><img src="/img/company/pko-big.gif" alt="PKO - własny kąt hipoteczny"></a></p></div>
		</div>
	</div>
</section>

	
<?php if ($_smarty_tpl->tpl_vars['list']->value){?>
<?php echo $_smarty_tpl->getSubTemplate ("Include/HowToBuy.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['isSearch']->value&&!$_smarty_tpl->tpl_vars['request']->value['query']){?>
<div id="backToTopOnList"></div>
<?php }?>
<?php }} ?>