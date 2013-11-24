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

class MainController extends Controller
{
    public function showHomePageAction()
    {
        return $this->render('EtheriqLessonBundle:Pages:homePage.html.twig');
    }
} 