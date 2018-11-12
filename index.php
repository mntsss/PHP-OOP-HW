<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

$loader = new Twig_Loader_Filesystem('View', __DIR__ . '/src/Weather');
$twig = new Twig_Environment($loader, ['cache' => __DIR__ . '/cache', 'debug' => true]);

$controller = new \Weather\Controller\StartPage();
/*
* Routing:
* if 1st parameter  == 'week', takes second parameter as a provider (defaults to GoogleApi if none given) and shows week weather
* when first parameter != 'week', it's considered as a provider for day weather.
* If there aren't any parameters, defaults to today weather and google provider.
*/
$trimmed_URL = ltrim(mb_strtolower($request->getRequestUri()), "/");
$url = explode('/',$trimmed_URL);
switch ($url[0]) {
    case 'week':
      if(isset($url[1]))
          $renderInfo = $controller->getWeekWeather($url[1]);
      else{
          $renderInfo = $controller->getWeekWeather();
      }
      break;
    default:
      if(isset($url[1]))
          $renderInfo = $controller->getTodayWeather($url[1]);
      else{
          $renderInfo = $controller->getTodayWeather();
      }
    break;
}

$renderInfo['context']['resources_dir'] = '/src/Weather/Resources';

$content = $twig->render($renderInfo['template'], $renderInfo['context']);

$response = new Response(
    $content,
    Response::HTTP_OK,
    array('content-type' => 'text/html')
);
//$response->prepare($request);
$response->send();
