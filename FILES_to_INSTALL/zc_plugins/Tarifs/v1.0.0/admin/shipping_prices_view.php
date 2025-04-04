<?php

require 'includes/application_top.php';
$languages = zen_get_languages();
if (!isset($_GET['action'])) {
    $_GET['action'] = '';
}
if (isset($_GET['tid'])) {
    $_GET['tid'] = (int)$_GET['tid'];
}

if (isset($_POST['savetarifs'])) {
    $i = 0;
    $j = 0;
    while (isset($_POST['tarif'][$i . '-' . $j])) {
        if ($_POST['module'] === 'Yubin' && $_POST['method'] !== 'Yupack') {
            if ($j == 0) {
                $newtarifs_key = $i;
            }
        } else {
            $newtarifs_key = ($i <= 9) ? 'N0' . $i + 1 : 'N' . $i + 1;
        }
        while (isset($_POST['tarif'][$i . '-' . $j])) {
            $newtarifs[$newtarifs_key][] = $_POST['tarif'][$i . '-' . $j];
            $j++;
        }
        $i++;
        $j = 0;
    }
    $tarifs_update = 
        "UPDATE " . TABLE_TARIFS . " t1
        SET t1.update_date = NOW(), t1.quote_zone = '" . json_encode($newtarifs) . "'
        WHERE id = :tid:
        ";
    $tarifs_update = $db->bindVars($tarifs_update, ':tid:', $_POST['tid'], 'integer');
    $db->Execute($tarifs_update);
}

?>
<!doctype html>
<html <?= HTML_PARAMS ?>>
<head>
    <?php require DIR_WS_INCLUDES . 'admin_html_head.php'; ?>
<style> 
    input[type=text] {
        width: 4em;
        box-sizing: border-box;
        border: none;
    }
    .list-title {
        padding-left:50px;
        padding-top: 10px;
        padding-bottom: 10px;
        font-size: 12px;
        font-weight: bold;
    }
    .tarifscontainer {
        margin: auto;
        width: 100%;
        padding: 10px;
        text-align: center;
    }
    .tarifscenter {
        margin: auto;
        padding: 10px;
    }
    .tarifseditcenter {
        margin: auto;
        border: 3px solid green;
        padding: 10px;
    }
    .future {
        color: red;
    }
</style>
</head>
<body>
<!-- header //-->
    <?php require DIR_WS_INCLUDES . 'header.php'; ?>
