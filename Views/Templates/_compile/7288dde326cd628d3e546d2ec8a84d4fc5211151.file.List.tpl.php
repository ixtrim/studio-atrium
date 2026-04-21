<?php /* Smarty version Smarty-3.1.11, created on 2022-06-20 10:07:14
         compiled from "/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Favourite/List.tpl" */ ?>
<?php /*%%SmartyHeaderCode:174530302562b046d22d0976-39303095%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7288dde326cd628d3e546d2ec8a84d4fc5211151' => 
    array (
      0 => '/home/studioatrium/7point.pl/app/2016.studioatrium.www/Views/Templates/Favourite/List.tpl',
      1 => 1622008192,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174530302562b046d22d0976-39303095',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    '_project' => 0,
    'isLocal' => 0,
    'comparedIds' => 0,
    'user' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_62b046d2300474_18950777',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_62b046d2300474_18950777')) {function content_62b046d2300474_18950777($_smarty_tpl) {?><div class="list-header activated">
	<div>
		<div class="header-wrapper">
			<div>
				<h1><span>Ulubione</span></h1>
				<p>
					Poniżej znajdują się projekty dodane do ulubionych. Dostępny jest formularz umożliwiający wysłanie linków do projektów na wybrany adres e-mail. Wybrane dowolne 3 projekty z Ulubionych można porównać na osobnej podstronie w formie zestawienia tabelarycznego.
				</p>
			</div>
		</div>
	</div>
</div>

<?php if ($_smarty_tpl->tpl_vars['list']->value){?>
<div class="wrapper">
	<div class="box">
		<ul class="actions">
			<li><span class="remove-all">Usuń wszystkie</span></li>
			<li><span class="share-links">Prześlij znajomemu</span></li>
			<li>
				<span class="check-by">Zaznacz za pomocą:</span>
				<a class="framed" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'favourite','action'=>'compare'),$_smarty_tpl);?>
">Porównaj zaznaczone</a>
			</li>
		</ul>
	</div>
</div>

<div class="container" id="project-list">
	<section>
		<div class="list-grid fav-wrapper" id="overlay-group">
		<?php  $_smarty_tpl->tpl_vars['_project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_project']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_project']->key => $_smarty_tpl->tpl_vars['_project']->value){
$_smarty_tpl->tpl_vars['_project']->_loop = true;
 $_smarty_tpl->tpl_vars['_project']->index++;
?>
			<div>
				<figure>
					<img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'box'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
">
					<figcaption>
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['_project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
">
							<span>projekt domu <?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasFloor'][0][0]->mHasFloor($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?>piętrowego<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasLoft'][0][0]->mHasLoft($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?>z poddaszem<?php }elseif($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isGroundFloor'][0][0]->mIsGroundFloor($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?>parterowego<?php }?><?php if ($_smarty_tpl->tpl_vars['isLocal']->value){?> <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];?>
<?php }?></span>
							<strong><?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
 <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
 m<sup>2</sup></span></strong>
						</a>
					</figcaption>
				</figure>
				
				<span class="overview" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" data-idx="<?php echo $_smarty_tpl->tpl_vars['_project']->index;?>
" data-img="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'presentation'),$_smarty_tpl);?>
" data-ground="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value),$_smarty_tpl);?>
"<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasFloor'][0][0]->mHasFloor($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?> data-floor="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value,'storey'=>'1st_floor'),$_smarty_tpl);?>
"<?php }?><?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['hasLoft'][0][0]->mHasLoft($_smarty_tpl->tpl_vars['_project']->value['params_general'],true)){?> data-loft="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0][0]->fImage(array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value,'storey'=>'loft'),$_smarty_tpl);?>
"<?php }?> data-link="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['_project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl);?>
" data-price="<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><strike><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
</strike> <?php echo $_smarty_tpl->tpl_vars['_project']->value['price']-$_smarty_tpl->tpl_vars['_project']->value['discount'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
<?php }?>" data-name="<?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
" data-area="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['usableArea'][0][0]->mUsableArea($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-parcel="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelWidth'][0][0]->mParcelWidth($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
 x <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['parcelHeight'][0][0]->mParcelHeight($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-height="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['houseHeight'][0][0]->mHouseHeight($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-angle="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roofAngle'][0][0]->mRoofAngle($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-version="<?php if ($_smarty_tpl->tpl_vars['_project']->value['type']=='skeleton'){?>wersja szkieletowa<?php }else{ ?>wersja murowana<?php }?>" data-rooms="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['roomCount'][0][0]->mRoomCount($_smarty_tpl->tpl_vars['_project']->value['params_general']);?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
"></span>
				<span id="compare-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" class="forcompare<?php if (in_array($_smarty_tpl->tpl_vars['_project']->value['id'],$_smarty_tpl->tpl_vars['comparedIds']->value)){?> on<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span>
				<span id="fav-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" class="forfav on isList" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span>
				
				<?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isNew'][0][0]->mIsNew($_smarty_tpl->tpl_vars['_project']->value)||$_smarty_tpl->tpl_vars['_project']->value['discount']){?>
				<div>
					<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']){?><span class="discount">rabat <?php echo $_smarty_tpl->tpl_vars['_project']->value['discount'];?>
</span><?php }?><?php if ($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['isNew'][0][0]->mIsNew($_smarty_tpl->tpl_vars['_project']->value)){?><span class="new">nowość</span><?php }?>
				</div> 
				<?php }?>
			</div>
		<?php } ?>
		</div>
	</section>
</div>

<div class="wrapper">
	<div class="box">
		<ul class="actions">
			<li><span class="remove-all">Usuń wszystkie</span></li>
			<li><span class="share-links">Prześlij znajomemu</span></li>
			<li>
				<span class="check-by">Zaznacz za pomocą:</span>
				<a class="framed" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'favourite','action'=>'compare'),$_smarty_tpl);?>
">Porównaj zaznaczone</a>
			</li>
		</ul>
	</div>
</div>

<div class="overlay">
	<div class="overlay-project-box" id="over-pop">
		<div id="over-img-box">
			<ul id="over-pics">
				<li><span id="over-render" class="selected">Wizualizacja</span></li>
				<li><span id="over-ground" class="noview">Rzut parteru</span></li>
				<li><span id="over-floor" class="noview">Rzut piętra</span></li>
				<li><span id="over-loft" class="noview">Rzut poddasza</span></li>
			</ul>
		
			<a href="">
				<img id="over-img" src="/img/dummy.png" width="1350" height="900" alt="Render">
			</a>
		</div>
		
		<ul id="over-params">
			<li><h6 id="over-name"></h6></li>
			<li class="small"><span id="over-txt"></span></li>
			<li><span id="over-version"></span></li>
			<li><p>ilość pokoi: <span id="over-rooms"></span></p></li>
			<li><p>powierzchnia użytkowa: <span id="over-area"></span> m<sup>2</sup></p></li>
			<li><p>min. wymiary działki: <span id="over-parcel"></span> m</p></li>
			<li><p>wysokość budynku: <span id="over-height"></span> m</p></li>
			<li><p>kąt nachylenia dachu: <span id="over-angle"></span></p></li>
			<li><p>cena projektu: <span id="over-price"></span> zł</p></li>
			<li><a href="" class="more">Zobacz szczegóły</a></li>
		</ul>
		
		<button type="button" class="overlay-change prev" id="prev-overlay">poprzedni</button>
		<button type="button" class="overlay-change next" id="next-overlay">następny</button>
	</div>
	<button type="button" id="overlay-close" class="overlay-close">Zamknij</button>
</div>

<div class="blue-overlay" id="links-pop">
	<div id="links-wrapper">
		<h4>Prześlij znajomemu</h4>
		
		<p class="nocaps">Wypełnij poniższy formularz i prześlij wiadomość znajomemu.</p>
		
		<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->generateUrl(array('module'=>'favourite','action'=>'send'),$_smarty_tpl);?>
" id="links-form">
			<input name="module" type="hidden" value="favourite">
			<input name="action" type="hidden" value="send">

			<p>
				<label for="receiver-email" class="black">E-mail odbiorcy</label>
				<input type="text" name="receiver_email" id="receiver-email" class="long">
			</p>

			<p>
				<label for="sender-email" class="black">Twój e-mail</label>
				<input type="text" name="sender_email" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
" id="sender-email" class="long">
			</p>
			
			<p>
				<label for="links-message" class="black">Treść wiadomości</label>
				<textarea name="message" id="links-message" cols="1" rows="1"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</textarea>
			</p>
			
			<p>
				<label for="sender-sign" class="black">Twój podpis</label>
				<input type="text" name="signature" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['surname'];?>
" id="sender-sign" class="long">
			</p>
			
			<p class="last"><input id="links_button" type="submit" value="wyślij" class="baton"></p>
			<p class="nocaps" id="links-fail-box" style="display: none;">Wypełnij poprawnie formularz</p>
		</form>
	</div>
	<button type="button" id="share-overlay-close" class="blue-overlay-close">Zamknij</button>
</div>
<?php }else{ ?>
<div class="wrapper">
	<div class="box center">
		<p class="no-result">Nie masz projektów w ulubionych.</p>
		<p>Znajdź projekty na listach kategorii lub skorzystaj z wygodnej wyszukiwarki i dodaj projekty do Ulubionych, by móc do nich wrócić w każdym momencie.</p>
		
		<p class="no-result-ib"><img src="/img/nofav.png" alt=""></p>
	</div>
</div>
<?php }?><?php }} ?>