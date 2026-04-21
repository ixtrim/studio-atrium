<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8">
<title>StudioAtrium - panel administracyjny</title>
<meta name="description" content="StudioAtrium - panel administracyjny">
<link rel="shortcut icon" type="image/icon" href="/img/favicon.ico">
<link href="https://fonts.googleapis.com/css?family=Lato:300,700&amp;subset=latin-ext" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="screen, projection, print" href="css/style.css">
</head>

<body>
	<div>
		<a href="/"><img src="/img/logo.png"></a>
	</div>
	<div>
		<form id="Authenticate" method="post" action="{url module='authenticate' action='authentication_required'}">
			<fieldset>
				<div><label for="login">email:</label> <input name="login" id="login"{if $errors.login} class="error"{/if} type="text" value="{$request.login}"></div>
				<div><label for="passwrd">hasło:</label> <input name="password" type="password" id="passwrd"{if $errors.password} class="error"{/if}></div>
				<div><input class="submit" type="submit" value="zaloguj"></div>
				{if $errorLogin}
					<span>{$errorLogin}</span>
				{/if}
			</fieldset>
		</form>
	</div>
</body>
</html>