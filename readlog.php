<?php
// $dateLog = dirname(__FILE__) . date('d-m-Y') . '-error.log';
$dateLog = '/home/kientaotuonglai.com.vn/public_html/storage/logs/laravel-' . ((isset($_REQUEST['date']) && $_REQUEST['date']) ? $_REQUEST['date'] : date('Y-m-d')) . '.log';

if ($_REQUEST['clear']) {
	file_put_contents($dateLog, "");
}

echo '<pre>';
echo file_get_contents($dateLog);