<?php
/**
 * Created by PhpStorm.
 * File: MainController.php
 * User: Yuriy Tarnavskiy
 * Date: 24.11.13
 * Time: 20:26
 * To change this template use File | Settings | File Templates.
 */

namespace Etheriq\LessonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    public function showHomePageAction()
    {
        return $this->render('EtheriqLessonBundle:Pages:homePage.html.twig');
    }

    public function srvMyService1Action()
    {
        $srv1 = $this->container->get('mySimplyService');
        $toShow = $srv1->showInfo();
        return $this->render('EtheriqLessonBundle:Pages:srvMyService.html.twig', array('data' => $toShow));
    }

    public function srvMyFinderAction()
    {
        $srv = $this->container->get('myFinder');
        $find = array();
        //$srv->setInDir('/var/www');
        $results = $srv->showResult();
        foreach ($results as $item)
        {
            $find[] = $item->getFilename();
        }

        return $this->render('EtheriqLessonBundle:Pages:myFinder.html.twig', array(
            'findData' => $find,
            'findPath' => $srv->getInDir()
        ));
    }
} 