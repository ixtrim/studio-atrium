{include file="Panel/_menu.tpl"}
<div class="content" id="Content">
	<div class="form-box max">
	<form action="{url module=panel action=account_store}" method="post" class="validable default">
		<input name="module" value="panel" type="hidden">
		<input name="action" value="account_store" type="hidden">
		<input type="hidden" id="ownerUid" name="ownerUid" value="{$user._uid}">

		<p>
			<label for="a_name">Imię</label>
			<input type="text" name="a_name" id="a_name" value="{$user.name}">
		</p>
		<p>
			<label for="a_surname">Nazwisko</label>
			<input type="text" name="a_surname" id="a_surname" value="{$user.surname}">
		</p>
		<p>
			<label for="a_nick">Nick</label>
			<input type="text" name="a_nick" id="a_nick" value="{$user.nick}">
		</p>
		<p>
			<label for="a_email">E-mail</label>
			<input type="text" name="a_email" id="a_email" value="{$user.email}">
		</p>
		<p>
			<label for="a_phone">Numer telefonu</label>
			<input type="text" name="a_phone" id="a_phone" value="{$user.props.phone}">
		</p>
		<p class="last"><input type="submit" value="aktualizuj" class="baton"></p>
{*
		<div id="panelAvatar">
			<span id="thumbnailFile">{if $user.id|avatar}<img src="{$user.id|avatar}" alt="avatar">{else}{$user.name|mb_substr:0:1}{/if}</span>
			<img src="/img/progress.gif" alt="" id="thumbnailFileProgress" style="display: none;">	
			<p id="addUserAvatar" class="uploadTrigger" data-options='{$options}' data-profile="UserAvatar" data-progressContainer="UserAvatarProgress">zmień awatar</p>
		</div>
*}		
	</form>
	</div>
	
	<h3 class="line">Zmiana hasła</h3>
	<p class="txt">Jeżeli chcesz zmienić hasło, wpisz poniżej aktualne hasło oraz dwukrotnie nowe.</p>
	<div class="form-box">
	<form action="{url module=panel action=password_store}" method="post" class="validable default">
		<input name="module" value="panel" type="hidden">
		<input name="action" value="password_store" type="hidden">
		<p>
			<label for="a_pass">Aktualne hasło</label>
			<input type="password" name="a_pass" id="a_pass">
		</p>
		<p>
			<label for="a_newpass">Nowe hasło</label>
			<input type="password" name="a_newpass" id="a_newpass">
		</p>
		<p>
			<label for="a_newpass2">Powtórz nowe hasło</label>
			<input type="password" name="a_newpass2" id="a_newpass2">
		</p>
		<p class="last"><input type="submit" value="zmień" class="baton"></p>
	</form>
	</div>
	<p class="block"><a href="javascript:" class="ajax-info" data-url="{url module=ajax action=get_user_regulations}">regulamin</a></p>
	
	<h3>Likwidacja konta</h3>
	<p class="txt">Aby usunąć konto w serwisie studioatrium.pl, kliknij poniższy przycisk, a następnie potwierdź likwidację konta klikając OK.</p>
	<p class="txt"><a href="{url module=panel action=account_delete}" class="baton" onClick="return confirm('Czy na pewno chcesz usunąć konto w serwisie studioatrium.pl?');">usuń konto</a></p>
</div>