<!-- header_eof //-->
<!-- body //-->
    <div class="list-title">
        <?= TARIFS_TITLE; ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 configurationColumnLeft">
        <table class="table table-hover table-striped">
            <thead>
            <tr class="dataTableHeadingRow">
                <th class="dataTableHeadingContent"><?= TARIF_ID; ?></th>
                <th class="dataTableHeadingContent text-center"><?= PLUGIN_MODULE_NAME; ?></th>
                <th class="dataTableHeadingContent text-center"><?= SHIP_METHOD_NAME; ?></th>
                <th class="dataTableHeadingContent text-center"><?= RATES_APLICATION_DATE; ?></th>
                <th class="dataTableHeadingContent text-center"><?= PRICE_UPDATE_DATE; ?></th>
                <th class="dataTableHeadingContent text-center"><?= QUOTE_ARRAY; ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($_GET['tid'])) {
                $trf_query_raw = "SELECT *
                            FROM " . TABLE_TARIFS . "
                            WHERE id = " . (int)$_GET['tid'];
                $trf_query = $db->Execute($trf_query_raw, 1);
                $tInfo = new objectInfo($trf_query->fields);
            }
            $trf_query_raw = "SELECT t1.id, t1.module, t1.method, t1.imple_date, t1.update_date, t1.quote_zone
                                FROM " . TABLE_TARIFS . " t1
                                LEFT JOIN (select * FROM " . TABLE_TARIFS . " t3 WHERE t3.imple_date <= NOW()) t2 ON t1.method = t2.method AND t1.imple_date < t2.imple_date
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
            <tr class="dataTableRowSelected" id="tarif<?= $item['id']; ?>">
                <?php } else { ?>
            <tr class="dataTableRowSelected" id="tarif<?= $item['id']; ?>" onclick="document.location.href = '<?= zen_href_link(FILENAME_SHIPPING_PRICES_VIEW, zen_get_all_get_params(array('tid', 'action')) . 'tid=' . $tInfo->id . '&action=edit#tarif' . $tInfo->id); ?>'">
                <?php }} else { ?>
            <tr class="dataTableRow"  id="tarif<?=  $item['id']; ?>" onclick="document.location.href = '<?= zen_href_link(FILENAME_SHIPPING_PRICES_VIEW, zen_get_all_get_params(array('tid', 'action')) . 'tid=' . $item['id'] . '#tarif' . $item['id']); ?>'">
                <?php
                        }
                ?>
                <td class="dataTableContent"><?= $item['id']; ?></td>
                <td class="dataTableContent text-center"><?= $item['module']; ?></td>
                <td class="dataTableContent text-center"><?= $item['method']; ?></td>
                <td class="dataTableContent<?= (strtotime($item['imple_date']) > time() ? ' future' : ''); ?> text-center"><?= zen_date_short($item['imple_date']); ?></td>
                <td class="dataTableContent text-center"><?= zen_date_short($item['update_date']);?></td>
                <td class="dataTableContent text-center">
                <?php
                $tr_array = json_decode($item['quote_zone'], true);
                if ($_GET['action'] === 'edit' && isset($_GET['tid']) && $_GET['tid'] == $item['id']) {
                    echo zen_draw_form('tarifs_editor_form', FILENAME_SHIPPING_PRICES_VIEW, 'tid=' . (int)$tInfo->id . '&#tarif' . (int)$tInfo->id, 'post', 'class="form-horizontal"');
                ?>
                    <div class="tarifscontainer"><table class="tarifseditcenter">
                    <?php
                    $rownumb = 0;
                    $columnnumb = 0;
                    if ($item['module'] === 'Yubin' && $item['method'] !== 'Yupack') {
                        foreach($tr_array as $rquote) {
                            echo  '<tr>';
                            foreach($rquote as $qprice) {
                                echo '<td><input type="text" id="' . $rownumb . '-' . $columnnumb . '" name="tarif[' . $rownumb . '-' . $columnnumb . ']" placeholder="' . $qprice . '" value="' . $qprice . '"></td>';
                                $columnnumb++;
                            }
                            $rownumb++;
                            $columnnumb = 0;
                            echo '</tr>';
                        }
                    } else {
                        foreach($tr_array as $key=>$rquote) {
                            echo '<tr><td>' . $key . ': </td>';
                            foreach($rquote as $qprice) {
                                echo '<td><input type="text" id="' . $rownumb . '-' . $columnnumb . '" name="tarif[' . $rownumb . '-' . $columnnumb . ']" placeholder="' . $qprice . '" value="' . $qprice . '"></td>';
                                $columnnumb++;
                            }
                            $rownumb++;
                            $columnnumb = 0;
                            echo '</tr>';
                        }
                    }
                    ?>
                    <input type="hidden" name="tid" value="<?= $item['id'] ?>">
                    <input type="hidden" name="module" value="<?= $item['module'] ?>">
                    <input type="hidden" name="method" value="<?= $item['method'] ?>">
                    </table>
                    </div>
                    <input type="submit" value="<?= IMAGE_SAVE ?>" name="savetarifs" class="btn btn-primary">
                    </form>
                    <?php
                    echo '&nbsp;&nbsp;<a id="Canceledit" href="' . zen_href_link(FILENAME_SHIPPING_PRICES_VIEW, (isset($_GET['page']) ? 'page=' . $_GET['page'] . '&' : '') . 'tid=' . (int)$tInfo->id . '#tarif' . (int)$tInfo->id) . '" class="btn btn-primary" role="button">' . IMAGE_CANCEL . '</a>';
                } else {
                    if ((isset($tInfo)) && ($item['id'] == $tInfo->id) && isset($_GET['tid'])) {
                        echo '<div class="tarifscontainer"><table class="tarifscenter">';
                        if ($item['module'] === 'Yubin' && $item['method'] !== 'Yupack') {
                            foreach($tr_array as $rquote) {
                                echo  '<tr>';
                                foreach($rquote as $qprice) {
                                    echo '<td>' . $qprice . '</td>';
                                }
                                echo '</tr>';
                            }
                        } else {
                            foreach($tr_array as $key=>$rquote) {
                                echo '<tr><td>' . $key . ': </td>';
                                foreach($rquote as $qprice) {
                                    echo '<td>' . $qprice . '</td>';
                                }
                                echo '</tr>';
                            }
                        }
                        echo '</table></div>';
                    }
                }
                    ?>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
<!-- body_eof //-->
<!-- footer //-->
    <?php require DIR_WS_INCLUDES . 'footer.php'; ?>
<!-- footer_eof //-->
</body>
</html>
    <?php require DIR_WS_INCLUDES . 'application_bottom.php'; ?>
