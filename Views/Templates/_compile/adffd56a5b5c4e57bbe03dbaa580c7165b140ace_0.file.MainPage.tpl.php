<?php
/* Smarty version 4.5.6, created on 2026-06-23 06:55:32
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/MainPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.6',
  'unifunc' => 'content_6a3a11c4a09120_68248797',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'adffd56a5b5c4e57bbe03dbaa580c7165b140ace' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/MainPage.tpl',
      1 => 1782190526,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Include/HowToBuy.tpl' => 1,
  ),
),false)) {
function content_6a3a11c4a09120_68248797 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/aronmaiden/studioatrium/studio-atrium/Vendors/smarty/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
if (!$_smarty_tpl->tpl_vars['isMobile']->value) {?>
	<div class="container" id="slider-box">

		<div id="loader-box">
			<img src="/img/loading-slider.gif" alt="Wczytywanie galerii">
		</div>

		<div id="jssor_1">
						<div data-u="slides" class="slides">
				<?php $_smarty_tpl->_assignInScope('idx', 0);?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mainCarousel']->value, '_item');
$_smarty_tpl->tpl_vars['_item']->iteration = 0;
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
$_smarty_tpl->tpl_vars['_item']->iteration++;
$__foreach__item_0_saved = $_smarty_tpl->tpl_vars['_item'];
?>
					<?php if ($_smarty_tpl->tpl_vars['_item']->value['attachments']['CarouselBg'][0]) {?>
						<div data-b="0" data-p="170.00" data-po="80% 55%" style="display: none;" <?php if ($_smarty_tpl->tpl_vars['idx']->value != 0) {?> class="sl" <?php }?>>
							<?php if ($_smarty_tpl->tpl_vars['_item']->value['link']) {?><a href="<?php echo $_smarty_tpl->tpl_vars['_item']->value['link'];?>
"><?php }?>
								<img data-u="image"
									data-src2="<?php echo $_smarty_tpl->tpl_vars['stockPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['attachments']['CarouselBg'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['attachments']['CarouselBg'][0]['filename'];?>
"
									alt="<?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
" />
								<?php if ($_smarty_tpl->tpl_vars['_item']->value['text1'] || $_smarty_tpl->tpl_vars['_item']->value['text2'] || $_smarty_tpl->tpl_vars['_item']->value['text3']) {?>
									<div class="box">
										<?php if ($_smarty_tpl->tpl_vars['_item']->value['text1']) {?><div data-u="caption" data-t="0" class="subbox1">
												<strong<?php if ($_smarty_tpl->tpl_vars['_item']->value['extra_data']['text1_bg'] || $_smarty_tpl->tpl_vars['_item']->value['extra_data']['text1_opacity']) {?>
													class="slideText1_<?php echo $_smarty_tpl->tpl_vars['_item']->value['id'];?>
" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_item']->value['text1'];?>
</strong>
										</div><?php }?>
										<?php if ($_smarty_tpl->tpl_vars['_item']->value['text2']) {?><div data-u="caption" data-t="1" class="subbox2">
												<span<?php if ($_smarty_tpl->tpl_vars['_item']->value['extra_data']['text2_bg'] || $_smarty_tpl->tpl_vars['_item']->value['extra_data']['text2_opacity']) {?>
													class="slideText2_<?php echo $_smarty_tpl->tpl_vars['_item']->value['id'];?>
" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_item']->value['text2'];?>
</span>
										</div><?php }?>
										<?php if ($_smarty_tpl->tpl_vars['_item']->value['text3']) {?><div data-u="caption" data-t="2" class="subbox3">
												<span<?php if ($_smarty_tpl->tpl_vars['_item']->value['extra_data']['text3_bg'] || $_smarty_tpl->tpl_vars['_item']->value['extra_data']['text3_opacity']) {?>
													class="slideText3_<?php echo $_smarty_tpl->tpl_vars['_item']->value['id'];?>
" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_item']->value['text3'];?>
</span>
										</div><?php }?>
									</div>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['_item']->value['attachments']['CarouselImage'][0]) {?>
									<div class="img" data-u="caption" data-t="3">
										<div
											style="width: <?php echo $_smarty_tpl->tpl_vars['_item']->value['attachments']['CarouselImage'][0]['props']['image_size']['width'];?>
px; height: <?php echo $_smarty_tpl->tpl_vars['_item']->value['attachments']['CarouselImage'][0]['props']['image_size']['height'];?>
px;">
											<img src="<?php echo $_smarty_tpl->tpl_vars['stockPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['attachments']['CarouselImage'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['attachments']['CarouselImage'][0]['filename'];?>
"
												alt="<?php echo $_smarty_tpl->tpl_vars['_item']->value['title'];?>
"
												width="<?php echo $_smarty_tpl->tpl_vars['_item']->value['attachments']['CarouselImage'][0]['props']['image_size']['width'];?>
"
												height="<?php echo $_smarty_tpl->tpl_vars['_item']->value['attachments']['CarouselImage'][0]['props']['image_size']['height'];?>
" />
										</div>
									</div>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['_item']->value['link']) {?>
							</a><?php }?>
						</div>
						<p class="hidden" id="arrowHelper_<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
"></p>
						<?php if ($_smarty_tpl->tpl_vars['idx']->value == 1) {?>
							<?php $_smarty_tpl->_assignInScope('next', $_smarty_tpl->tpl_vars['_item']->value['name']);?>
						<?php }?>
						<?php $_smarty_tpl->_assignInScope('idx', $_smarty_tpl->tpl_vars['idx']->value+1);?>
						<?php $_smarty_tpl->_assignInScope('prev', $_smarty_tpl->tpl_vars['_item']->value['name']);?>
					<?php }?>
				<?php
$_smarty_tpl->tpl_vars['_item'] = $__foreach__item_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
			<span id="arrowLeft" data-u="arrowleft" class="jssor_l" data-noscale="1" data-autocenter="2"><span
					class="icon"></span>
				<h4><?php echo $_smarty_tpl->tpl_vars['prev']->value;?>
</h4>
			</span>
			<span id="arrowRight" data-u="arrowright" class="jssor_r" data-noscale="1" data-autocenter="2"><span
					class="icon"></span>
				<h4><?php echo $_smarty_tpl->tpl_vars['next']->value;?>
</h4>
			</span>
		</div>
	</div>
<?php }?>
<div>
	<section class="sneakPeak">
		<h1>Projekty domów <small>tworzymy z pasją</small></h1>
		<p>Jesteśmy autorską pracownią projektową z <strong>30 letnim</strong> stażem. To tylko dowodzi, że projekty
			domów jakie dotąd stworzyliśmy, cechują się wyjątkową jakością i starannością wykonania, co przez te lata
			zostało przez Państwa wielokrotnie docenione.
			Stanowią one dzisiaj bogate źródło doświadczeń i inspiracji do kolejnych wyzwań, które staramy się
			nieustannie podejmować w naszej pracy nad tworzeniem nowoczesnych projektów.
			Każdy nasz projekt domu to efekt pracy w przekonaniu, że jeśli robi się coś z pasją i z prawdziwym
			zaangażowaniem, to wynik musi być po prostu
			najlepszy. O wysoki poziom tworzonej przez nas dokumentacji projektowej dbamy szczególnie starannie, a
			owocem tych starań jest wspomniane już zadowolenie i uznanie
			inwestorów oraz wykonawców. Domy wybudowane według naszych projektów znaleźć można na terenie całego kraju,
			ale również za granicą.
			Nasze doświadczenie w projektowaniu to obecnie <strong>ponad 1400</strong> stworzonych projektów
			powtarzalnych. Na swoim koncie mamy także projekty tworzone na indywidualne zapotrzebowanie inwestorów.
			Ofertę naszego biura wzgobacają projekty garaży, altan, wiat i budynków usługowych
			oraz projekty wnętrz, z których wiele prezentujemy na łamach publikacji wydawniczych. "Domy w Tradycji" to
			katalog z gotowymi projektami domów, który regularnie ukazuje się na rynku już kilkanaście lat.
			Jeśli szukasz swojego wymarzonego projektu - u nas znajdziesz go z pewnością, a nasza profesjonalna, od lat
			pracująca w branży projektowo-budowlanej ekipa doradców z dużym doświadczeniem, chętnie Ci w tym pomoże! <a
				href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'varia','action'=>'project_helper'),$_smarty_tpl ) );?>
">Znajdziemy dla Ciebie projekt &raquo;</a></p>
	</section>
</div>
<div class="container">
	<section>
		<div class="grid">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['boxes']->value, '_item', false, '_key', 'bbb', array (
  'first' => true,
  'index' => true,
));
$_smarty_tpl->tpl_vars['_item']->iteration = 0;
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_key']->value => $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
$_smarty_tpl->tpl_vars['_item']->iteration++;
$_smarty_tpl->tpl_vars['__smarty_foreach_bbb']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_bbb']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_bbb']->value['index'];
$__foreach__item_1_saved = $_smarty_tpl->tpl_vars['_item'];
?>
				<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_bbb']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_bbb']->value['first'] : null)) {?>
					<figure class="effect-sadie">
						<img class="lazy-image"
							data-uri="<?php echo $_smarty_tpl->tpl_vars['stockPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['attachments']['BoxBg'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['attachments']['BoxBg'][0]['filename'];?>
"
							src="img/xc.png" width="480" height="480" alt="<?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
">
						<span class="close-sadie"></span>
						<figcaption>
							<a class="full" style="margin-top: 0; height: 50%; z-index: 5000;"
								href="/projekty-domow/najlepsze-male-domy-parterowe/">Projekty małych domów parterowych</a>
							<a class="full" style="margin-top: 50%; height: 50%;"
								href="/projekty-domow/najlepsze-male-domy-z-poddaszem/">Projekty małych domów z poddaszem
								użytkowym</a>
						</figcaption>
					</figure>
									<?php } else { ?>
					<?php if (!$_smarty_tpl->tpl_vars['_item']->value['bg_color']) {?>
						<figure class="effect-sadie">
							<img class="lazy-image"
								data-uri="<?php echo $_smarty_tpl->tpl_vars['stockPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['attachments']['BoxBg'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['attachments']['BoxBg'][0]['filename'];?>
"
								src="img/xc.png" width="480" height="480" alt="<?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
">
							<?php if ($_smarty_tpl->tpl_vars['_item']->value['name']) {?><div class="mobile-sadie" 
								<?php if ($_smarty_tpl->tpl_vars['_item']->value['id'] == 37 || $_smarty_tpl->tpl_vars['_item']->value['id'] == 21) {?>
									style="background-color: rgba(255,0,0,0.75);" <?php }?>><span><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</span></div>
							<?php }?>
							<span class="close-sadie"></span>

							<figcaption>
								<a class="full" href="<?php echo $_smarty_tpl->tpl_vars['_item']->value['link'];?>
">
									<?php if ($_smarty_tpl->tpl_vars['_item']->value['subtitle']) {?>
										<?php echo $_smarty_tpl->tpl_vars['_item']->value['subtitle'];?>

									<?php } else { ?>
										<h6><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</h6>
									<?php }?>
								</a>
								<?php if ($_smarty_tpl->tpl_vars['_item']->value['description']) {?>
									<p><?php echo $_smarty_tpl->tpl_vars['_item']->value['description'];?>
</p>
								<?php }?>
								<a class="framed" href="<?php echo $_smarty_tpl->tpl_vars['_item']->value['link'];?>
">
									<span>Zobacz
										wszystkie<?php if ($_smarty_tpl->tpl_vars['_item']->value['project_category_id'] && $_smarty_tpl->tpl_vars['siteMenuStats']->value[$_smarty_tpl->tpl_vars['_item']->value['project_category_id']]) {?>
										<?php echo $_smarty_tpl->tpl_vars['siteMenuStats']->value[$_smarty_tpl->tpl_vars['_item']->value['project_category_id']];
}?></span>
								</a>
							</figcaption>
						</figure>
					<?php } else { ?>
						<figure class="<?php echo ('off mainPageBox_').($_smarty_tpl->tpl_vars['_key']->value);?>
">
							<img src="img/dummy_tile.png" width="480" height="480" alt="box">

							<?php if ($_smarty_tpl->tpl_vars['_item']->value['type'] == 'articles' || $_smarty_tpl->tpl_vars['_item']->value['type'] == 'comments') {?>
								<h6><a href="<?php echo $_smarty_tpl->tpl_vars['_item']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</a></h6>
							<?php } else { ?>
								<h6><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</h6>
							<?php }?>
							<div>
								<img class="lazy-image"
									data-uri="<?php echo $_smarty_tpl->tpl_vars['stockPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['attachments']['BoxImage'][0]['path'];?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['attachments']['BoxImage'][0]['filename'];?>
"
									src="img/xc.png" alt="<?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
" width="1" height="1">

								<?php if ($_smarty_tpl->tpl_vars['_item']->value['description']) {?>
									<p><?php echo $_smarty_tpl->tpl_vars['_item']->value['description'];?>
</p>
								<?php }?>

								<?php if ($_smarty_tpl->tpl_vars['_item']->value['type'] == 'comments') {?>
									<div class="flexslider">
										<ul class="slides">
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_item']->value['content'], 'comment');
$_smarty_tpl->tpl_vars['comment']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->do_else = false;
?>

												<?php if ($_smarty_tpl->tpl_vars['comment']->value['parent_id']) {?>
													<?php $_smarty_tpl->_assignInScope('threadId', $_smarty_tpl->tpl_vars['comment']->value['parent_id']);?>
													<?php $_smarty_tpl->_assignInScope('topic', $_smarty_tpl->tpl_vars['comment']->value['parent']['topic']);?>
												<?php } else { ?>
													<?php $_smarty_tpl->_assignInScope('threadId', $_smarty_tpl->tpl_vars['comment']->value['id']);?>
													<?php $_smarty_tpl->_assignInScope('topic', $_smarty_tpl->tpl_vars['comment']->value['topic']);?>
												<?php }?>
												<li>
													<p class="comment-title"><a
															href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'thread','id'=>$_smarty_tpl->tpl_vars['threadId']->value),$_smarty_tpl ) );?>
"><?php echo smarty_modifier_truncate(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strip_tags' ][ 0 ], array( $_smarty_tpl->tpl_vars['topic']->value )),24);?>

															| <?php echo $_smarty_tpl->tpl_vars['comment']->value['nick'];?>
</a></p>
													<p><a
															href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'discuss','action'=>'thread','id'=>$_smarty_tpl->tpl_vars['threadId']->value),$_smarty_tpl ) );?>
"><?php echo smarty_modifier_truncate(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strip_tags' ][ 0 ], array( $_smarty_tpl->tpl_vars['comment']->value['content'] )),100);?>
</a>
													</p>
												</li>
											<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										</ul>
									</div>
								<?php } elseif ($_smarty_tpl->tpl_vars['_item']->value['type'] == 'articles') {?>
									<div class="flexslider">
										<ul class="slides">
											<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_item']->value['content'], 'article');
$_smarty_tpl->tpl_vars['article']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->do_else = false;
?>
												<li>
													<p class="title"><a
															href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'article','action'=>'item','docId'=>$_smarty_tpl->tpl_vars['article']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['article']->value['title']),$_smarty_tpl ) );?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</a>
													</p>
													<p><a
															href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'article','action'=>'item','docId'=>$_smarty_tpl->tpl_vars['article']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['article']->value['title']),$_smarty_tpl ) );?>
"><?php echo smarty_modifier_truncate(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'strip_tags' ][ 0 ], array( $_smarty_tpl->tpl_vars['article']->value['teaser'] )),100);?>

															<span>więcej &raquo;</span></a></p>
												</li>
											<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										</ul>
									</div>
								<?php } elseif ($_smarty_tpl->tpl_vars['_item']->value['link']) {?>
									<a class="full dis" href="<?php echo $_smarty_tpl->tpl_vars['_item']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['_item']->value['name'];?>
</a>
								<?php }?>
							</div>
						</figure>
					<?php }?>
				<?php }?>
			<?php
$_smarty_tpl->tpl_vars['_item'] = $__foreach__item_1_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>
	</section>
</div>
<section class="opinion">
	<a href="/projekty-domow/opinie" rel="nofollow">Opinie o projektach...<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			opinie o projektach...&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; opinie o projektach...</span></a>
</section>

<section class="atrium">
	<div>
		<p class="head">Projekt domu zobowiązuje. My spełniamy te zobowiązania</p>
		<p>Projekt domu to coś, co stawia przed projektantami konkretne wymagania. Musi być solidny, przejrzysty i po
			prostu znakomicie opracowany. Nasze gotowe rozwiązania to synonim kompetencji,
			ale i stylu oraz funkcjonalności. Inwestorzy i wykonawcy zawsze mogą liczyć na naszą pomoc i wsparcie na
			każdym etapie realizacji inwestycji, powstającej w oparciu o nasz projekt.</p>
		<p>Proponujemy rozwiązania, które w pełni sprawdzają się zarówno architektonicznie, jak i konstrukcyjnie, a
			przygotowywana przez nas dokumentacja
			to przede wszystkim rzetelność i sprawdzone pomysły na wyjątkowe domy.</p>
		<p>Projekty domów kreślone w naszej pracowni spełniają oczekiwania nawet najbardziej wymagających
			Klientów. Cenimy tradycję i sprawdzone rozwiązania, jednak pilnie śledzimy najnowsze architektoniczne i
			designerskie trendy.</p>
	</div>
	<div>
		<p>W rezultacie powstają projekty domów, które urzeczywistniają marzenia o pięknym, własnym domu. Tworzymy domy
			dla rodzin. A to zobowiązuje. Z pewnością każdy dom, jaki powstaje w oparciu o nasz projekt spełnia te
			zobowiązania.</p>
		<p>&nbsp;</p>
		<p class="head">Szukasz projektu domu? Tutaj go znajdziesz!</p>
		<p>Domy i ich projektowanie to nasza pasja. Wśród naszych propozycji znajdziesz projekty odpowiadające
			zróznicowanym potrzebom i indywidualnym wymaganiom,
			na przykład w zakresie usytuowania działki, czy możliwości finansowych inwestora. Jeśli szukasz ciekawego,
			stylowego i funkcjonalnego projektu, w naszej pracowni z pewnością go znajdziesz. Z nami zbudujesz dom, o
			jakim marzyłeś.</p>
	</div>
</section>

<?php if ($_smarty_tpl->tpl_vars['featured']->value) {?>
	<div class="container" id="project-list">
		<section class="featured">
			<div class="list-grid fav-wrapper" id="overlay-group">

				<h2><a href="/projekty-domow/">Polecane projekty</a></h2>

				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['featured']->value, '_project');
$_smarty_tpl->tpl_vars['_project']->index = -1;
$_smarty_tpl->tpl_vars['_project']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_project']->value) {
$_smarty_tpl->tpl_vars['_project']->do_else = false;
$_smarty_tpl->tpl_vars['_project']->index++;
$__foreach__project_4_saved = $_smarty_tpl->tpl_vars['_project'];
?>
					<div>
						<figure>
							<img class="lazy-image" data-uri="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'box'),$_smarty_tpl ) );?>
" src="img/xc.png"
								alt="Projekt domu <?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
" width="640" height="427">

							<figcaption>
								<a
									href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['_project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl ) );?>
">
									<span>projekt domu
										<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hasFloor' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'],true ))) {?>piętrowego
										<?php } elseif (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hasLoft' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'],true ))) {?>z
											poddaszem<?php } elseif (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'isGroundFloor' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'],true ))) {?>parterowego<?php }
if ($_smarty_tpl->tpl_vars['isLocal']->value) {?>
										<?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_alpha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_project']->value['symbol_num'];
}?></span>
									<strong><?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
 <span><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'usableArea' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'] ));?>

											m<sup>2</sup></span></strong>
								</a>
							</figcaption>
						</figure>

						<span class="overview" data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" data-idx="<?php echo $_smarty_tpl->tpl_vars['_project']->index;?>
"
							data-img="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'render','project'=>$_smarty_tpl->tpl_vars['_project']->value,'size'=>'presentation'),$_smarty_tpl ) );?>
"
							data-ground="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value),$_smarty_tpl ) );?>
" <?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hasFloor' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'],true ))) {?>
								data-floor="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value,'storey'=>'1st_floor'),$_smarty_tpl ) );?>
"
								<?php }
if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hasLoft' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'],true ))) {?>
							data-loft="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['image'][0], array( array('type'=>'sketch','project'=>$_smarty_tpl->tpl_vars['_project']->value,'storey'=>'loft'),$_smarty_tpl ) );?>
" <?php }?>
							data-link="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['_project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl ) );?>
"
							data-price="<?php if ($_smarty_tpl->tpl_vars['_project']->value['price']) {
if ($_smarty_tpl->tpl_vars['_project']->value['discount']) {?><strike><?php echo $_smarty_tpl->tpl_vars['_project']->value['price'];?>
</strike> <?php echo $_smarty_tpl->tpl_vars['_project']->value['price']-$_smarty_tpl->tpl_vars['_project']->value['discount'];
} else {
echo $_smarty_tpl->tpl_vars['_project']->value['price'];
}
} else { ?>-<?php }?>"
							data-name="<?php echo $_smarty_tpl->tpl_vars['_project']->value['name'];?>
" data-area="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'usableArea' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'] ));?>
"
							data-parcel="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'parcelWidth' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'] ));?>
 x <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'parcelHeight' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'] ));?>
"
							data-height="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'houseHeight' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'] ));?>
"
							data-angle="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'roofAngle' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'] ));?>
"
							data-version="<?php if ($_smarty_tpl->tpl_vars['_project']->value['type'] == 'skeleton') {?>wersja szkieletowa<?php } else { ?>wersja murowana<?php }?>"
							data-rooms="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'roomCount' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value['params_general'] ));?>
" data-txt="<?php echo $_smarty_tpl->tpl_vars['_project']->value['short_description'];?>
"></span>
						<span id="compare-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" class="compare<?php if (in_array($_smarty_tpl->tpl_vars['_project']->value['id'],$_smarty_tpl->tpl_vars['compareIds']->value)) {?> on<?php }?>"
							data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span>
						<span id="fav-<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
" class="fav<?php if (in_array($_smarty_tpl->tpl_vars['_project']->value['id'],$_smarty_tpl->tpl_vars['favouriteIds']->value)) {?> on<?php }?>"
							data-id="<?php echo $_smarty_tpl->tpl_vars['_project']->value['id'];?>
"></span>

						<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'isNew' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value )) || $_smarty_tpl->tpl_vars['_project']->value['discount']) {?>
							<div>
								<?php if ($_smarty_tpl->tpl_vars['_project']->value['discount']) {?><span class="discount">rabat
										<?php echo $_smarty_tpl->tpl_vars['_project']->value['discount'];?>
</span><?php }
if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'isNew' ][ 0 ], array( $_smarty_tpl->tpl_vars['_project']->value ))) {?><span class="new">nowość</span><?php }?>
								</div>
							<?php }?>
						</div>
					<?php
$_smarty_tpl->tpl_vars['_project'] = $__foreach__project_4_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</div>
			</section>
		</div>
	<?php }?>


<section class="more-info">
	<div class="box center">
		<h3>Wszystkie projekty domów</h3>
		<div>
			<p>Z przyjemnością prezentujemy Państwu gotowe projekty domów. Przygotowali je doświadczeni specjaliści,
				którzy tworzą personel naszej firmy. W ofercie znajdą Państwo między innymi <a
					href="/projekty-domow/blizniaki/" style="color: #cc1000;">projekty domów bliźniaczych</a>, <a
					href="/projekty-domow/nowoczesne/" style="color: #cc1000;">projekty domów nowoczesnych</a>, <a
					href="/projekty-domow/na-waska-dzialke/">na wąską działkę</a>, parterowych i piętrowych. Polecamy
				także <a href="/projekty-domow/tanie-w-budowie/" style="color: #cc1000;">domy tanie w budowie</a> oraz
				<a href="/projekty-domow/z-plaskim-dachem/" style="color: #cc1000;">z płaskim dachem</a>. Wszystkie
				dostosowane są do polskich warunków budowlanych. Udostępniamy także wzory małych obiektów, ponieważ
				wiemy jak ważna jest obecnie oszczędność i funkcjonalność. Posiadamy wieloletnie doświadczenie we
				współpracy z inwestorami budującymi tego typu obiekty, propozycje zostały więc opracowane na podstawie
				wytycznych ekspertów. Projekty domów gotowych do realizacji to wygodne i praktyczne rozwiązanie,
				szczególnie dla osób, które nie zetknęły się wcześniej z tą branżą. Mogą w ten sposób nabyć wzór, który
				jest uniwersalny i sprawdzony w praktyce. Mamy świadomość tego, iż wybór odpowiedniej propozycji to
				poważna decyzja, dlatego chętnie służymy Państwu radą. Wszystkie nasze <a href="/projekty-domow/"
					style="color: #cc1000;">projekty domów jednorodzinnych</a> zostały zaprojektowane z uwzględnieniem
				najnowszych norm i trendów. Jesteśmy przekonani, że spełnimy Państwa oczekiwania.
			</p>
			<h3>Najpopularniejsze typy domów</h3>
			<h4>Domy parterowe</h4>
			<p>Niniejsza kategoria obejmuje projekty jednokondygnacyjne, bardzo popularne wśród inwestorów. Zaletą
				takiego rozwiązania jest umieszczenie stref mieszkalnych, dziennej i nocnej, na jednym poziomie -
				parterze, bez konieczności budowania schodów i stropu. Warto także podkreślić bezpośredni kontakt z
				otaczającą budynek zielenią, dostępną niemal "za ścianą". Małe <a href="/projekty-domow/parterowe/"
					style="color: #cc1000;">projekty domów parterowych</a> należą do najbardziej ekonomicznych
				propozycji na rynku. Koszt budowy jak i ich użytkowania zaliczyć można do najniższych. Rozległe
				rezydencje parterowe natomiast, najbardziej przypominają nowoczesne siedliska. W naszej ofercie projekty
				domów parterowych traktowane są wyjątkowo - bez trudu znajdą tutaj Państwo coś dla siebie. Od
				niewielkich parterówek, mogących z powodzeniem pełnić funkcję domu weekendowego, po atrakcyjne wizualnie
				okazałe domy parterowe z wyszukaną bryłą. Dla wszystkich miłośników bezpośredniego kontaktu z naturą
				polecamy domy parterowe.</p>
			<h4>Domy z poddaszem</h4>
			<p>W tej sekcji zaprezentowano projekty domów parterowych z poddaszem. Grupa tych konceptów zalicza się do
				najbardziej popularnych na rynku i co za tym idzie, najliczniejszej. Ich bryła może przybrać bardzo
				różnorodne kształty. Od typowych, prostych konstrukcji, przykrytych dwuspadowym dachem, po bardziej
				finezyjne bryły ozdobione licznymi detalami architektonicznymi i bazujące na nowoczesnych trendach.
				Przygotowane przez nas budynki to wspaniała propozycja dla typowych rodzin 2+2 i 2+3. Ich funkcjonalność
				została specjalnie zaprojektowana dla wygody kilku użytkowników, którzy spędzają czas w swoim domu. <a
					href="/projekty-domow/z-poddaszem-uzytkowym/" style="color: #cc1000;">Gotowe projekty domów z
					poddaszem użytkowym</a> stanowią w naszej ofercie najliczniejszą grupę koncepcji, które wcielamy w
				życie. <a href="/artykuly/Dodatki-do-projektu-domu,1364.html" style="color: #cc1000;">Zobacz dodatki</a>
			</p>
			<h2 style="font-size:3rem; line-height: 1.2em; text-transform: uppercase; margin: 30px 0;">Projekty domów
				jednorodzinnych Studio Atrium</h2>
			<p>Dom to strefa komfortu, w której domownicy powinni czuć się swobodnie i naturalnie. Aby sprostać temu
				wyzwaniu, konieczny jest wybór odpowiedniego projektu domu, tak aby spełniał on wszelkie oczekiwania
				potencjalnych mieszkańców. Studio Atrium oferuje gotowe projekty domów jednorodzinnych w różnych
				stylach, jednak nasz zespół uwzględnia również indywidualne zamówienia i dokładniejszą personalizację
				przestrzeni bryły. Wyjątkowe projekty domów Studio Atrium oferują różne rozwiązania, takie jak unikalne
				projekty domów parterowych, które zapewniają wygodę użytkowania i brak schodów oraz piętrowe z
				poddaszem. Pozwalają one wykorzystać mniejsze działki zapewniając przestrzeń dla mieszkańców. W
				projektach nie brakuje rozwiązań energooszczędnych, a funkcjonalny układ przestrzeni uwzględniający
				podział na strefę dzienną i nocną stanowi praktyczne rozwiązanie organizacji powierzchni. A jaki projekt
				interesuje Ciebie? </p>
			<h2 style="font-size:3rem; line-height: 1.2em; text-transform: uppercase; margin: 30px 0;">Dlaczego warto
				zdecydować się na projekty domów Studio Atrium</h2>
			<p>Nasza firma działa na polskim rynku od 1994 roku. Oznacza to, że posiadamy ponad 30 lat doświadczenia w
				projektowaniu domów jednorodzinnych i innych obiektów. W tym czasie zrealizowaliśmy liczne projekty i
				zdobyliśmy uznanie wśród klientów za innowacyjne oraz funkcjonalne podejście do architektury. Studio
				Atrium cieszy się bardzo dobrą opinią wśród klientów. Nasi klienci w recenzjach często podkreślają
				wysoką jakość obsługi, solidność projektów, oraz indywidualne podejście do potrzeb inwestorów. Ponadto
				jako firma zdobyliśmy uznanie w branży, m.in. poprzez wyróżnienia takie jak Konsumencki Lider Jakości,
				co świadczy o dbałości o klienta. Jeżeli nadal masz wątpliwości, już dziś <a
					href="https://www.studioatrium.pl/kontakt/" style="color: #cc1000;">skontaktuj się z naszym
					konsultantem</a> lub odwiedź naszą siedzibę mieszczącą się w Bielsku-Białej przy ulicy J.
				Malczewskiego 1. Jesteśmy otwarci dla Ciebie od poniedziałku do piątku w godzinach od 8:00 do 17:00.
				Skontaktuj się z nami i poznaj przyjemność pracy ze specjalistami!</p>
			<h2 style="font-size:3rem; line-height: 1.2em; text-transform: uppercase; margin: 30px 0;">Zrealizowany
				projekt budynku Studio Atrium - recepta na dom, który urzeczywistnia marzenia</h2>
			<p>Jesteśmy przekonani, że w Studio Atrium liczne projekty oraz nasi specjaliści sprawią, że zamieszkasz w
				domu, którego bryła będzie spójna z wymaganiami mieszkańców. Zapewne każdy Inwestor chce mieszkać w
				domu, którego wnętrze dostosowane będzie do jego potrzeb. Bogaty katalog projektów domów jednorodzinnych
				zawiera różnorakie układy funkcjonalne oraz aranżacje brył, tak aby finalnie wykreować dom marzeń spójny
				z gustem mieszkańców. </p>
			<h2 style="font-size:3rem; line-height: 1.2em; text-transform: uppercase; margin: 30px 0;">Warto zobaczyć
				wszystkie projekty domów Studio Atrium</h2>
			<p>Wszystkie oferty projektów gotowych domów oferowanych przez Studio Atrium zapewniają szeroki wybór,
				pozwalający wybrać idealne rozwiązanie dopasowane do spersonalizowanych oczekiwań. Nasza oferta zawiera
				kolekcję projektów z powiewem nowoczesnego designu, co więcej, dostarczają funkcjonalne układy
				przestrzenne oraz energooszczędne rozwiązania. Zapoznaj się z ofertą gotowych projektów domów Studio
				Atrium i wybierz ten jedyny wśród pozycji projektowych. Projekty domów tworzone przez naszych
				specjalistów są pełne kreatywności oraz licznych funkcjonalnych rozwiązań. </p>
			<h2 style="font-size:3rem; line-height: 1.2em; text-transform: uppercase; margin: 30px 0;">Gotowy projekt
				domu Studio Atrium i jego adaptacja</h2>
			<p>Zespół architektów i specjalistów Studia Atrium z pełną świadomością podchodzi do spersonalizowanych
				potrzeb klienta. Oferujemy gotowe projekty domów - jeśli jest taka konieczność to możemy je dostosować
				do indywidualnych potrzeb (wyceniamy wówczas koszt zmian w projekcie oraz ustalamy termin wykonania tych
				przeróbek). Dokładając wszelkich starań, służymy pomocą w taki sposób, aby podczas wyboru projektu domu
				jednorodzinnego inwestor mógł orientacyjnie oszacować koszt budowy. Można również zamówić u nas
				szczegółowy kosztorys w cenie 750zł.</p>
			<h2 style="font-size:3rem; line-height: 1.2em; text-transform: uppercase; margin: 30px 0;">Nasi specjaliści
				opracowali wyróżniające się projekty architektoniczno-budowlane</h2>
			<p>Projekty domów są rezultatem pracy grupy specjalistów, w której skład wchodzą eksperci z różnych
				dziedzin: architektury, budownictwa, instalacji elektrycznych oraz wodnokanalizacyjnych, a także osoby
				zajmujące się kosztorysowaniem. Szczegółowo przygotowana dokumentacja techniczna i budowlana sprawia, że
				realizacja projektów przebiega bezproblemowo, zapewniając późniejszym mieszkańcom wysoki poziom wygody.
				Projekty Studia Atrium są tworzone z myślą o funkcjonalności i ergonomii, tak aby w przyszłości
				wszystkie kwestie związane z budową domu finalnie zapewniły mieszkańcom optymalne rozmieszczenie
				pomieszczeń oraz odpowiednie wykorzystanie przestrzeni.</p>
			<p>Nasze projekty domów powstają z uwzględnieniem efektywności energetycznej, ponieważ dobre projekty domów
				wyróżniają się zastosowaniem technologii i materiałów pozwalających na oszczędność energii, takich jak
				wysokiej jakości izolacja termiczna, czy też nowoczesne systemy grzewcze. Aby projekty domów wyróżniały
				się na rynku, nasi specjaliści zadbali również o estetykę i zgodność z otoczeniem. Dom powinien być
				zgodny zarówno z oczekiwaniami właścicieli, jak i z lokalnym krajobrazem i jego architekturą.</p>
			<h2 style="font-size:3rem; line-height: 1.2em; text-transform: uppercase; margin: 30px 0;">Autorskie
				projekty domów na Facebooku, Instagramie, YouTube i innych mediach społecznościowych</h2>
			<p>Odkryj wyjątkowy świat autorskich projektów Studia Atrium! Jesteśmy dla Ciebie w mediach
				społecznościowych, gdzie na bieżąco dzielimy się inspiracjami, nowościami, i ciekawostkami z zakresu
				projektowania domów. Odwiedź nasz profil na Facebooku, aby śledzić aktualności, promocje i opinie
				klientów. Na naszym kanale YouTube znajdziesz wideo prezentacje projektów, które pozwolą Ci lepiej
				wyobrazić sobie Twój przyszły dom. Na Pintereście czekają na Ciebie piękne zdjęcia naszych realizacji,
				które zainspirują Cię do stworzenia przestrzeni marzeń. Nasze social media prezentują wiele ciekawych
				możliwości, takich jak projekty domów w zabudowie bliźniaczej lub projekty domów z antresolą i wiele
				innych. Dołącz do naszej społeczności, obserwuj nas na ulubionych platformach i przekonaj się, jak wiele
				możemy zaoferować! Twój wymarzony dom zaczyna się od pierwszego kliknięcia. </p>
			<h2 style="font-size:3rem; line-height: 1.2em; text-transform: uppercase; margin: 30px 0;">Odwiedź nasze
				forum dyskusyjne</h2>
			<p>Nasza strona internetowa zawiera zakładkę <a href="https://www.studioatrium.pl/forum/"
					style="color: #cc1000;">forum</a> dyskusyjnego, gdzie osoby zainteresowane nabyciem projektu
				architektonicznego wymieniają się swoimi poglądami oraz przemyśleniami w tej dziedzinie. To świetna
				okazja, by wymienić się doświadczeniami; co więcej, w dyskusjach poruszanych na forum biorą udział nasi
				eksperci, którzy otwarcie dzielą się swoim doświadczeniem. Forum na stronie internetowej Studio Atrium
				to miejsce przeznaczone do zbierania nowych informacji, wymiany poglądów oraz czerpania inspiracji.
				Odwiedzenie naszego forum nic nie kosztuje, a może okazać się cennym źródłem porad. Jeśli nurtuje Cię
				kwestia związana ze zgłoszeniem budowy, zakupem projektu, lub jego realizacją, nie zwlekaj i zabierz
				głos!</p>
			<h2 style="font-size:3rem; line-height: 1.2em; text-transform: uppercase; margin: 30px 0;">Taras - a gotowy
				projekt domu</h2>
			<p>Taras to przestrzeń na działce, która łączy mieszkalną strefę użytkową domu z jego ogrodem. To miejsce,
				które jest bardzo często użytkowane przez mieszkańców, szczególnie w sezonie letnim. Wielu Inwestorów w
				początkowym stadium poszukiwań odpowiedniego projektu domu nie myśli o budowie tarasu, ponieważ skupia
				się na innych aspektach, które na tamten moment wydają się bardziej istotne. Warto pamiętać, że taras,
				podobnie do salonu, może pełnić integralną funkcję dla użytkowników domu. Imprezy okolicznościowe,
				spotkania ze znajomymi i rodziną na świeżym powietrzu to świetna alternatywa dla salonu w cieplejsze
				dni. Nasi fachowcy zaaranżowali rozmieszczenie tarasu w taki sposób, aby był on osiągalny bezpośrednio z
				poziomu strefy dziennej. Takie rozwiązanie zazwyczaj sprzyja instalacji przeszklonych drzwi okiennych,
				które oprócz pełnienia funkcji przejścia na zewnątrz, idealnie doświetlają strefę dzienną, tworząc
				przytulną atmosferę.</p>
			<h2 style="font-size:3rem; line-height: 1.2em; text-transform: uppercase; margin: 30px 0;">Pomieszczenia
				gospodarcze - spersonalizuj wnętrze wybierając projekt własnego domu</h2>
			<p>Pomieszczenie gospodarcze to przestrzeń poświęcona przechowywaniu rzeczy. Bardzo często w przypadku domów
				parterowych z garażem lub ogólnie jakichkolwiek domów, w których zabudowę wchodzi garaż, dzieje się tak,
				że to właśnie to miejsce stanowi magazyn w domu. Rzadko użytkowane przedmioty, narty, drabina, oraz masa
				pudeł wypełniają garaż po brzegi, uniemożliwiając jego użytkowanie. Aby temu zapobiec, nasi specjaliści
				podczas tworzenia projektów uwzględniają pomieszczenia gospodarcze, umożliwiające lepszą organizację
				domu. Spiżarnia niedaleko kuchni, garderoba blisko sypialni, a może dom z poddaszem? Klienci bardzo
				często decydują się na uwzględnienie w projekcie pomieszczenia gospodarczego obok garażu. Takie i wiele
				innych rozwiązań czeka na Ciebie na stronie Studio Atrium. </p>
			<h2 style="font-size:3rem; line-height: 1.2em; text-transform: uppercase; margin: 30px 0;">Nowoczesne
				projekty domów czyli podążanie za trendami w architekturze</h2>
			<p>Podążanie z trendami i biegłość w aktualnych zastosowaniach w architekturze oraz w budownictwie to
				elementy, na które nasz zespół kładzie nacisk. Nasi specjaliści regularnie szkolą się oraz obserwują
				zmieniający się rynek budowlany, tak aby oferowane projekty były jak najbardziej aktualne i spełniały
				wszelkie oczekiwania naszych klientów. Trendy w zakresie budownictwa to nieodłączny element naszej
				pracy!</p>
			<h2 style="font-size:3rem; line-height: 1.2em; text-transform: uppercase; margin: 30px 0;">Jak kupić projekt
				domu Studio Atrium?</h2>
			<p>Zakup projektu domu w Studio Atrium to przejrzysty i łatwy proces, który składa się z kilku etapów. Aby
				wybrać idealny projekt domu, warto zapoznać się z ofertą projektów znajdujących się na naszej stronie
				internetowej, jeśli jednak wolą Państwo zrobić to stacjonarnie, nasi konsultanci służą pomocą w
				siedzibie naszej firmy (adres siedziby znajduje się na naszej stronie internetowej, w zakładce kontakt).
				Prosimy jednak o wcześniejsze umówienie takiej wizyty. Jeśli określą Państwo preferowany układ domu oraz
				wszelkie preferencje w zakresie organizacji przestrzeni budynku, zapraszamy do konsultacji z naszymi
				ekspertami. To oni udzielą wszelkich niezbędnych informacji oraz doradzą w razie wystąpienia
				wątpliwości, co do adaptacją wybranego projektu na Twojej działce. Konsultacje można przeprowadzić
				telefonicznie, mailowo oraz stacjonarnie z naszymi specjalistami w siedzibie Studio Atrium. Po złożeniu
				zamówienia pozostaje dostawa projektu. To zadanie należy do naszej firmy i jest bezpłatne.</p>
			<h2 style="font-size:3rem; line-height: 1.2em; text-transform: uppercase; margin: 30px 0;">Jak działa
				wyszukiwarka domów online </h2>
			<p>Na naszej stronie internetowej polecamy projekty o różnorodnym zastosowaniu oraz zagospodarowaniu, jednak
				do Inwestora należy określenie, jaki projekt domu jest najbardziej adekwatny do jego oczekiwań. Bardzo
				często okazuje się, że poszukiwania najlepszego projektu zajmują więcej czasu aniżeli potencjalny
				nabywca przewidział. Z pomocą przychodzi wyszukiwarka domów online. Urządzenie znajduje się na naszej
				stronie internetowej Studio Atrium i znacząco pomaga zawęzić pole zainteresowań odpowiedniego projektu
				domu. Nasza wyszukiwarka została zaprojektowana w taki sposób, aby poprzez zadawanie pytań i dokonywanie
				filtracji można było wyeliminować projekty niestanowiące obiektu zainteresowania klienta. W ten sposób
				zainteresowani mają okazję określić swoje oczekiwania oraz spośród różnych projektów, takich jak domy
				tanie w budowie, projekt domu bez pozwolenia czy domy o powierzchni do 200 m² i wielu innych, wybrać
				konkretny, spełniający wszelkie oczekiwania Inwestora.</p>
			<h2 style="font-size:3rem; line-height: 1.2em; text-transform: uppercase; margin: 30px 0;">Nasz katalog
				projektów domów - co w nim znajdziesz?</h2>
			<p>Katalog projektów to narzędzie przydatne dla interesantów, chętnych pogłębić swoją wiedzę. <a
					href="https://www.studioatrium.pl/katalog-projektow.html" style="color: #cc1000;">Nasz darmowy
					katalog</a> prezentuje liczne propozycje projektów. Znajdziesz w nim projekty domów parterowych i
				piętrowych, projekty z przystosowaniem do różnych typów działek, projekty garaży wolnostojących oraz
				inne wyselekcjonowane projekty domów. Jeżeli chcesz zobaczyć więcej projektów oferowanych przez Studio
				Atrium, skontaktuj się z nami drogą mailową lub telefoniczną (adres e-mail oraz numer telefonu
				znajdziesz na naszej stronie internetowej w zakładce kontakt).</p>
			<h2 style="font-size:3rem; line-height: 1.2em; text-transform: uppercase; margin: 30px 0;">Projekty domów –
				jak wybrać najlepszy projekt domu?</h2>
			<p>Współcześni twórcy projektów domów oferują niezliczone możliwości oraz rodzaje projektów domów.
				Inwestorzy mogą wybierać projekty domów gotowych lub spersonalizować plany domów. Nowe projekty domów
				oferują ciekawe rozwiązania, innowacyjne metody zagospodarowania przestrzeni oraz układu bryły.</p>
			<p>Ostateczna decyzja należy jednak do Inwestora. Zanim nasz klient zdecyduje się na zakup projektu domu dla
				siebie, powinien odpowiedzieć na kilka znaczących w tym wątku pytań. Ważne jest, aby zdefiniować, czy
				wybrany projekt jest funkcjonalny i dostosowany do naszych potrzeb i stylu życia. Następną istotną
				kwestią jest odpowiedź na pytanie: ilu pomieszczeń potrzebuję i gdzie chcę je rozmieścić? Określenie
				układu i liczby pomieszczeń jest istotne, jeżeli chcemy, aby nasz dom w przyszłości był funkcjonalny. Na
				tym etapie dobrze jest zdecydować o ewentualnej aranżacji garażu, tarasu, lub innych dodatkowych
				zabudowań.</p>
			<p>Podejmując takie decyzje, należy wziąć pod uwagę zaplecze finansowe, którym dysponuje Inwestor, tak aby
				realizacja projektu mogła być zrealizowana w całości. Co ważne, sukcesywne wybieranie odpowiedniego
				projektu to również dopasowanie go do wymiarów działki oraz miejscowego planu zagospodarowania
				przestrzennego.</p>
			<h2 style="font-size:3rem; line-height: 1.2em; text-transform: uppercase; margin: 30px 0;">Co zawiera oferta
				Studio Atrium?</h2>
			<p>Oferta Studio Atrium jest bogata w różnego rodzaju projekty, tak by każdy Inwestor mógł wybrać wymarzony
				projekt. Oferujemy możliwość wyboru projektów domów standardowych, nowoczesnych, nietypowych oraz wielu
				innych kombinacji. Domy parterowe, energooszczędne, piętrowe, z garażami lub bez garażów to zaledwie
				niewielka część rozwiązań, które proponuje Studio Atrium. Oferujemy projekty domów, podchodząc do
				klienta indywidualnie, tak aby wybrany projekt jak najdobitniej odpowiadał jego potrzebom i
				preferencjom. Szeroki wybór projektów zapewnia klientowi możliwość wyboru energooszczędnych rozwiązań,
				które są tworzone z uwzględnieniem estetyki.</p>
			<p>W naszej ofercie znajdziesz projekty domów:</p>
			<p>• W zależności od typu (piętrowe, parterowe, z poddaszem, na skarpę, do 70 m)</p>
			<p>• W zależności od działki (na wąską działkę, domy z wjazdem od południa, na działkę ze spadkiem)</p>
			<p>• W zależności od docelowych mieszkańców (bliźniacze, dwulokalowe, domy dla deweloperów)</p>
			<p>• W zależności od wielkości (domy do 70 m, od 180 m itd.)</p>
			<p>• W zależności od funkcji (parterowe ze strychem, domy z dużą kotłownią, domy z kotłownią na paliwo
				stałe, z garażem 2-stanowiskowym lub wiatą, dla rodziny 2+2, dla rodziny 2+3, z otwartą przestrzenią i
				antresolą)</p>
			<p>• W zależności od stylu (nowoczesne, w stylu stodoły, regionalne beskidzkie, nowoczesne beskidzkie, z
				płaskim dachem, rezydencje dla zamożnych)</p>
			<h3 style="font-size:2.4rem;">Projekty domów piętrowych</h3>
			<p><a href="https://www.studioatrium.pl/projekty-domow/pietrowe/" style="color: #cc1000;">Projekty domów
					piętrowych</a> wyróżniają się świetnym zagospodarowaniem wnętrza, które z łatwością można podzielić
				na strefę dzienną, składającą się z kuchni, salonu i innych pomieszczeń integralnych oraz strefę nocną
				dedykowaną sypialniom, łazienkom i różnego rodzaju gabinetom domowym. Domy składające się z więcej niż
				jednej kondygnacji, najczęściej skupiają strefę dzienną na niższym piętrze (parter), natomiast strefę
				nocną na wyższym. Oprócz świetnego rozplanowania przestrzeni, domy piętrowe oferowane przez nasz zespół
				stanowią podstawę do ciekawej aranżacji bryły. Takie rozwiązanie świetnie sprawdza się w przypadku
				rodzin z dziećmi, łącząc estetykę i komfort w jednej bryle. Warto podkreślić, że domy piętrowe idealnie
				nadają się w przypadku mniejszej działki - takie rozwiązanie pozwala zaoszczędzić przestrzeń.</p>
			<h3 style="font-size:2.4rem;">Projekty domów parterowych</h3>
			<p><a href="https://www.studioatrium.pl/projekty-domow/parterowe/" style="color: #cc1000;">Projekty domów
					parterowych</a> stanowią idealne rozwiązanie dla klientów ceniących sobie wygodę, estetykę oraz
				funkcjonalność. Głównym atutem tego typu projektów jest brak schodów. Jedna kondygnacja, z której składa
				się cała bryła może okazać się idealnym rozwiązaniem dla rodzin z małymi dziećmi lub dla osób z
				niepełnosprawnością ruchową. Takie rozwiązanie umożliwia swobodne poruszanie się, eliminując wszelkie
				ograniczenia. Mogłoby się wydawać, że domy parterowe wymagają większej działki, jednak oferta Studio
				Atrium przewiduje rozwiązania takie jak projekty domów na wąską działkę lub projekty domów parterowych z
				poddaszem użytkowym. Jeżeli klient sugeruje się przede wszystkim praktycznością domu, warto zapoznać się
				z każdym wariantem.</p>
			<h3 style="font-size:2.4rem;">Posiadamy nawet projekty domów parterowych z poddaszem użytkowym lub
				nieużytkowym (strych)</h3>
			<p>Rozwiązanie, jakim są domy parterowe z poddaszem, to idea dla tych, którzy cenią sobie dodatkową
				przestrzeń w domu. Poddasze domu parterowego, już na etapie tworzenia projektu, można zaaranżować na dwa
				sposoby. Część klientów decyduje się na projekt poddasza użytkowego. Taki wariant umożliwia stworzenie
				większej ilości pokoi, a nawet przeniesienie strefy nocnej na poddasze. Innym rozwiązaniem jest
				aranżacja poddasza tzw. nieużytkowego. W takim przypadku nie jest możliwe wykończenie poddasza jako
				dodatkowych pokoi ze względu na brak wszelakich instalacji na poddaszu, jednak taki rodzaj przestrzeni
				idealnie sprawdza się jako dodatkowy składzik lub pomieszczenie gospodarcze. Warto dodać, że dom
				parterowy z poddaszem to świetna alternatywa dla Inwestorów, którzy chcą rozłożyć budowę domu na etapy,
				ponieważ poddasze nie musi być wykańczane od razu.</p>
			<h3 style="font-size:2.4rem;">Projekty domów bliźniaczych</h3>
			<p><a href="https://www.studioatrium.pl/projekty-domow/blizniaki/" style="color: #cc1000;">Projekty domów
					bliźniaczych</a> to charakterystyczne budowle, które wyróżniają się podziałem bryły na dwa oddzielne
				i niezależne od siebie segmenty. Konstrukcja składa się z jednego wspólnego dachu oraz murów
				zewnętrznych, natomiast zawiera dwa oddzielne i niezależne wejścia do mieszkania. Ta alternatywa jest
				dużo tańsza niż wybudowanie dwóch oddzielnych domów jednak. W porównaniu do dwóch niezależnych domów
				budowa tego typu bryły pozwala zaoszczędzić dużo miejsca na działce. Dodatkową zaletą jest redukcja
				kosztów budowy. Tego typu budynek mieszkalny jest świetną alternatywą dla Inwestorów, zaprzyjaźnionych
				rodzin lub klientów z ograniczonym budżetem.</p>
			<h3 style="font-size:2.4rem;">Projekty domów energooszczędnych</h3>
			<p>Dwudziesty pierwszy wiek dostarcza coraz więcej rozwiązań energooszczędnych. Uwzględnienie takich
				rozwiązań na etapie wyboru odpowiedniego projektu domu znacząco rzutuje na przyszłe koszty związane z
				jego utrzymaniem. Nasi specjaliści na bieżąco analizują aktualizacje w zakresie postępujących nowinek z
				dziedziny budownictwa, co pozwala uwzględnić je w projektach domów. W celu minimalizacji zużycia energii
				nasi projektanci uwzględnili w projektach domów takie rozwiązania jak systemy ogrzewania, zastosowanie
				energii odnawialnej, systemy zarządzania energią oraz wiele innych zastosowań, definiujących projekty
				Studio Atrium jako energooszczędne.</p>
			<h3 style="font-size:2.4rem;">Projekty domów nowoczesnych</h3>
			<p><a href="https://www.studioatrium.pl/projekty-domow/nowoczesne/" style="color: #cc1000;">Projekty domów
					nowoczesnych</a> wyróżniają się uwzględnieniem minimalizmu i prostoty. W tym celu ogranicza się
				ozdoby i dekoracje do minimum, co sprawia, że cena wybudowania takiego domu staje się atrakcyjniejsza.
				Zastosowanie dużych przeszklonych okien wpuszcza do domu naturalne światło, co pozwala zaoszczędzić
				energię elektryczną. Inwestorzy często decydują się również na zastosowanie elementów drewnianych oraz
				cegły, aby dom był bardziej przytulny. Wyżej opisane elementy to przykładowe detale, którymi cechują się
				projekty domów nowoczesnych.</p>
			<h3 style="font-size:2.4rem;">Projekty w stylu stodoły</h3>
			<p><a href="https://www.studioatrium.pl/projekty-domow/w-stylu-stodoly/" style="color: #cc1000;">Projekty
					domów w stylu stodoły</a>, czyli tzw. Barn House, coraz częściej stają się obiektem zainteresowań
				Inwestorów. Charakteryzują się prostokątną bryłą budynku oraz wielkoformatowymi oknami. Są to typy domów
				z dachem dwuspadowym. Wnętrza cechują wysokie sufity i otwarte przestrzenie z uwzględnieniem antresoli
				nad salonem. Rustykalno - nowoczesny styl skupia się na ujęciu tradycyjnych lub starych elementów,
				takich jak drewniane bele i stara cegła, w połączeniu z nowoczesnymi metalowymi i szklanymi
				wykończeniami. </p>
			<h3 style="font-size:2.4rem;">Projekty domów z poddaszem użytkowym</h3>
			<p><a href="https://www.studioatrium.pl/projekty-domow/z-poddaszem-uzytkowym/"
					style="color: #cc1000;">Projekty domów z poddaszem użytkowym</a> dają wiele możliwości. Przede
				wszystkim decyzję o zagospodarowaniu poddasza podejmuje Inwestor, co więcej poddasze użytkowe to
				możliwość podzielenia wykończenia domu na etapy. Poddasze to przestrzeń wypełniona licznymi skosami,
				które przy odpowiedniej aranżacji kreują przytulną przestrzeń dla mieszkańców. Zastosowanie tego rodzaju
				projektu okazuje się być dużo oszczędniejszą alternatywą domu piętrowego. </p>
			<h3 style="font-size:2.4rem;">Projekty domów tradycyjnych</h3>
			<p>Klienci ceniący sobie klasykę i ponadczasowość często znajdują rozwiązanie, decydując się na projekty
				domów tradycyjnych. Uniwersalność to główna cecha charakteryzująca ten typ domów, która sprawia, że
				idealnie wpasowują się one w klimat wiejski oraz miastowy. Tego typu projekty dedykowane są dla
				Inwestorów ceniących sobie przytulność połączoną z aranżacją regionalnych wzorców architektonicznych;
				ponadto warto zwrócić uwagę, że dom tradycyjny zachowuje swoją wartość wizualną i funkcjonalną przez
				długie lata. </p>
			<h3 style="font-size:2.4rem;">Projekty domów z garażem</h3>
			<p>Wybór projektu domu z garażem niesie ze sobą wiele korzyści, zarówno praktycznych, jak i ekonomicznych.
				Jest to wybór, który łączy wygodę, funkcjonalność i bezpieczeństwo. Dzięki niemu nie tylko zabezpieczysz
				samochód, ale także zyskasz dodatkową przestrzeń do przechowywania lub adaptacji w przyszłości. Warto
				rozważyć taką opcję, zwłaszcza jeśli codziennie korzystasz z pojazdu lub szukasz praktycznych rozwiązań
				na dłuższy okres czasu.</p>
			<h3 style="font-size:2.4rem;">Projekty domów na wąska działkę</h3>
			<p>Bardzo często zdarza się, że najistotniejszym dla inwestora jest mały metraż działki, który automatycznie
				uniemożliwia wybudowanie pewnych brył. Dla specjalistów Studio Atrium wąska działka nie stanowi
				ograniczenia a jedynie podstawę do tworzenia kreatywnych rozwiązań dla klienta. <a
					href="https://www.studioatrium.pl/projekty-domow/na-waska-dzialke/" style="color: #cc1000;">Projekty
					domów na wąską działkę</a> najczęściej skupiają się na maksymalnym wykorzystaniu działki poprzez
				zastosowanie podłużnej, prostokątnej bryły, tak aby jak najbardziej wykorzystać ograniczoną
				powierzchnię. W przypadku wąskich działek idealnie sprawdzają się domy piętrowe lub takie z poddaszem
				użytkowym.</p>
			<h3 style="font-size:2.4rem;">Projekty domów z kosztorysem</h3>
			<p>Decydując się na zakup projektu domu z kosztorysem, inwestor nabywa gotowe plany budowlane z
				uwzględnieniem szczegółowych informacji <a
					href="https://www.studioatrium.pl/artykuly/Koszty-budowy,388.html" style="color: #cc1000;">kosztów
					budowy domów</a>. Takie rozwiązanie świetnie sprawdza się w przypadku Inwestorów, którym zależy na
				dokładnej kontroli budżetu. Jest to również możliwość do lepszego rozplanowania etapów budowy i płynnego
				zarządzania zapleczem finansowym. Jeżeli budujesz dom po raz pierwszy, masz ograniczony budżet lub
				zamierzasz ubiegać się o kredyt (kosztorys wymagany jest przez bank), decyzja o zakupie projektu z
				kosztorysem jest odpowiednia dla Ciebie. Aktualna cena to 750 zł za szczegółowy kosztorys.</p>
			<h3 style="font-size:2.4rem;">Projekty małych domów</h3>
			<p>Małe domy wyróżnia nieduży metraż; dlatego istotne jest uwzględnienie w projekcie praktycznych zastosowań
				przy maksymalnym zagospodarowaniu powierzchni użytkowej. <a
					href="https://www.studioatrium.pl/projekty-domow/do-70m2/" style="color: #cc1000;">Projekty małych
					domów</a> to idealne rozwiązanie dla par lub osób w podeszłym wieku; co więcej takie projekty
				idealnie sprawdzają się w przypadku ograniczeń związanych z małym metrażem działki. Jeżeli cenisz sobie
				praktyczność połączoną z przytulnymi aranżacjami wnętrz, projekt małego domu jest właśnie dla Ciebie.
			</p>
			<h3 style="font-size:2.4rem;">Projekty domów na skarpę</h3>
			<p>Twoja działka leży na wzgórzu, zboczu, lub nierównym terenie? Z pomocą przychodzą nasi specjaliści,
				oferując ciekawe projekty przystosowane do działek na skarpie. Takie projekty domów wymagają przede
				wszystkim przystosowania do walorów działki, dlatego nasz zespół często proponuje uwzględnienie
				wielopoziomowych układów kondygnacji, aby w pełni wykorzystać dostępną przestrzeń. Takie rozwiązanie
				umożliwia ulokowanie parteru lub piwnicy w częściowym zagłębieniu w skarpie, natomiast wyższe
				kondygnacje są wysuwane. Dom ulokowany na wzniesieniu oferuje panoramiczne widoki, co wpływa na jego
				atrakcyjność. <a href="https://www.studioatrium.pl/projekty-domow/na-skarpe/"
					style="color: #cc1000;">Domy na skarpie</a> często są mocno wyeksponowane na światło, co w
				połączeniu z zastosowaniem dużych okien stanowi energooszczędne rozwiązanie doświetlające wnętrze domu.
			</p>
			<h2 style="font-size:3rem; line-height: 1.2em; text-transform: uppercase; margin: 30px 0;">Co należy
				sprawdzić dobierając projekt domu do działki?</h2>
			<p>Działka budowlana ma znaczny wpływ na wybór projektu domu. Aby dopasować projekt domu do działki, istotne
				jest rozważyć kilka aspektów. Przede wszystkim dobrze jest zapoznać się z planem zagospodarowania
				przestrzennego oraz warunkami zabudowy. Jest to istotne, ponieważ lokalne przepisy mogą narzucać pewne
				ograniczenia, takie jak maksymalna wysokość budynku.</p>
			<p>Podczas dobierania projektu do działki, dobrze jest dokładnie przeanalizować swoją działkę i upewnić się
				czy rozmiar i kształt domu, który nas interesuje jest adekwatny do wymiarów działka. Co więcej, warto
				zwrócić uwagę na ukształtowanie terenu. Jeżeli działka znajduje się na pochyleniu, warto rozważyć zakup
				projektu na skarpę lub z piwnicą. </p>
			<h2 style="font-size:3rem; line-height: 1.2em; text-transform: uppercase; margin: 30px 0;">Co zawiera
				projekt domu Studio Atrium?</h2>
			<p>Zespół Studio Atrium w swojej ofercie dysponuje szerokim wyborem gotowych projektów domów, które różnią
				się, aby każdy inwestor mógł znaleźć odpowiednie rozwiązanie dopasowane do swoich potrzeb. Jest jednak
				kilka punktów wspólnych, które łączą wszystkie projekty, mianowicie w skład każdego projektu domu
				wchodzi dokumentacja architektoniczno-budowlana (rzut parteru i kondygnacji, przekroje budynku i opis
				techniczny). Co więcej, Inwestor decydujący się na zakup projektu w naszym studio ma zapewnioną
				dokumentację konstrukcyjną oraz instalacyjną. Nasz zespół, w projekcie uwzględnił również inne dane,
				takie jak zestawienie materiałów, wizualizację 3D, rysunki szczegółowe, zestawienie materiałów oraz
				wskazówki dla wykonawcy. </p>
			<h2 style="font-size:3rem; line-height: 1.2em; text-transform: uppercase; margin: 30px 0;">Czy Studio Atrium
				przewiduje zmiany w projekcie domu?</h2>
			<p>Takie pytanie często zadaje wielu Inwestorów. Odpowiedź brzmi - tak. Studio Atrium przewiduje możliwość
				wprowadzenia zmian w swoich gotowych projektach domów. Bardzo często zdarza się, że konieczność zmian
				wynika z podjętej decyzji o warunkach zabudowy. Inne często podejmowane zmiany zachodzą w przypadku
				projektów bliźniaków, projektów domów z poddaszem i wielu innych projektów. Nasi przedstawiciele
				udzielają odpowiednich zgód i dokumentacji. Zmiany w projekcie wprowadza lokalny architekt adoptujący
				projekt do terenu. Możliwe są one również do naniesienia przez Studio Atrium na życzenie klienta - po
				wcześniejszym ustaleniu zakresu zmian, kosztu ich wprowadzenia do projektu i oczywiście terminu
				wykonania.</p>
			<h2 style="font-size:3rem; line-height: 1.2em; text-transform: uppercase; margin: 30px 0;">Zakup małego czy
				dużego domu ?</h2>
			<p>Niezależnie czy Inwestor decyduje się na projekt domu jednorodzinnego, a może jego obiektem
				zainteresowania są projekty domów z poddaszem użytkowym, kwestia wielkości budynku jest bardzo
				indywidualna i zależna od kilku czynników. Wybierając wielkość domu, należy wziąć pod uwagę indywidualne
				potrzeby rodziny, która docelowo będzie zamieszkiwała dany dom. Jeżeli Inwestor ma problem z
				decyzyjnością i nie jest pewien, jaki wybrać projekt domu, należy pamiętać, że mały dom jest odpowiedni
				dla osób ceniących minimalizm, niskie koszty utrzymania i prostotę życia. Duży dom to wybór dla tych,
				którzy potrzebują przestrzeni, mają większą rodzinę i są gotowi na wyższe koszty związane z jego budową
				i eksploatacją. Kluczowym aspektem jest znalezienie złotego środka, który odpowiada realnym potrzebom
				mieszkańców, stylowi życia i możliwościom finansowym.</p>
		</div>
	</div>
</section>

<section class="info">
	<div class="box center">
		<ul>
			<li>
				<div>
					<img class="lazy-image" data-uri="/img/hostess.webp" src="img/xc.png" width="388" height="390"
						alt="Konsultant pracowni projektowej Studio Atrium">
				</div>
			</li>
			<li>
				<h2>Projekty domów</h2>
				<p>Sprawdź nasze projekty domów. Projektujemy domy nowoczesne i tradycyjne, które spełnią wszystkie
					Twoje oczekiwania.</p>
				<p>Jeśli potrzebujesz fachowej porady lub pomocy przy wyborze projektu - zadzwoń:</p>
				<p class="nr"><a href="tel:+48338229496" rel="nofollow">33 822 94 96</a></p>
				<p class="nr"><a href="tel:+48602303160" rel="nofollow">602 303 160</a></p>

				<p>lub <span class="uline consultant">napisz do nas</span>. Na pewno odpowiemy.</p>
				<?php if (!$_smarty_tpl->tpl_vars['user']->value) {?>
					<p>
						<a href="javascript:" class="account register-trigger">Załóż konto</a>
					</p>
					<p>Zarejestruj się i korzystaj z dogodnych narzędzi wszędzie gdzie jesteś. Będziemy także zawiadamiać
						Cię o rabatach i promocjach. Dodatkowo otrzymujesz od nas <span>100 zł</span> na zakup projektu
						domu.</p>
				<?php }?>
			</li>
		</ul>
	</div>
</section>

<section class="fotokonkurs">
	<ul>
		<li><a href="/konkurs/fotograficzny.html"><img class="lazy-image" data-uri="/img/konkurs-banner.webp"
					src="img/xc.png" alt="Konkurs fotograficzny" width="1436" height="270"></a></li>
		<li><a href="/artykuly/Nagrodzone-realizacje,1391.html"><img class="lazy-image"
					data-uri="/img/konkurs-laureaci.webp" src="img/xc.png" alt="Laureaci konkursu fotograficznego"
					width="484" height="270"></a></li>
	</ul>
</section>

<section class="real">
	<div class="real-grid" id="real-grid">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['realisations']->value, '_item');
$_smarty_tpl->tpl_vars['_item']->iteration = 0;
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
$_smarty_tpl->tpl_vars['_item']->iteration++;
$__foreach__item_5_saved = $_smarty_tpl->tpl_vars['_item'];
?>
			<?php if ($_smarty_tpl->tpl_vars['_item']->iteration == 1) {?>
				<figure class="info">
					<img src="/img/dummy_real.png" width="475" height="317" alt="">

					<figcaption>
						<h6>Realizacje</h6>
						<p>Zobacz realizacje naszych projektów. Jeśli wybudowałeś dom według naszego projektu weź udział w <a
								href="/konkurs/fotograficzny.html">fotokonkursie</a> z nagrodami.</p>

						<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'realizations'),$_smarty_tpl ) );?>
">Zobacz wszystkie realizacje</a>
					</figcaption>
				</figure>
			<?php }?>
			<figure class="real">
				<img class="lazy-image"
					data-uri="<?php echo $_smarty_tpl->tpl_vars['projectPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['path'];?>
/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'replace' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['filename'],"realizacja-","realizacja-317-" ));?>
"
					src="img/xc.png" width="475" height="317" alt="Projekt <?php echo $_smarty_tpl->tpl_vars['_item']->value['object']['name'];?>
 - realizacja">

				<figcaption>
					<a
						href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_item']->value['object']['id'],'link_title'=>$_smarty_tpl->tpl_vars['_item']->value['object']['name'],'catalog'=>'projekty-domow'),$_smarty_tpl ) );?>
#realizacje">
						<span>projekt domu
							<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hasFloor' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['object']['params_general'],true ))) {?>piętrowego
							<?php } elseif (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hasLoft' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['object']['params_general'],true ))) {?>z
							poddaszem<?php } elseif (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'isGroundFloor' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['object']['params_general'],true ))) {?>parterowego
							<?php }?></span>
						<strong><?php echo $_smarty_tpl->tpl_vars['_item']->value['object']['name'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'usableArea' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['object']['params_general'] ));?>

							<span>m<sup>2</sup></span></strong>
					</a>
				</figcaption>
			</figure>
		<?php
$_smarty_tpl->tpl_vars['_item'] = $__foreach__item_5_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['interiors']->value, '_item');
$_smarty_tpl->tpl_vars['_item']->iteration = 0;
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
$_smarty_tpl->tpl_vars['_item']->iteration++;
$__foreach__item_6_saved = $_smarty_tpl->tpl_vars['_item'];
?>
			<?php if ($_smarty_tpl->tpl_vars['_item']->iteration == 1) {?>
				<figure class="info green">
					<img src="/img/dummy_real.png" width="475" height="317" alt="">

					<figcaption>
						<h6>Aranżacje</h6>
						<p>Zobacz aranżacje wnętrz naszych Klientów. Weź udział w <a
								href="/konkurs/fotograficzny.html">fotokonkursie</a> z nagrodami jeśli mieszkasz w domu
							wybudowanym według naszego projektu.</p>

						<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'realizations_interior'),$_smarty_tpl ) );?>
">Zobacz wszystkie aranżacje</a>
					</figcaption>
				</figure>
			<?php }?>
			<figure class="real">
				<img class="lazy-image"
					data-uri="<?php echo $_smarty_tpl->tpl_vars['projectPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['path'];?>
/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'replace' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['filename'],"budowa-","budowa-317-" ));?>
"
					src="img/xc.png" width="475" height="317" alt="Projekt <?php echo $_smarty_tpl->tpl_vars['_item']->value['object']['name'];?>
 - realizacja wnętrza">

				<figcaption>
					<a
						href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_item']->value['object']['id'],'link_title'=>$_smarty_tpl->tpl_vars['_item']->value['object']['name'],'catalog'=>'projekty-domow'),$_smarty_tpl ) );?>
#realizacje">
						<span>projekt domu
							<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hasFloor' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['object']['params_general'],true ))) {?>piętrowego
							<?php } elseif (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hasLoft' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['object']['params_general'],true ))) {?>z
							poddaszem<?php } elseif (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'isGroundFloor' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['object']['params_general'],true ))) {?>parterowego
							<?php }?></span>
						<strong><?php echo $_smarty_tpl->tpl_vars['_item']->value['object']['name'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'usableArea' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['object']['params_general'] ));?>

							<span>m<sup>2</sup></span></strong>
					</a>
				</figcaption>
			</figure>

		<?php
$_smarty_tpl->tpl_vars['_item'] = $__foreach__item_6_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['unfinished']->value, '_item');
$_smarty_tpl->tpl_vars['_item']->iteration = 0;
$_smarty_tpl->tpl_vars['_item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_item']->value) {
$_smarty_tpl->tpl_vars['_item']->do_else = false;
$_smarty_tpl->tpl_vars['_item']->iteration++;
$__foreach__item_7_saved = $_smarty_tpl->tpl_vars['_item'];
?>
			<?php if ($_smarty_tpl->tpl_vars['_item']->iteration == 1) {?>
				<figure class="info grey">
					<img src="/img/dummy_real.png" width="475" height="317" alt="">

					<figcaption>
						<h6>W budowie</h6>
						<p>Zobacz nasze domy w trakcie budowy. Jeśli budujesz dom według naszego projektu, weź udział w <a
								href="/konkurs/fotograficzny.html">fotokonkursie</a> z nagrodami.</p>

						<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'realizations_building'),$_smarty_tpl ) );?>
">Zobacz wszystkie budowy</a>
					</figcaption>
				</figure>
			<?php }?>
			<figure class="real">
				<img class="lazy-image"
					data-uri="<?php echo $_smarty_tpl->tpl_vars['projectPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['_item']->value['path'];?>
/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'replace' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['filename'],"budowa-","budowa-317-" ));?>
"
					src="img/xc.png" width="475" height="317" alt="Projekt <?php echo $_smarty_tpl->tpl_vars['_item']->value['object']['name'];?>
 w budowie">

				<figcaption>
					<a
						href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['_item']->value['object']['id'],'link_title'=>$_smarty_tpl->tpl_vars['_item']->value['object']['name'],'catalog'=>'projekty-domow'),$_smarty_tpl ) );?>
#realizacje">
						<span>projekt domu
							<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hasFloor' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['object']['params_general'],true ))) {?>piętrowego
							<?php } elseif (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'hasLoft' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['object']['params_general'],true ))) {?>z
							poddaszem<?php } elseif (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'isGroundFloor' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['object']['params_general'],true ))) {?>parterowego
							<?php }?></span>
						<strong><?php echo $_smarty_tpl->tpl_vars['_item']->value['object']['name'];?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'usableArea' ][ 0 ], array( $_smarty_tpl->tpl_vars['_item']->value['object']['params_general'] ));?>

							<span>m<sup>2</sup></span></strong>
					</a>
				</figcaption>
			</figure>
		<?php
$_smarty_tpl->tpl_vars['_item'] = $__foreach__item_7_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</div>
</section>

<section class="about">
	<div class="box">
		<h3>Studio Atrium - marka z pomysłami</h3>
		<ul>
			<li>
				<p>Firma architektoniczna i wydawnicza Studio Atrium istnieje na polskim rynku od 1994 roku. W naszym
					dorobku znajduje się ponad 1400 projektów powtarzalnych, ale zajmujemy się także inną działalnością
					w obszarze budownictwa oraz działalnością wydawniczą. Nasz dorobek projektowy prezentujemy na łamach
					katalogu Domy w Tradycji. Byliśmy także wydawcą magazynu Romantyczny Styl. Oprócz działalności na
					polu projektów powtarzalnych jesteśmy autorami projektów budynków usługowych, projektów wnętrz i
					mamy na koncie dwie ogólnopolskie akcje Dom Modelowy. Serdecznie zapraszamy do zapoznania się z
					naszymi osiągnięciami.</p>
				<p>arch. arch. Piotr Godlewski, Krzysztof Lelek</p>
			</li>
			<li>
				<ul>
					<li>
						<img class="lazy-image" data-uri="/img/about.webp" src="img/xc.png" width="358" height="266"
							alt="O pracowni projektowej Studio Atrium">
					</li>
					<li>
						<img class="lazy-image" data-uri="/img/about-1.webp" src="img/xc.png" width="335" height="198"
							alt="Informacje na temat Studia Atrium">
					</li>
				</ul>
				<div>
					<a class="styled" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'varia','action'=>'about'),$_smarty_tpl ) );?>
">Zobacz co jeszcze robimy</a>
				</div>
			</li>
		</ul>

		<div>
			<div id="rev-content">
				<p class="motto" id="review">
					<a href='/dokumenty/Referencje.html'>Szczególnie cenimy firmę Studio Atrium za profesjonalne,
						niezwykle dokładne oraz przejrzyste przygotowanie każdej swojej dokumentacji technicznej.</a>
				</p>
				<p id="rev-author">Seweryn Jajuga <span id="rev-com">Dobry dom</span></p>
			</div>

			<ul class="company" id="testimo">
				<li><span id="dd" class="dd selected"
						data-rev="<a href='/dokumenty/Referencje.html'>Szczególnie cenimy firmę Studio Atrium za profesjonalne, niezwykle dokładne oraz przejrzyste przygotowanie każdej swojej dokumentacji technicznej.</a>"
						data-author="Seweryn Jajuga" data-company="Dobry dom">Dobry dom</span></li>
				<li><span id="ab" class="ab"
						data-rev="<a href='/dokumenty/Referencje.html'>Firma Studio Atrium jest godna zaufania i dalszego polecenia. Zaproponowane rozwiązania architektoniczne i konstrukcyjne sprawdziły się w 100%.</a>"
						data-author="Bogdan Białka" data-company="AutoBiałka">AutoBiałka</span></li>
				<li><span id="kl" class="kl"
						data-rev="<a href='/dokumenty/Referencje.html'>Współpracujemy z firmą Studio Atrium od 1999 roku i zawsze możemy liczyć na dobrze opracowany projekt oraz kompetentną i fachową pomoc.</a>"
						data-author="Krystyna Lihs" data-company="KL-PROJEKT">KL</span></li>
			</ul>
		</div>
	</div>
</section>


<section class="py-20 bg-[#ECECEC]">
	<div class="max-w-[1280px] mx-auto px-12 grid md:grid-cols-2 gap-16 items-center">
		<div class="flex items-center justify-center gap-12">
			<img src="/img/maitri.png" alt="Maitri" alt="Maitri" class="w-40 h-40 object-contain">
			<img src="https://www.studioatrium.pl/img/drachma.png" alt="Drachma" class="w-40 h-40 object-contain">
		</div>
		<div>
			<h2 class="text-[26px] font-bold text-[var(--brand-darker)] mb-6">Wspieramy potrzebujących</h2>
			<p class="text-[15px] text-[var(--brand-darker)] leading-[1.7] max-w-[450px]">Biuro projektowe Studio Atrium
				działa na rynku od ponad 25 lat. Domy wybudowane według naszych projektów można spotkać w całym kraju.
				Jesteśmy przekonani, że mieszkają w nich szczęśliwe rodziny. Jednak zawsze staramy się pamiętać także o
				tych, których los nie zawsze traktuje z łagodnością.</p>
		</div>
	</div>
</section>



<?php $_smarty_tpl->_subTemplateRender("file:Include/HowToBuy.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="partners">
	<p>Współpracujemy</p>

	<div>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['partners']->value, '_partner');
$_smarty_tpl->tpl_vars['_partner']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_partner']->value) {
$_smarty_tpl->tpl_vars['_partner']->do_else = false;
?>
			<?php if ($_smarty_tpl->tpl_vars['_partner']->value['title'] == 'Hörmann' || $_smarty_tpl->tpl_vars['_partner']->value['title'] == 'Fakro' || $_smarty_tpl->tpl_vars['_partner']->value['title'] == 'Termo Organika' || $_smarty_tpl->tpl_vars['_partner']->value['title'] == 'Aluprof') {?>
				<a href="/dokumenty/Wspolpraca.html#par<?php echo $_smarty_tpl->tpl_vars['_partner']->value['id'];?>
"><img class="lazy-image"
						data-uri="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['articleImage'][0], array( array('document'=>$_smarty_tpl->tpl_vars['_partner']->value),$_smarty_tpl ) );?>
" src="img/xc.png" alt="<?php echo $_smarty_tpl->tpl_vars['_partner']->value['title'];?>
" width="1"
						height="1"></a>
			<?php }?>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
				<img class="preload" id="over-img" src="/img/dummy.png" width="1350" height="900" alt="Render">
			</a>
		</div>

		<ul id="over-params">
			<li>
				<h6 id="over-name"></h6>
			</li>
			<li class="small"><span id="over-txt"></span></li>
			<li><span id="over-version"></span></li>
			<li>
				<p>ilość pokoi: <span id="over-rooms"></span></p>
			</li>
			<li>
				<p>powierzchnia użytkowa: <strong id="over-area"></strong> m<sup>2</sup></p>
			</li>
			<li>
				<p>min. wymiary działki: <span id="over-parcel"></span> m</p>
			</li>
			<li>
				<p>wysokość budynku: <span id="over-height"></span> m</p>
			</li>
			<li>
				<p>kąt nachylenia dachu: <span id="over-angle"></span></p>
			</li>
			<li>
				<p>cena projektu: <span id="over-price"></span> zł</p>
			</li>
			<li><a href="" class="more">Zobacz szczegóły</a></li>
		</ul>

		<button type="button" class="overlay-change prev" id="prev-overlay">poprzedni</button>
		<button type="button" class="overlay-change next" id="next-overlay">następny</button>
	</div>

	<button type="button" id="overlay-close" class="overlay-close">Zamknij</button>
</div><?php }
}
