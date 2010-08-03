<h1>dibi logger example</h1>
<?php

require_once 'Nette/Debug.php';
require_once '../dibi/dibi.php';

date_default_timezone_set('Europe/Prague');


dibi::connect(array(
	'driver'   => 'sqlite',
	'database' => 'data/sample.sdb',
	'profiler' => TRUE,
));


// enable log to this file
dibi::getProfiler()->setFile('data/log.sql');



try {
	$res = dibi::query('SELECT * FROM [customers] WHERE [customer_id] = %i', 1);

	$res = dibi::query('SELECT * FROM [customers] WHERE [customer_id] < %i', 5);

	$res = dibi::query('SELECT FROM [customers] WHERE [customer_id] < %i', 38);

} catch (DibiException $e) {
	echo '<p>', get_class($e), ': ', $e->getMessage(), '</p>';
}


echo "<h2>File data/log.sql:</h2>";

echo '<pre>', file_get_contents('data/log.sql'), '</pre>';
