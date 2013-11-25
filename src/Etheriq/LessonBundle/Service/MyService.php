<?php
/**
 * Created by PhpStorm.
 * File: MyService.php
 * User: Yuriy Tarnavskiy
 * Date: 25.11.13
 * Time: 11:00
 */

namespace Etheriq\LessonBundle\Service;


class MyService
{
    protected $name;
    protected $surname;

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    public function __construct($name, $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
    }

    public function showInfo()
    {
        return "My name is ".$this->getName()." and surname is ".$this->getSurname();
    }
} 