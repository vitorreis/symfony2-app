<?php
// src/VitorReis/EventBundle/DataFixtures/ORM/LoadEventData.php

namespace VitorReis\EventBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use VitorReis\EventBundle\Entity\Event;

class LoadEventData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $event1 = new Event();
        $event1->setName('Darth\'s surprise birthday party');
        $event1->setLocation('Deathstar');
        $event1->setTime(new \Datetime('tomorrow noon'));
        $event1->setDetails('Darth hates surprises');
        $manager->persist($event1);

        $event2 = new Event();
        $event2->setName('Ewoks Happyhour');
        $event2->setLocation('Dilma house');
        $event2->setTime(new \Datetime('tomorrow noon'));
        $event2->setDetails('bring your own beer');
        $manager->persist($event2);
        
        $manager->flush();
    }
}
