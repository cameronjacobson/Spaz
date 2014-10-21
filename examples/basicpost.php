<?php

require_once(dirname(__DIR__).'/vendor/autoload.php');

use Spaz\ApplicationServer;
use Spaz\SilexApp;

$app = new SilexApp();

$app->post('/hello', function() use($app) { 
    return 'Hello '.$app['request']->get('name');
}); 


echo 'NOW RUN THIS FROM COMMAND LINE:'.PHP_EOL;
echo '> curl -XPOST http://localhost:8888/hello -d "name=YOURNAME"'.PHP_EOL;

$server = new ApplicationServer('0.0.0.0',8888,$app);
$server->run();
