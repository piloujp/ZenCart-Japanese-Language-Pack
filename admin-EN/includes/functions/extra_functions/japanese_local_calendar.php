<?php
/*
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: pilou2 2022 Dec 7 Created in v1.5.8 $
 */
 
function zen_set_local_calendar ($pattern = 'r年（Gy年）MMMMd日 EEEE HH:mm:ss ZZZZ') {
	$formatterJP = datefmt_create(
				'ja_JP@calendar=japanese',
				IntlDateFormatter::FULL,
				IntlDateFormatter::FULL,
				'Asia/Tokyo',
				IntlDateFormatter::TRADITIONAL,
			);
			$formatterJP->setPattern($pattern);
	return $formatterJP;
}
