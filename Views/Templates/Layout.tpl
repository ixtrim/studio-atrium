<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		{include file="Layout/HeadHTML.tpl"}
	</head>
	<body data-catalog="{if $catalogPrompt}1{else}0{/if}">
		{if $messageBox.errors}<div class="messageBox error"><p>{$messageBox.errors|join:"<br>"}</p><a class="close" href="javascript:"></a></div>{/if}
		{if $messageBox.messages}<div class="messageBox info"><p>{$messageBox.messages|join:"<br>"}</p><a class="close" href="javascript:"></a></div>{/if}
		{if $notifyMessage}<div class="notifyBox{if $notifyStyle == 1} warning{/if}{if $notifyBoxHidden} hidden{/if}" id="notifyBoxId"><p>{$notifyMessage} <a id="closeNotifyBox" href="javascript:"> schowaj &raquo;</a></p></div>{/if}
		{include file="Layout/Header.tpl"}
		{include file="$template"}
		{include file="Layout/Tools.tpl"}
		{include file="Layout/Footer.tpl"}
	</body>
</html>