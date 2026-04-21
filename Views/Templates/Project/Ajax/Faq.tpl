<div class="box ajaxed" id="faq-list" style="display: none;">
	<ul>
	{if $list}
		{foreach $list as $_faq}
			<li>
				<p class="query">{$_faq.content|strip_tags}</p>
				{foreach $_faq.children as $_reply}
					<p>{$_reply.content}</p>
				{/foreach}
			</li>
		{/foreach}
	{/if}
	{$defaultFaq.content|replace:"<ul>":""|replace:"</ul>":""}
	</ul>
</div>