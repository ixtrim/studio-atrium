{if $partners}
<div class="box ajaxed" id="vendors-list" style="display: none;">
	<ul>
	{foreach $partners as $_partner}
		{if $_partner.char_id == 'man'}
		<li>
			{if $_partner.teaser && strpos($_partner.teaser, "http://") !== false}
				<a href="{$_partner.teaser}" class="external" rel="nofollow">
					<img src="{partnerImage document=$_partner}" alt="{$_partner.title}">
				</a>
			{else}
				<img src="{articleImage document=$_partner}" alt="{$_partner.title}">
			{/if}		
			{$_partner.content}
		</li>
		{/if}
	{/foreach}
	</ul>
	{*
	<p>Współpracujemy</p>
	
	<div>
	{foreach $partners as $_partner}
		<a href="/dokumenty/Wspolpraca.html#par{$_partner.id}"><img src="{articleImage document=$_partner}" alt="{$_partner.title}"></a>
	{/foreach}
	</div>
	*}
</div>
{else}
<div class="box ajaxed" id="partner-list">
	<p class="red">Nie znaleziono żadnych producentów i partnerów.</p>
</div>
{/if}