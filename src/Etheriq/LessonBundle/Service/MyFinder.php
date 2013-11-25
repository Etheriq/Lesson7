<?php
/**
 * Created by PhpStorm.
 * File: MyFinder.php
 * User: Yuriy Tarnavskiy
 * Date: 25.11.13
 * Time: 15:21
 */

namespace Etheriq\LessonBundle\Service;

use Symfony\Component\Finder\Finder;

class MyFinder
{
    protected $name;
    protected $depth;
    protected $size;
    protected $inDir;
    protected $finder;

    public function __construct($name, $depth, $size, $inDir)
    {
        $this->name = $name;
        $this->depth = $depth;
        $this->size = $size;
        $this->inDir = $inDir;
    }

    /**
     * @param mixed $inDir
     */
    public function setInDir($inDir)
    {
        $this->inDir = $inDir;
    }

    /**
     * @return mixed
     */
    public function getInDir()
    {
        return $this->inDir;
    }

    /**
     * @param mixed $depth
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;
    }

    /**
     * @return mixed
     */
    public function getDepth()
    {
        return $this->depth;
    }

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
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    public function initFinder()
    {
        $this->finder = new Finder();
    }

    public function showResult()
    {
        return $text = $this->finder->name($this->getName())->depth($this->getDepth())->size($this->getSize())->in($this->getInDir());
    }

} 