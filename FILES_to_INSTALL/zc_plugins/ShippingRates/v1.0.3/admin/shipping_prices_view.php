<?php

require 'includes/application_top.php';
$languages = zen_get_languages();
if (!isset($_GET['action'])) {
    $_GET['action'] = '';
}
if (isset($_GET['tid'])) {
    $_GET['tid'] = (int)$_GET['tid'];
}

if (isset($_POST['saverates'])) {
    $i = 0;
    $j = 0;
    while (isset($_POST['rates'][$i . '-' . $j])) {
        if ($_POST['module'] === 'Yubin' && $_POST['method'] !== 'Yupack' && $_POST['method'] !== 'YupackChilled') {
            if ($j == 0) {
                $newrates_key = $i;
            }
        } elseif ($_POST['method'] !== 'CoolTakyubin' && $_POST['method'] !== 'YupackChilled') {
            $newrates_key = ($i <= 9) ? 'N0' . $i + 1 : 'N' . $i + 1;
        }
        while (isset($_POST['rates'][$i . '-' . $j])) {
            if ($_POST['method'] === 'YupackChilled' || $_POST['method'] === 'CoolTakyubin') {
                $newrates[] = (int)$_POST['rates'][$i . '-' . $j];
            } else {
                $newrates[$newrates_key][] = $_POST['rates'][$i . '-' . $j];
            }
            $j++;
        }
        $i++;
        $j = 0;
    }
    if (!empty($_POST['imple_date'])) {
    $rates_update =
        "UPDATE " . TABLE_SHIPPING_RATES . " t1
        SET t1.imple_date = :imd:, t1.update_date = NOW(), t1.quote_zone = '" . json_encode($newrates) . "'
        WHERE id = :tid:
        ";
    $rates_update = $db->bindVars($rates_update, ':imd:', $_POST['imple_date'], 'string');
    } else {
        $rates_update =
            "UPDATE " . TABLE_SHIPPING_RATES . " t1
            SET t1.update_date = NOW(), t1.quote_zone = '" . json_encode($newrates) . "'
            WHERE id = :tid:
            ";
    }
    $rates_update = $db->bindVars($rates_update, ':tid:', $_POST['tid'], 'integer');
    $result = $db->Execute($rates_update);
    if (!$result) {
        $messageStack->add_session(SHIPPING_RATES_ERROR_SHIPPING_DATA_NOT_SAVED, 'error');
        zen_redirect(zen_href_link(FILENAME_SHIPPING_PRICES_VIEW));
    } else {
        $messageStack->add_session(SHIPPING_RATES_TEXT_SHIPPING_DATA_SAVED, 'success');
        zen_redirect(zen_href_link(FILENAME_SHIPPING_PRICES_VIEW));
    }
}

?>
<!doctype html>
<html <?= HTML_PARAMS ?>>
<head>
    <?php require DIR_WS_INCLUDES . 'admin_html_head.php'; ?>
<style>
    #imple_date  {
        width: 7em;
        border: none;
    }
    .list-title {
        padding-left:50px;
        padding-top: 10px;
        padding-bottom: 10px;
        font-size: 12px;
        font-weight: bold;
    }
    .ratescontainer {
        margin: auto;
        width: 100%;
        padding: 10px;
        text-align: center;
    }
    .ratescontainer input[type=text] {
        width: 4em;
        box-sizing: border-box;
        border: none;
    }
    .ratescenter {
        margin: auto;
        padding: 10px;
        text-align: center;
    }
    .ratescenter th {
        text-align: center;
        vertical-align: top;
    }
    .rateseditcenter {
        margin: auto;
        border: 3px solid green;
        padding: 10px;
        text-align: center;
    }
    .rateseditcenter th {
        text-align: center;
        vertical-align: top;
    }
    .rateseditcenter input {
        text-align: center;
    }
    #Rate-row-title {
        font-weight: bold;
    }
    .future {
        color: red;
    }
    .no-plugin {
        text-align: center;
        font-size: 18px;
        font-weight: bold;
    }
</style>
</head>
<body>
<!-- header //-->
    <?php require DIR_WS_INCLUDES . 'header.php' ?>
