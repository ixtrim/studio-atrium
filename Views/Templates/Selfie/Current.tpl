<div id="pro-box">
	<a href="/" id="studio_atrium"><img src="/img/saLogo.png" alt="Studio Atrium" class="logo" /></a>
	<span class="header">Selfie z projektem <strong>{$project.name}</strong>: "{$selfie.title}"</span>
	<a href="{url module="project" action="item" id=$project.id link_title="`$project.symbol` `$project.name`" link_catalog="projekty domów/`$project_category`"}">powrót &raquo;</a>

	<div class="currentSelfie">
		<img src="{$selfie_path}/{$selfie.selfie_img_url}" alt="{$selfie.name}">
		{if !$forceDelete}
		<p>
			<a href="{$fileToSave}" class="button" download="selfie-{$selfie.title|fixLinkTitle}.jpg">zapisz na dysku</a>
		</p>
		{/if}
	</div>
</div>
{if $forceDelete == 1}
	<script>
	{literal}
	 $(window).load(function()
	 {
		 var r = confirm("Czy na pewno chcesz usunąć swoją pracę z naszego serwera? Pamiętaj, że to nieodwracalny proces.");
		 if (r == true) {
			 $.ajax({
	  			url: '/index.php?module=selfie&action=delete',
	  			data: {
	  				hash: {/literal}'{$md5Email}'{literal},
	  				stamp: {/literal}'{$timeStamp}'{literal},
		  			id: {/literal}{$selfie.id}{literal}
	  			},
	  			type: 'post',
	  			dataType: 'json',

	  			success: function(response)
	  			{
	  				if (response.status == 'ok') {
	  					alert('Twoje selfie zostało usunięte. Dziękujemy za skorzystanie z naszej aplikacji. Zapraszamy ponownie.');
	  					window.location.href= '/projekty-domow/';
	  				} else {
	  					alert('Niestety nie udało się usunąć Twojego projektu. Skontaktuj się z nami.');
	  					window.location.href= {/literal}'{$returnUrl}'{literal};
		  			}
	  			}
	  		});
		 } else {
		     window.location.href= {/literal}'{$returnUrl}'{literal};
		 }
	 });
	{/literal}
	</script>
{/if}