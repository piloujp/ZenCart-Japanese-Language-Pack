<?php
/**
 * @copyright Copyright 2003-2024 Zen Cart Development Team
 * @license https://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Piloujp 2024 June 3 Modified in v2.1.0-alpha1 $
 */

// Function returning a country database id from its ISO 2 letters' code
function zen_country_iso_to_id(string $country_code): ?int
  {
	global $db;
	
	$result = $db->Execute(
        "SELECT countries_id FROM countries
        WHERE countries_iso_code_2 = '" . $country_code . "'
        LIMIT 1",
        null,
        true
    );
    
	return $result->RecordCount() !== 0 ? (int)$result->fields['countries_id'] : null;
  } 
