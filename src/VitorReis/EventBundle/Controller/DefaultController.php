<?php

namespace VitorReis\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('EventBundle:Event');

        $event = $repo->findOneBy(array(
            'name' => 'Darth\'s surprise birthday party'));

        return $this->render(
            'EventBundle:Default:index.html.twig', 
            array(
                'name' => $name,
                'event' => $event
                )
            );
        /*
        $array = array(
            'name' => $name,
            'xpto' => 'It\'s a traaaaap!');

        $json = json_encode($array);

        $response = new Response($json);

        $response->headers->set('Content-Type', 'application/json');

        return $response;
        /*/
    }
}
