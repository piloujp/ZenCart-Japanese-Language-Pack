<?php
/**
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @license https://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Pilou2 2024 Feb 13 Modified in v2.0.0-alpha1 $
 */

// Function returning Japan's country id used in ZC Japanese Language Pack
function zen_jp_country_id() {
	global $db;
	
	$query = 'Select countries_id from countries where countries_iso_code_2 = \'JP\' LIMIT 1';
	$result = $db->Execute($query);
	
	return (int)$result->fields['countries_id'];
}
