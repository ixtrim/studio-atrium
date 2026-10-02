{* Forum index — 2026 *}
<div id="forum-2026" class="bg-white">

	<nav aria-label="breadcrumb" class="w-full bg-white border-b border-[#e5e5e5] py-[12px]">
		<div class="forum-shell">
			<ol class="flex flex-wrap items-center gap-3 text-[14px] text-[#6b6b6b] font-normal">
				<li><a href="/" class="hover:text-[#222] transition-colors">Studio Atrium</a></li>
				<li aria-hidden="true" class="text-[#bdbdbd]">»</li>
				<li aria-current="page" class="text-[#6b6b6b]">Forum</li>
			</ol>
		</div>
	</nav>

	<section class="w-full bg-[#f5f6f7] border-b border-black/5">
		<div class="forum-shell py-10 md:py-12">
			<span class="text-[12px] uppercase tracking-[0.28em] text-[var(--brand-blue-strong)] font-semibold">Społeczność</span>
			<h1 class="mt-3 text-[32px] md:text-[40px] font-400 text-[var(--brand-darker)] tracking-tight uppercase leading-tight">Forum</h1>
			<div class="mt-4 h-[3px] w-12 bg-[var(--brand-red)]"></div>
			<p class="mt-5 max-w-3xl text-[15px] md:text-[16px] leading-relaxed text-[#555]">
				Witamy na Forum dyskusyjnym Studia Atrium — miejscu wymiany doświadczeń przy budowie domu według naszych projektów.
				Warto się zalogować: historia dyskusji, powiadomienia i edycja postów są dostępne dla zarejestrowanych użytkowników.
				<span class="ajax-info" data-url="/?module=ajax&action=get_comment_regulations">Regulamin korzystania</span>
			</p>
		</div>
	</section>

	<section class="w-full bg-white py-10 md:py-14">
		<div class="forum-shell space-y-8">
			{include file="Include/ForumSearch.tpl"}

			<div>
				<div class="text-[12px] font-bold uppercase tracking-[0.16em] text-[#6b7177] mb-3">Kategorie</div>
				{foreach $categories as $_key => $_item}
				<div class="forum-cats">
					<ul class="iconized">
						<li class="{$_item.class}">
							<h4><a href="{url module=discuss action=category id=$_key}">{$_item.title|escape}</a></h4>
							<p>{$_item.descr|escape}</p>
							<a href="{url module=discuss action=category id=$_key}">Zobacz wszystkie tematy</a>
						</li>
						<li>
							{if $posts[$_key]}
							<ul class="m-0 p-0 list-none grid gap-4 sm:grid-cols-[140px_1fr]">
								<li class="forum-author">
									{if $posts[$_key].author_id|avatar}
										<p class="avatar"><img src="{$posts[$_key].author_id|avatar}" alt="{$posts[$_key].nick|escape}">{$posts[$_key].nick|escape}</p>
									{else}
										<p {if in_array($posts[$_key].author_id, $adminIds)} class="nick sa"{else} class="nick" data-initial="{$posts[$_key].nick|truncate:1:""|escape}"{/if}>{$posts[$_key].nick|escape}</p>
									{/if}
									<p class="text-[13px] text-[#6b7177] m-0">{$posts[$_key].create_date|date_format:"%d-%m-%Y"}</p>
									<p class="text-[12px] text-[#999] m-0">{$posts[$_key].create_date|date_format:"%H:%M"}</p>
								</li>
								<li>
									<a href="{url module=discuss action=thread id=$posts[$_key].id}" class="block no-underline text-inherit hover:text-[var(--brand-red)]">
										<h6 class="m-0 mb-2 text-[16px] font-bold text-[var(--brand-darker)]">{$posts[$_key].topic|escape}</h6>
										<p class="m-0 text-[14px] leading-relaxed text-[#555]">{$posts[$_key].content|strip_tags:false|truncate:160|hideEmails}</p>
									</a>
								</li>
							</ul>
							{else}
							<p class="m-0 text-[14px] text-[#888]">Brak tematów w tej kategorii.</p>
							{/if}
						</li>
					</ul>
				</div>
				{/foreach}
			</div>
		</div>
	</section>

</div>
