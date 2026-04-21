<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.6&appId=100720913594772";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="pro-box">
	<span class="header">Selfie z projektem <a href="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow'}"><strong>{$project.name}</strong></a>: "{$selfie.title}"</span>
	<a href="{url module=project action=item id=$project.id link_title=$project.name catalog='projekty-domow'}">powrót &raquo;</a>

	<div class="currentSelfie">
		<img src="{$selfie_path}/{$selfie.selfie_img_url}" alt="{$selfie.name}">
		<p><a href="{$fileToSave}" class="button" download="selfie-{$selfie.title|fixLinkTitle}.jpg">zapisz na dysku</a></p>
		<div class="fb-share-button" data-href="{$currentUrl}" data-layout="button" data-mobile-iframe="true"></div>
	</div>
</div>