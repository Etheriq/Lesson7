<?php
/**
 * Created by PhpStorm.
 * File: MyMailSender.php
 * User: Yuriy Tarnavskiy
 * Date: 25.11.13
 * Time: 23:12
 * To change this template use File | Settings | File Templates.
 */

namespace Etheriq\LessonBundle\Service;

class MyMailSender
{
    protected $mailer;
    protected $sendTo;
    protected $sendFrom;
    protected $subjuctMessage;
    protected $textMessage;

    /**
     * @param mixed $sendFrom
     */
    public function setSendFrom($sendFrom)
    {
        $this->sendFrom = $sendFrom;
    }

    /**
     * @return mixed
     */
    public function getSendFrom()
    {
        return $this->sendFrom;
    }

    /**
     * @param mixed $sendTo
     */
    public function setSendTo($sendTo)
    {
        $this->sendTo = $sendTo;
    }

    /**
     * @return mixed
     */
    public function getSendTo()
    {
        return $this->sendTo;
    }

    /**
     * @param mixed $subjuctMessage
     */
    public function setSubjuctMessage($subjuctMessage)
    {
        $this->subjuctMessage = $subjuctMessage;
    }

    /**
     * @return mixed
     */
    public function getSubjuctMessage()
    {
        return $this->subjuctMessage;
    }

    /**
     * @param mixed $textMessage
     */
    public function setTextMessage($textMessage)
    {
        $this->textMessage = $textMessage;
    }

    /**
     * @return mixed
     */
    public function getTextMessage()
    {
        return $this->textMessage;
    }



    public function initMailer(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function configureMailMessage($settings)
    {
        $this->sendTo = $settings['sendTo'];
        $this->sendFrom = $settings['sendFrom'];
        $this->subjuctMessage = $settings['subjectMessage'];
        $this->textMessage = $settings['textMessage'];
    }

    public function sendMessage()
    {
        $message = \Swift_Message::newInstance()
            ->setSubject($this->getSubjuctMessage())
            ->setFrom($this->getSendFrom())
            ->setTo($this->getSendTo())
            ->setBody($this->getTextMessage());

        $this->mailer->send($message);
    }

} 