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

// All setup done

/*
$templating = $container->get('templating');

echo $templating->render(
    'EventBundle:Default:index.html.twig',
    array('name' => 'Vader')
);
*/

use VitorReis\EventBundle\Entity\Event;

$event = new Event();
$event->setName('Darth\'s surprise birthday party');
$event->setLocation('Deathstar');
$event->setTime(new \Datetime('tomorrow noon'));
//$event->setDetails('Darth hates surprises');

$em = $container->get('doctrine')->getManager();
$em->persist($event);
$em->flush();
