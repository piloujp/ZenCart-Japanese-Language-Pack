<?php
/**
 * @copyright Copyright 2003-2025 Zen Cart Development Team
 * @license https://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: Piloujp 2025 March 31 Modified in v2.1.0 $
 */

// Function returning a plugin's active version from its unique key
if (!function_exists('zen_get_plugin_version')) {
    function zen_get_plugin_version(string $unique_key): ?string
      {
        global $db;

        $result = $db->Execute(
            "SELECT version FROM plugin_control
            WHERE status = 1 AND unique_key = '" . $unique_key . "'",
            null,
            true
        );

        return $result->RecordCount() !== 0 ? (string)$result->fields['version'] : null;
      } 
}
