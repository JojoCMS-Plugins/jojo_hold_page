<?xml version="1.0" encoding="utf-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">
<head>
	<title>{$title}</title>
	<base href="{if $issecure}{$SECUREURL}{else}{$SITEURL}{/if}/" />
	{if $hold}{$show = 'hold'}{else}{$show = 'login'}{/if}
	<script type="text/javascript">
		{literal}<!--
		function xyz(c,a,b,s) {
			var s = (s == null) ? true : s;
			var o = '';
			var m = '';
			var m2 = ':otliam';
			for (i = 0; i <= b.length; i++) {o = b.charAt (i) + o;}
			b = o;
			for (i = 0; i <= m2.length; i++) {m = m2.charAt (i) + m;}
			if (!s) {m = '';}
			return m + a + unescape('%'+'4'+'0') + b + '.' + c;
		}
		function show(what) {
			var wrap = document.getElementById("wrap");
			wrap.setAttribute("class",what);
			wrap.setAttribute("className",what);
		}
		{/literal}-->
	</script>
	<link rel="stylesheet" type="text/css" href="css/hold-page.css" />
</head>
<body>
<div id="wrap" class="{$show}">
	<div id="hold">
		<div class="inner">
			{$content}
		</div>
	</div>
	{if $OPTIONS.hold_page_allowed_login=='yes' || $hold == false}
	<div id="login">
		<div class="inner">
			{if $OPTIONS.hold_page_login_title}<h3>{$OPTIONS.hold_page_login_title}</h3>{/if}
			<form method="post" action="{if $issecure}{$SECUREURL}{else}{$SITEURL}{/if}/login/{$held_url}">
				<input type="hidden" name="_jojo_authtype" value="local" />
				{if $redirect}<input type="hidden" name="redirect" id="redirect" value="{$redirect}" />{/if}

				<label for="username">Username:</label>
				<input type="text" name="username" id="username" value="" /><br />

				<label for="password">Password:</label>
				<input type="password" name="password" id="password" value="" title="Passwords are case-sensitive." /><br />

				<label for="remember" title="This option will log you in automatically from this computer.">Remember Password:</label>
				<input type="checkbox" name="remember" id="remember" value="1"  /><br />

				<br /><input type="submit" class="button" name="submit" id="submit" value="Login &raquo;" onmouseover="this.className='button buttonrollover';" onmouseout="this.className='button'" /><br />

			</form>
		</div>
	</div>
	<a id="hold_link" href="{$held_url}" onclick="javascript:show('hold');return false;" class="toggle">Cancel</a>
	<a id="login_link" href="{if $issecure}{$SECUREURL}{else}{$SITEURL}{/if}/login/{$held_url}" onclick="javascript:show('login');return false;" class="toggle">Login</a>
	{/if}
	{if $OPTIONS.hold_page_developer_tag}<span id="developer_link">{$OPTIONS.hold_page_developer_tag}</span>{/if}
	
</div>
	{if $'[;l.O/PTIONS.hold_page_analytics == 'yes'}
		{include file="analytics.tpl"}
	{/if}
</body>
</html>
