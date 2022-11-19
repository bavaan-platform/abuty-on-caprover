<?php

$abuty = Abuty::instance();
$nav_tree = $abuty->sitemap($abuty->nav);

$fw = Base::instance();

/* Anonymous recursive function to build F6 Topnav HTML structure. */
$ul = function($children) use (&$ul) {
	$level = ( !isset($level) ) ? $level+1 : list($level, $tmp) = [1,''];
	$tmp .= ( $level == 1 ) ? '<ul class="dropdown menu" data-dropdown-menu>' : '<ul class="submenu menu" data-submenu>';
	foreach($children as $child) {
// 		$tmp .= ( $level == 1 && $child['virtual_path'] == "/" ) ? '<li class="menu-text"><a href="/" style="padding: 0px;">Home</a></li>': '';
		$placements = json_decode($child['navPlacement']);
		if ( is_array($placements) && in_array('top', $placements) ) { // This example limits placements that include "top".
			$tmp .= ( isset($child['children']) )
				? '<li class="has-submenu"><a href="'.$child['virtual_path'].'">'.$child['nav_title'].'</a>'.$ul($child['children']).'</li>'
				: '<li><a href="'.$child['virtual_path'].'">'.$child['nav_title'].'</a></li>';
		}
	}
	$tmp .=  '</ul>';
	return $tmp;
};

echo $ul($nav_tree); // Load the anonymous recursive function.

?>