<?php
declare(strict_types=1); //composer serve -> sito

use App\App;
use App\Http\Request;

require __DIR__ . '/../vendor/autoload.php';

$app = new App();
$request = Request::fromGlobals(); //static;;
$response = $app->handle($request);

$response->send();
