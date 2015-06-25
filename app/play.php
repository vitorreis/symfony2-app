<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

$loader = require_once __DIR__.'/bootstrap.php.cache';
Debug::enable();

require_once __DIR__.'/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$kernel->boot();

$container = $kernel->getContainer();
$container->enterScope('request');
$container->set('request', $request);

$templating = $container->get('templating');

echo $templating->render(
    'EventBundle:Default:index.html.twig',
    array('name' => 'Vader')
);