<?php
/* Smarty version 3.1.48, created on 2026-09-03 14:46:14
  from '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/Hero.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a996c1658ca30_82819318',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c473dab4f0f662902648bfbbac9b51605de800fd' => 
    array (
      0 => '/var/www/aronmaiden/studioatrium/studio-atrium/Views/Templates/Project/Detail2026/Hero.tpl',
      1 => 1788439282,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a996c1658ca30_82819318 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="wizualizacje" class="bg-white py-14 scroll-mt-32">
	<div class="max-w-[1480px] mx-auto px-8">
		<div class="grid lg:grid-cols-12 gap-8">
			<div class="lg:col-span-8">
				<div class="relative group overflow-hidden bg-[#1b2025] aspect-[16/10]" id="proj-gallery-main">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['detailGallery']->value, 'img');
$_smarty_tpl->tpl_vars['img']->iteration = 0;
$_smarty_tpl->tpl_vars['img']->index = -1;
$_smarty_tpl->tpl_vars['img']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['img']->value) {
$_smarty_tpl->tpl_vars['img']->do_else = false;
$_smarty_tpl->tpl_vars['img']->iteration++;
$_smarty_tpl->tpl_vars['img']->index++;
$_smarty_tpl->tpl_vars['img']->first = !$_smarty_tpl->tpl_vars['img']->index;
$__foreach_img_9_saved = $_smarty_tpl->tpl_vars['img'];
?>
					<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['img']->value['src'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['img']->value['alt'], ENT_QUOTES, 'UTF-8', true);?>
" loading="<?php if ($_smarty_tpl->tpl_vars['img']->first) {?>eager<?php } else { ?>lazy<?php }?>"
						class="proj-gallery-slide absolute inset-0 w-full h-full object-cover transition-all duration-700 <?php if ($_smarty_tpl->tpl_vars['img']->first) {?>opacity-100 scale-100<?php } else { ?>opacity-0 scale-105<?php }?>"
						data-index="<?php echo $_smarty_tpl->tpl_vars['img']->index;?>
">
					<?php
$_smarty_tpl->tpl_vars['img'] = $__foreach_img_9_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					<div class="absolute left-0 bottom-0 bg-[var(--brand-red)] text-white px-5 py-2 text-[11px] uppercase tracking-[0.24em] font-bold">ATRIUM</div>
					<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'count' ][ 0 ], array( $_smarty_tpl->tpl_vars['detailGallery']->value )) > 1) {?>
					<button type="button" id="proj-gal-prev" aria-label="Poprzednie zdjęcie"
						class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 grid place-items-center bg-black/35 hover:bg-[var(--brand-red)] text-white backdrop-blur-sm transition-all opacity-0 group-hover:opacity-100">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-6 h-6" style="width:24px;height:24px" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>
					</button>
					<button type="button" id="proj-gal-next" aria-label="Następne zdjęcie"
						class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 grid place-items-center bg-black/35 hover:bg-[var(--brand-red)] text-white backdrop-blur-sm transition-all opacity-0 group-hover:opacity-100">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-6 h-6" style="width:24px;height:24px" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
					</button>
					<?php }?>
					<div id="proj-gal-counter" class="absolute right-4 bottom-4 bg-black/55 text-white text-[11px] tracking-[0.2em] font-semibold px-3 py-1.5">
						01 / <?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'count' ][ 0 ], array( $_smarty_tpl->tpl_vars['detailGallery']->value )) < 10) {?>0<?php }
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'count' ][ 0 ], array( $_smarty_tpl->tpl_vars['detailGallery']->value ));?>

					</div>
				</div>

				<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'count' ][ 0 ], array( $_smarty_tpl->tpl_vars['detailGallery']->value )) > 1) {?>
				<div class="mt-4 flex items-center gap-3">
					<button type="button" id="proj-thumb-prev" aria-label="Przewiń miniatury w lewo"
						class="w-9 h-9 grid place-items-center border border-[#e6e8eb] hover:border-[#1b2025] disabled:opacity-30 disabled:cursor-not-allowed transition">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>
					</button>
					<div class="flex-1 overflow-hidden">
						<div id="proj-thumb-track" class="flex gap-3 transition-transform duration-500 ease-out">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['detailGallery']->value, 'img');
$_smarty_tpl->tpl_vars['img']->iteration = 0;
$_smarty_tpl->tpl_vars['img']->index = -1;
$_smarty_tpl->tpl_vars['img']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['img']->value) {
$_smarty_tpl->tpl_vars['img']->do_else = false;
$_smarty_tpl->tpl_vars['img']->iteration++;
$_smarty_tpl->tpl_vars['img']->index++;
$_smarty_tpl->tpl_vars['img']->first = !$_smarty_tpl->tpl_vars['img']->index;
$__foreach_img_10_saved = $_smarty_tpl->tpl_vars['img'];
?>
							<button type="button" data-index="<?php echo $_smarty_tpl->tpl_vars['img']->index;?>
"
								class="proj-thumb relative shrink-0 overflow-hidden aspect-[4/3] transition-all <?php if ($_smarty_tpl->tpl_vars['img']->first) {?>ring-2 ring-[var(--brand-red)] ring-offset-2 ring-offset-white<?php } else { ?>opacity-70 hover:opacity-100<?php }?>"
								style="width:calc((100% - 60px) / 6)"
								aria-label="Pokaż zdjęcie <?php echo $_smarty_tpl->tpl_vars['img']->iteration;?>
">
								<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['img']->value['thumb'], ENT_QUOTES, 'UTF-8', true);?>
" alt="" class="w-full h-full object-cover" loading="lazy">
							</button>
							<?php
$_smarty_tpl->tpl_vars['img'] = $__foreach_img_10_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</div>
					</div>
					<button type="button" id="proj-thumb-next" aria-label="Przewiń miniatury w prawo"
						class="w-9 h-9 grid place-items-center border border-[#e6e8eb] hover:border-[#1b2025] disabled:opacity-30 disabled:cursor-not-allowed transition">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:16px;height:16px" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
					</button>
				</div>
				<?php }?>
			</div>

			<div class="lg:col-span-4">
				<div class="lg:sticky lg:top-[210px] space-y-5">
					<div>
						<span class="text-[11px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">Projekt domu</span>
						<h1 class="mt-2 text-[34px] md:text-[40px] leading-[1.05] text-[#1b2025] font-bold tracking-tight">
							<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['project']->value['name'], ENT_QUOTES, 'UTF-8', true);
if ($_smarty_tpl->tpl_vars['detailIsMirror']->value) {?><span class="block text-[18px] font-semibold text-[#666] mt-1">odbicie lustrzane</span><?php }?>
						</h1>
						<div class="mt-3 h-[3px] w-12 bg-[var(--brand-red)]"></div>
						<?php if ($_smarty_tpl->tpl_vars['project']->value['short_description']) {?>
						<p class="mt-3 text-[13px] text-[#6b7177] leading-relaxed"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['project']->value['short_description'], ENT_QUOTES, 'UTF-8', true);?>
</p>
						<?php }?>
					</div>

					<div class="grid grid-cols-2 gap-px bg-[#e6e8eb] border border-[#e6e8eb]">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['detailFacts']->value, 'f');
$_smarty_tpl->tpl_vars['f']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['f']->value) {
$_smarty_tpl->tpl_vars['f']->do_else = false;
?>
						<div class="bg-white px-3 py-3">
							<div class="text-[10px] uppercase tracking-[0.18em] text-[#6b7177] font-semibold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['f']->value['label'], ENT_QUOTES, 'UTF-8', true);?>
</div>
							<div class="mt-1 text-[15px] font-bold text-[#1b2025]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['f']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
</div>
						</div>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</div>

					<div class="bg-[#f5f6f7] border border-[#e6e8eb] p-5">
						<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'isWithdrawn' ][ 0 ], array( $_smarty_tpl->tpl_vars['projectParams']->value ))) {?>
						<div class="text-[18px] font-bold text-[#1b2025]">Wycofany z oferty</div>
						<?php } else { ?>
						<div class="text-[10px] uppercase tracking-[0.22em] text-[#6b7177] font-semibold">
							<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['detailVersionLabel']->value, ENT_QUOTES, 'UTF-8', true);?>
 · <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['detailAvailability']->value, ENT_QUOTES, 'UTF-8', true);?>

						</div>
						<div class="mt-3 flex items-baseline gap-2 flex-wrap">
							<?php if ($_smarty_tpl->tpl_vars['detailPriceOld']->value) {?>
							<span class="text-[18px] text-[#999] line-through tabular-nums"><?php echo number_format($_smarty_tpl->tpl_vars['detailPriceOld']->value,0,',',' ');?>
</span>
							<?php }?>
							<span id="proj-price-display" class="text-[42px] font-black text-[var(--brand-red)] leading-none tabular-nums"><?php echo number_format($_smarty_tpl->tpl_vars['detailPrice']->value,0,',',' ');?>
</span>
							<span class="text-[16px] font-bold text-[var(--brand-red)]">PLN</span>
							<span class="text-[11px] text-[#6b7177] ml-1">w tym 23% VAT</span>
						</div>

						<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'inBasket' ][ 0 ], array( $_smarty_tpl->tpl_vars['project']->value,$_smarty_tpl->tpl_vars['request']->value['version'] ))) {?>
						<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'order','action'=>'cart'),$_smarty_tpl ) );?>
" class="mt-4 w-full bg-[#1b2025] text-white h-14 font-black text-[13px] tracking-[0.18em] uppercase flex items-center justify-center gap-3">
							W koszyku
						</a>
						<?php } else { ?>
						<button type="button" id="addToBasket"
							class="mt-4 w-full bg-[var(--brand-red)] hover:bg-[var(--brand-red-hover)] text-white h-14 font-black text-[13px] tracking-[0.18em] uppercase flex items-center justify-center gap-3 transition-all shadow-[0_8px_22px_-10px_rgba(204,16,0,0.7)]"
							data-version="<?php echo $_smarty_tpl->tpl_vars['request']->value['version'];?>
"
							data-project="<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
"
							data-price="<?php echo $_smarty_tpl->tpl_vars['detailPrice']->value;?>
"
							data-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['project']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"
							data-thumb="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['detailThumb']->value, ENT_QUOTES, 'UTF-8', true);?>
"
							data-link="<?php if ($_smarty_tpl->tpl_vars['detailIsMirror']->value) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'catalog'=>'projekty-domow','version'=>'lustro'),$_smarty_tpl ) );
} else {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'project','action'=>'item','id'=>$_smarty_tpl->tpl_vars['project']->value['id'],'link_title'=>$_smarty_tpl->tpl_vars['project']->value['name'],'catalog'=>'projekty-domow'),$_smarty_tpl ) );
}?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:20px;height:20px" aria-hidden="true"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
							Dodaj do koszyka
						</button>
						<?php }?>

						<?php if ($_smarty_tpl->tpl_vars['detailHeatPump']->value > 0) {?>
						<label class="mt-3 flex items-center gap-3 border border-[var(--brand-red)]/40 px-3 py-2.5 cursor-pointer hover:bg-white transition">
							<input type="checkbox" name="pomp" value="1" id="pompSel" class="w-4 h-4 accent-[var(--brand-red)]">
							<span class="text-[12px] text-[#1b2025] font-semibold">
								wersja z pompą ciepła: <span class="text-[var(--brand-red)]">+ <?php echo $_smarty_tpl->tpl_vars['detailHeatPump']->value;?>
 zł</span>
							</span>
						</label>
						<div id="pompInfo" style="display:none;" class="mt-2 text-[12px] text-[var(--brand-red)] text-center font-semibold">
							UWAGA! Przed złożeniem zamówienia zapytaj konsultanta o termin realizacji wariantu z pompą ciepła!
						</div>
						<?php }?>

						<div class="mt-3 grid grid-cols-1 gap-2">
							<a href="<?php if ($_smarty_tpl->tpl_vars['user']->value) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'panel','action'=>'message','project_id'=>$_smarty_tpl->tpl_vars['project']->value['id']),$_smarty_tpl ) );
} else { ?>javascript:<?php }?>"
								class="w-full bg-white border border-[#e6e8eb] hover:border-[#1b2025] text-[#1b2025] h-10 text-[11px] font-bold tracking-[0.14em] uppercase transition flex items-center justify-center<?php if (!$_smarty_tpl->tpl_vars['user']->value) {?> consultant<?php }?>">
								Powiadom o promocji
							</a>
							<a href="<?php if ($_smarty_tpl->tpl_vars['user']->value) {
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('module'=>'panel','action'=>'message','project_id'=>$_smarty_tpl->tpl_vars['project']->value['id']),$_smarty_tpl ) );
} else { ?>javascript:<?php }?>"
								class="w-full bg-white border border-[#e6e8eb] hover:border-[#1b2025] text-[#1b2025] h-10 text-[11px] font-bold tracking-[0.14em] uppercase transition flex items-center justify-center<?php if (!$_smarty_tpl->tpl_vars['user']->value) {?> consultant<?php }?>">
								Znalazłeś projekt taniej? Napisz
							</a>
							<?php if ($_smarty_tpl->tpl_vars['linkedProjectUrl']->value) {?>
							<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['linkedProjectUrl']->value, ENT_QUOTES, 'UTF-8', true);?>
"
								class="w-full bg-[var(--brand-orange)] hover:brightness-95 text-[#1b2025] h-10 text-[11px] font-black tracking-[0.14em] uppercase transition flex items-center justify-center">
								Zapytaj o wersję szkieletową
							</a>
							<?php } elseif ($_smarty_tpl->tpl_vars['skeletonPrice']->value) {?>
							<button type="button" id="skeleton-trigger"
								class="w-full bg-[var(--brand-orange)] hover:brightness-95 text-[#1b2025] h-10 text-[11px] font-black tracking-[0.14em] uppercase transition">
								Zapytaj o wersję szkieletową
							</button>
							<?php }?>
						</div>
						<?php }?>
					</div>
				</div>
			</div>
		</div>

		<div class="mt-10 grid md:grid-cols-12 gap-4">
			<ul class="md:col-span-9 border border-[#e6e8eb] grid sm:grid-cols-2 lg:grid-cols-4 gap-px bg-[#eef0f2]">
				<li class="flex items-center gap-3 px-4 py-3.5 text-[12.5px] text-[#1b2025] bg-white hover:bg-[#f5f6f7] transition"><span class="w-2 h-2 rounded-full bg-[var(--brand-blue-strong)] shrink-0"></span><span class="flex-1">Bezpłatne dodatki o wartości min. 1 000 zł</span></li>
				<li class="flex items-center gap-3 px-4 py-3.5 text-[12.5px] text-[#1b2025] bg-white hover:bg-[#f5f6f7] transition"><span class="w-2 h-2 rounded-full bg-[var(--brand-blue-strong)] shrink-0"></span><span class="flex-1">Bezpłatne konsultacje architektoniczne</span></li>
				<li class="flex items-center gap-3 px-4 py-3.5 text-[12.5px] text-[#1b2025] bg-white hover:bg-[#f5f6f7] transition"><span class="w-2 h-2 rounded-full bg-[var(--brand-blue-strong)] shrink-0"></span><span class="flex-1">Bezpłatna zgoda na zmiany w projekcie</span></li>
				<li class="flex items-center gap-3 px-4 py-3.5 text-[12.5px] text-[#1b2025] bg-white hover:bg-[#f5f6f7] transition"><span class="w-2 h-2 rounded-full bg-[var(--brand-blue-strong)] shrink-0"></span><span class="flex-1">Bezpłatna dostawa</span></li>
				<li class="flex items-center gap-3 px-4 py-3.5 text-[12.5px] text-[#1b2025] bg-white hover:bg-[#f5f6f7] transition"><span class="w-2 h-2 rounded-full bg-[var(--brand-blue-strong)] shrink-0"></span><span class="flex-1">Pomoc w analizie działki</span></li>
				<li class="flex items-center gap-3 px-4 py-3.5 text-[12.5px] text-[#1b2025] bg-white hover:bg-[#f5f6f7] transition"><span class="w-2 h-2 rounded-full bg-[var(--brand-blue-strong)] shrink-0"></span><span class="flex-1">30 dni na zwrot</span></li>
				<li class="flex items-center gap-3 px-4 py-3.5 text-[12.5px] text-[#1b2025] bg-white hover:bg-[#f5f6f7] transition"><span class="w-2 h-2 rounded-full bg-[var(--brand-blue-strong)] shrink-0"></span><span class="flex-1">365 dni na wymianę</span></li>
				<li class="flex items-center gap-3 px-4 py-3.5 text-[12.5px] text-[#1b2025] bg-white hover:bg-[#f5f6f7] transition"><span class="w-2 h-2 rounded-full bg-[var(--brand-blue-strong)] shrink-0"></span><span class="flex-1">Najniższa cena</span></li>
			</ul>
			<a href="tel:+48602303160" class="md:col-span-3 flex items-center justify-between bg-[#1b2025] text-white px-5 py-4 hover:bg-[#252b31] transition">
				<div class="text-[11px] uppercase tracking-[0.18em] text-white/60 font-semibold leading-tight">Masz pytanie?<br>Zadzwoń</div>
				<div class="text-[18px] font-black text-white tracking-wide">602 303 160</div>
			</a>
		</div>
	</div>
</section>
<?php }
}
