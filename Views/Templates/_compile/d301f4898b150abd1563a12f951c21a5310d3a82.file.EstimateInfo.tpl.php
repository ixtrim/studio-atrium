<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 12:12:39
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Ajax/EstimateInfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212388476062b06437aaf2b0-78786941%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd301f4898b150abd1563a12f951c21a5310d3a82' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Ajax/EstimateInfo.tpl',
      1 => 1594636350,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212388476062b06437aaf2b0-78786941',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b06437ab1a88_93897997',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b06437ab1a88_93897997')) {function content_62b06437ab1a88_93897997($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['info']->value==2){?>
<div style="max-width: 800px; padding-bottom: 32px;">
	<p><strong>Uwaga! Podane koszty nie zawierają podatku VAT.</strong></p>
	
	<p>Przedstawione wartości pochodzą z kosztorysu inwestorskiego sporządzonego w okresie opisanym poniżej przedstawionych kwot, według średnich stawek Sekocenbudu. Wyliczenia te biorą pod uwagę specyfikę konkretnego projektu, jak stopień skomplikowania bryły budynku, typ dachu, rodzaj zastosowanej stolarki okiennej czy materiałów wykończeniowych. Parametry cenowe należy dostosować do średnich cen obowiązujących w regionie właściwym dla realizacji obiektu.</p>
	
	<p>Standard wykończenia: średni.</p>
	 
	<p><strong>Stan surowy</strong> – zawiera szacunkowe koszty stanu zerowego i surowego bez stolarki okiennej i drzwiowej.</p>
	<p><strong>Roboty wykończeniowe</strong> – zawierają roboty wykończeniowe wewnętrzne (w tym stolarkę okienną i drzwiową) oraz szacunkowe koszty robót zewnętrznych (elewacje, tarasy, balustrady).</p>
	<p><strong>Instalacje</strong> – zawierają szacunkowe koszty instalacji c.o., wodn. kan., elektrycznej, odgromowej, których koszt wykonania szacuje się (w ujęciu wskaźnikowym) na około 16% wartości kosztorysu.</p>
</div>
<?php }else{ ?>
<div style="max-width: 800px; padding-bottom: 32px;">
	<p><strong>Uwaga! Podane koszty są kosztami szacunkowymi i nie zawierają podatku VAT.</strong></p>
	
	<p>Wartość kosztowa powstaje poprzez przemnożenie powierzchni budynku przez wskaźnikową cenę metra kwadratowego. Wyliczenia te nie biorą pod uwagę specyfiki konkretnego projektu, jak stopień skomplikowania bryły budynku, typ dachu, rodzaj zastosowanej stolarki okiennej czy materiałów wykończeniowych, a jedynie powierzchnię budynku.</p>
	
	<p>Podstawa cen została oparta na średnich cenach krajowych. Standard wykończenia: średni.</p>
	 
	<p><strong>Stan surowy</strong> – zawiera szacunkowe koszty stanu zerowego i surowego bez stolarki okiennej i drzwiowej.</p>
	<p><strong>Roboty wykończeniowe</strong> – zawierają roboty wykończeniowe wewnętrzne (w tym stolarkę okienną i drzwiową) oraz szacunkowe koszty robót zewnętrznych.</p>
	<p><strong>Instalacje</strong> – zawierają szacunkowe koszty instalacji c.o., wodn. kan., elektrycznej, odgromowej i osadnika bezodpływowego.</p>
</div>
<?php }?><?php }} ?>