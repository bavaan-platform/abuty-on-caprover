<?php

if ( !class_exists("Abuty") ) header("Location: /", true, 302);

$time = +microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];

function ramused($size) {
	if($size < 1024) {
		return "{$size} bytes";
	} elseif($size < 1048576) {
		$size_kb = round($size/1024);
		return "{$size_kb} KB";
	} else {
		$size_mb = round($size/1048576, 1);
		return "{$size_mb} MB";
	}
}

?>
<div class="text-center">
	<p>Testing the latest revisions of <a href="https://abuty.com/" target="abuty">Abuty!</a> from <a href="https://premoweb.com">PremoWeb</a> .<br />
	<a href="/legal/privacy.html">Privacy Policy</a> | <a href="/legal/tos.html">Terms of Use</a> | <a href="/legal/abuse.html">Report Abuse</a><br />
	&copy; Copyright 2013-<?php echo date("Y"); ?> <a href="/" target="_blank">Commnetivity LLC</a>. All Rights Reserved.
	<!-- <hr /><?php echo "Page rendered in ~".round($time, 3)." seconds using ".ramused(memory_get_usage())." of memory."; ?>--></p>
</div>
