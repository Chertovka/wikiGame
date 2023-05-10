<?php
namespace Player;
class Player
{
    private $name;
    private $current;
    private $finish;
    private $steps;

    public function __construct($name, $current, $finish)
    {
        $this->name = $name;
        $this->current = $current;
        $this->finish = $finish;
        $this->steps = 0;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCurrent()
    {
        return $this->current;
    }

    public function getFinish()
    {
        return $this->finish;
    }

    public function getSteps()
    {
        return $this->steps;
    }

    public function move($page)
    {
        $this->current = $page->getTitle();
        $this->steps++;
    }
}