<!-- header_eof //-->
<!-- body //-->
<?php if (defined('TABLE_SHIPPING_RATES')) {?>
  <div class="container-fluid">
    <h1><?= SHIPPING_RATES_HEADING_TITLE ?></h1>
    <div class="list-title">
        <?= SHIPPING_RATES_TITLE ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 configurationColumnLeft">
        <table class="table table-hover table-striped">
            <colgroup>
                <col span="6" style="width: auto;">
                <col style="width: 50%;">
            </colgroup>
            <thead>
            <tr class="dataTableHeadingRow">
                <th class="dataTableHeadingContent"><?= SHIPPING_RATES_ID; ?></th>
                <th class="dataTableHeadingContent text-center"><?= SHIPPING_RATES_PLUGIN_MODULE_LOGO ?></th>
                <th class="dataTableHeadingContent text-center"><?= SHIPPING_RATES_PLUGIN_MODULE_NAME ?></th>
                <th class="dataTableHeadingContent text-center"><?= SHIPPING_RATES_SHIP_METHOD_NAME ?></th>
                <th class="dataTableHeadingContent text-center"><?= SHIPPING_RATES_RATES_APLICATION_DATE ?></th>
                <th class="dataTableHeadingContent text-center"><?= SHIPPING_RATES_PRICE_UPDATE_DATE ?></th>
                <th class="dataTableHeadingContent text-center"><?= SHIPPING_RATES_QUOTE_ARRAY ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($_GET['tid'])) {
                $trf_query_raw = "SELECT *
                            FROM " . TABLE_SHIPPING_RATES . "
                            WHERE id = " . (int)$_GET['tid'];
                $trf_query = $db->Execute($trf_query_raw, 1);
                $tInfo = new objectInfo($trf_query->fields);
            }
            $trf_query_raw = "SELECT t1.id, t1.module, t1.method, t1.imple_date, t1.update_date, t1.quote_zone, t1.quote_header
                                FROM " . TABLE_SHIPPING_RATES . " t1
                                LEFT JOIN (select * FROM " . TABLE_SHIPPING_RATES . " t3 WHERE t3.imple_date <= NOW()) t2 ON t1.method = t2.method AND t1.imple_date < t2.imple_date
                                WHERE t2.imple_date IS NULL
                                ORDER BY t1.module, t1.method ASC
                            ";
            $trf_list = $db->Execute($trf_query_raw);

            if ($trf_list->EOF && (empty($_GET['tid']) || ($_GET['tid'] == $trf_list->fields['id'])) && empty($tInfo)) {
                $tInfo = new objectInfo($trf_list->fields);
            }
            foreach ($trf_list as $item) {
                if ((empty($_GET['tid']) || ($_GET['tid'] == $item['id'])) && empty($tInfo)) {
                    $tInfo = new objectInfo($item);
                }
                if ((isset($tInfo)) && ($item['id'] == $tInfo->id) && isset($_GET['tid'])) {
                    if ($_GET['action'] === 'edit') {
            ?>
            <tr class="dataTableRowSelected" id="rate<?= $item['id'] ?>">
                <?php } else { ?>
            <tr class="dataTableRowSelected" id="rate<?= $item['id'] ?>" onclick="document.location.href = '<?= zen_href_link(FILENAME_SHIPPING_PRICES_VIEW, zen_get_all_get_params(array('tid', 'action')) . 'tid=' . $tInfo->id . '&action=edit#rate' . $tInfo->id) ?>'">
                <?php }} else { ?>
            <tr class="dataTableRow"  id="rate<?=  $item['id'] ?>" onclick="document.location.href = '<?= zen_href_link(FILENAME_SHIPPING_PRICES_VIEW, zen_get_all_get_params(array('tid', 'action')) . 'tid=' . $item['id'] . '#rate' . $item['id']) ?>'">
                <?php
                        }
                ?>
                <td class="dataTableContent"><?= $item['id'] ?></td>
                <td class="dataTableContent text-center"><?=  (array_key_exists($item['module'], $installedPlugins)) ? '<img src="../zc_plugins/' . $item['module'] . '/' . $installedPlugins[$item['module']]['version'] . '/admin/images/icons/' . $item['module'] . '_icon.png" alt="' . $item['module'] . ' logo" style="height:22px; vertical-align: middle">' : SHIPPING_RATES_PLUGIN_NOT_INSTALLED ?></td>
                <td class="dataTableContent text-center"><?= $item['module'] ?></td>
                <td class="dataTableContent text-center"><?= $item['method'] ?></td>
                <?php
                $tr_header = $item['quote_header'] ? json_decode($item['quote_header'], true) : '';
                $tr_array = json_decode($item['quote_zone'], true);
                if ($_GET['action'] === 'edit' && isset($_GET['tid']) && $_GET['tid'] == $item['id']) {
                    echo zen_draw_form('rates_editor_form', FILENAME_SHIPPING_PRICES_VIEW, 'tid=' . (int)$tInfo->id . '&#rate' . (int)$tInfo->id, 'post', 'class="form-horizontal"');
                ?>
                <td class="dataTableContent<?= strtotime($item['imple_date']) > time() ? ' future text-center"><input type="text" id="imple_date" name="imple_date" placeholder="' . zen_date_short($item['imple_date']) . '" value="' . zen_date_short($item['imple_date']) . '">' : ' text-center">' . zen_date_short($item['imple_date']) ?>
                </td>
                <td class="dataTableContent text-center"><?= zen_date_short($item['update_date'])?></td>
                <td class="dataTableContent text-center">
                    <div class="ratescontainer"><table class="rateseditcenter">
                    <?php
                    $rownumb = 0;
                    $columnnumb = 0;
                    if ($item['module'] === 'Yubin' && $item['method'] !== 'Yupack' && $item['method'] !== 'YupackChilled') {
                        if (!empty($tr_header)) { ?>
                            <thead>
                            <tr>
                            <?php
                            foreach($tr_header as $tr_zone) {?>
                            <th><?= defined($tr_zone) ? constant($tr_zone) : $tr_zone ?></th>
                            <?php } ?>
                            </tr>
                            </thead>
                        <?php } ?>
                        <tbody>
                        <?php
                        foreach($tr_array as $rquote) {
                            echo  '<tr>';
                            foreach($rquote as $qprice) {
                                echo '<td><input type="text" id="' . $rownumb . '-' . $columnnumb . '" name="rate[' . $rownumb . '-' . $columnnumb . ']" placeholder="' . $qprice . '" value="' . $qprice . '"></td>';
                                $columnnumb++;
                            }
                            $rownumb++;
                            $columnnumb = 0;
                            echo '</tr>';
                        }
                    } elseif ($item['method'] === 'YupackChilled' || $item['method'] === 'CoolTakyubin') {
                        if (!empty($tr_header)) { ?>
                            <thead>
                            <tr>
                            <th><?= SHIPPING_RATES_SIZE_ONLY_TITLE ?></th>
                            <?php
                            foreach($tr_header as $catSize) {?>
                            <th style="text-align: center;"><?= $catSize ?></th>
                            <?php } ?>
                            </tr>
                            </thead>
                        <?php } ?>
                        <tbody>
                        <tr>
                        <td id="Rate-row-title"><?= SHIPPING_RATES_SIZE_ONLY_RATES ?></td>
                        <?php
                        foreach($tr_array as $rquote) {
                            echo '<td><input type="text" id="0-' . $columnnumb . '" name="rate[0-' . $columnnumb . ']" placeholder="' . $rquote . '" value="' . $rquote . '"></td>';
                            $columnnumb++;
                        }
                        $columnnumb = 0; ?>
                        </tr>
                    <?php
                    } else {
                        if (!empty($tr_header)) {
                            echo '<thead>';
                            foreach($tr_header as $key => $value) {
                                echo '<tr><th>' . constant($key) . ' </th>';
                                foreach($value as $catSize) {
                                    echo '<th>' . (defined($catSize) ? constant($catSize) : $catSize) . '</th>';
                                }
                                echo '</tr>';
                            }
                            echo '</thead>';
                        }
                        echo '<tbody>';
                        foreach($tr_array as $key => $rquote) {
                            echo '<tr><td>' . $key . ': </td>';
                            foreach($rquote as $qprice) {
                                echo '<td><input type="text" id="' . $rownumb . '-' . $columnnumb . '" name="rate[' . $rownumb . '-' . $columnnumb . ']" placeholder="' . $qprice . '" value="' . $qprice . '"></td>';
                                $columnnumb++;
                            }
                            $rownumb++;
                            $columnnumb = 0;
                            echo '</tr>';
                        }
                    }
                    ?>
                    </tbody>
                    </table>
                    <input type="hidden" name="tid" value="<?= $item['id'] ?>">
                    <input type="hidden" name="module" value="<?= $item['module'] ?>">
                    <input type="hidden" name="method" value="<?= $item['method'] ?>">
                    </div>
                    <input type="submit" value="<?= IMAGE_SAVE ?>" name="saverates" class="btn btn-primary">
                    </form>
                    <?php
                    echo '&nbsp;&nbsp;<a id="Canceledit" href="' . zen_href_link(FILENAME_SHIPPING_PRICES_VIEW, (isset($_GET['page']) ? 'page=' . $_GET['page'] . '&' : '') . 'tid=' . (int)$tInfo->id . '#rate' . (int)$tInfo->id) . '" class="btn btn-primary" role="button">' . IMAGE_CANCEL . '</a></td>';
                } else {?>
                <td class="dataTableContent<?= (strtotime($item['imple_date']) > time() ? ' future' : '') ?> text-center"><?= zen_date_short($item['imple_date']) ?></td>
                <td class="dataTableContent text-center"><?= zen_date_short($item['update_date'])?></td>
                <td class="dataTableContent text-center">
                <?php
                    if ((isset($tInfo)) && ($item['id'] == $tInfo->id) && isset($_GET['tid'])) {
                        echo '<div class="ratescontainer"><table class="ratescenter">';
                        if ($item['module'] === 'Yubin' && $item['method'] !== 'Yupack' && $item['method'] !== 'YupackChilled') {
                            if (!empty($tr_header)) { ?>
                                <thead>
                                <tr>
                                <?php
                                foreach($tr_header as $tr_zone) {?>
                                <th><?= defined($tr_zone) ? constant($tr_zone) : $tr_zone ?></th>
                                <?php } ?>
                                </tr>
                                </thead>
                            <?php } ?>
                            <tbody>
                            <?php
                            foreach($tr_array as $rquote) {
                                echo  '<tr>';
                                foreach($rquote as $qprice) {
                                    echo '<td>' . $qprice . '</td>';
                                }
                                echo '</tr>';
                            }
                        } elseif ($item['method'] === 'YupackChilled' || $item['method'] === 'CoolTakyubin') {
                            if (!empty($tr_header)) { ?>
                                <thead>
                                <tr>
                                <th><?= SHIPPING_RATES_SIZE_ONLY_TITLE ?></th>
                                <?php
                                foreach($tr_header as $catSize) {?>
                                <th><?= $catSize ?></th>
                                <?php } ?>
                                </tr>
                                </thead>
                            <?php } ?>
                            <tbody>
                            <tr>
                            <td id="Rate-row-title"><?= SHIPPING_RATES_SIZE_ONLY_RATES ?></td>
                            <?php
                            foreach($tr_array as $rquote) {
                                echo '<td>' . $rquote . '</td>';
                            }
                            echo  '</tr>';
                        } else {
                            if (!empty($tr_header)) {
                                echo '<thead>';
                                foreach($tr_header as $key => $value) {
                                    echo '<tr><th>' . constant($key) . ' </th>';
                                    foreach($value as $catSize) {
                                        echo '<th>' . (defined($catSize) ? constant($catSize) : $catSize) . '</th>';
                                    }
                                    echo '</tr>';
                                }
                                echo '</thead>';
                            }
                            echo '<tbody>';
                            foreach($tr_array as $key=>$rquote) {
                                echo '<tr><td>' . $key . ': </td>';
                                foreach($rquote as $qprice) {
                                    echo '<td>' . $qprice . '</td>';
                                }
                                echo '</tr>';
                            }
                        }
                        echo '</tbody></table></div>';
                    }
                }
                    ?>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php } else {?>
    <div class="no-plugin">
    <?= SHIPPING_RATES_NO_PLUGIN ?>
    </div>
<?php }?>
<!-- body_eof //-->
  </div>
<!-- footer //-->
    <?php require DIR_WS_INCLUDES . 'footer.php'; ?>
<!-- footer_eof //-->
</body>
</html>
    <?php require DIR_WS_INCLUDES . 'application_bottom.php'; ?>
