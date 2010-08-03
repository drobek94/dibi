<h1>dibi import SQL dump example</h1>
<pre>
<?php

require_once 'Nette/Debug.php';
require_once '../dibi/dibi.php';


dibi::connect(array(
	'driver'   => 'sqlite',
	'database' => 'data/sample.sdb',
));


$count = dibi::loadFile('compress.zlib://data/sample.dump.sql.gz');

echo 'Number of SQL commands:', $count;