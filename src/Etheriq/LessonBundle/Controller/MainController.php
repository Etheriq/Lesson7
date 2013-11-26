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
use Symfony\Component\HttpFoundation\Request;
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
        $request = Request::createFromGlobals();
        $post = $request->request->all();
        $srv = $this->container->get('myFinder');
        if ($post) {
            $dir = $post['dirPath'];
            if ($dir != null) {
                $srv->setInDir($dir);
            } else {
                $srv->setInDir('../src/Etheriq/LessonBundle/Resources');
            }
        }
        $findData = array();
        $pathToShow = $srv->showResult();
        foreach ($pathToShow as $item)
        {
            $findData[] = array(
                'name' => $item->getFilename(),
                'size' => $item->getSize(),
                'type' => $item->getType()
            );
        }

        return $this->render('EtheriqLessonBundle:Pages:myFinder.html.twig', array(
            'findData' => $findData,
            'findPath' => $srv->getInDir()
        ));
    }

    public function showFormMailSendAction()
    {
        return $this->render('EtheriqLessonBundle:Pages:mySendMailForm.html.twig');
    }

    public function mailSenderAction()
    {
        $request = Request::createFromGlobals();
        $post = $request->request->all();

        if ($post) {
            $settings['sendTo'] = trim($post['sentTo']);
            $settings['sendFrom'] = 'nobody@example.com';
            $settings['subjectMessage'] = trim($post['sentSubject']);
            $settings['textMessage'] = trim($post['bodyMessage']);

            $myMailer = $this->container->get('myMailSend');
            $myMailer->configureMailMessage($settings);
            $myMailer->sendMessage();

            return $this->render('EtheriqLessonBundle:Pages:mySendMailResult.html.twig', array(
                'status' => 1,
                'mailTo' => $myMailer->getSendTo(),
                'subject' => $myMailer->getSubjuctMessage()
            ));
        } else {

            return $this->render('EtheriqLessonBundle:Pages:mySendMailResult.html.twig', array(
                'status' => 2
            ));
        }

    }
} 