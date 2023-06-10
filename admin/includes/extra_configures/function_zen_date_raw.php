<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @license https://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Pilou2 2022 Dec 17 Modified in v1.5.8 $
 */

// Function zen_date_raw override
function zen_date_raw($date) {
	// sometimes zen_date_short is called with a zero-date value which returns false, which is then passed to $date here, so this just reformats to avoid confusion.
	if (empty($date) || strpos($date, '0001') || strpos($date, '0000')) {
		return '00010101';
	}

	$yearpos = stripos(DATE_FORMAT,'Y');
	$monthpos = stripos(DATE_FORMAT,'m');
	$daypos = stripos(DATE_FORMAT,'d');
	
	if (isset($yearpos) and isset($monthpos) and isset($daypos)) {
		switch (true) {
			case ($yearpos > $monthpos and $monthpos > $daypos): // Day Month Year
				return substr($date, 6, 4) . substr($date, 3, 2) . substr($date, 0, 2);
				break;
			case  ($yearpos > $daypos and $daypos > $monthpos): // Month Day Year
				return substr($date, 6, 4) . substr($date, 0, 2) . substr($date, 3, 2);
				break;
			case  ($daypos > $monthpos and $monthpos > $yearpos): // Year Month Day
				return substr($date, 0, 4) . substr($date, 5, 2) . substr($date, 8, 2);
				break;
				/* Following cases are theoricals and not really exist
			case  ($monthpos > $daypos and $daypos > $yearpos): // Year Day Month
				return substr($date, 0, 4) . substr($date, 8, 2) . substr($date, 5, 2);
				break;
			case  ($daypos > $yearpos and $yearpos > $monthpos): // Month Year Day
				return substr($date, 3, 4) . substr($date, 0, 2) . substr($date, 8, 2);
				break;
			case  ($monthpos > $yearpos and $yearpos > $daypos): // Day Year Month
				return substr($date, 3, 4) . substr($date, 8, 2) . substr($date, 0, 2);
				break;
				*/
		}
	}
}
