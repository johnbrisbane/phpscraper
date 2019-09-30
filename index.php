<?php

//https://www.smartcitiesdive.com/topic/energy-and-utilities/

use Clue\React\Buzz\Browser;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\DomCrawler\Crawler;

require __DIR__ . '/vendor/autoload.php';

$loop = \React\EventLoop\Factory::create();

$browser = new Browser($loop);
$browser
    ->get('https://www.smartcitiesdive.com/topic/energy-and-utilities/')
    ->then(function (\Psr\Http\Message\ResponseInterface $response) {

      $crawler = new Crawler((string) $response->getBody());


      $title = trim($crawler->filter('ul.feed')->text());
      //$link = $crawler->filter('.btn_primary.btn--lg.btn--splitted a');
      //$source = $link->('href');
      //$id = $link->attr('data-id');

      print_r([
        $title,
        //$resolution,
        //$source,
        //$id
      ]);


      //echo $response->getBody() . PHP_EQL;
    });

    $loop->run();

 ?>
