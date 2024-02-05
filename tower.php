<?php

function towerBuilder($n)
{
    $tower = new Tower($n);
    return $tower->build();
}

class Tower 
{
    protected $height;
    protected $tower = [];

    public function __construct(int $height)
    {
        $this->height = $height;
    }

    public function build()
    {
        for ($i = 0; $i < $this->height; $i++) 
        {
            $this->tower[] = $this->addFloor($i);
        }

        return $this->tower;
    }

    protected function addFloor(int $floor)
    {
        $result = "";
        $result .= $this->addMargin($floor);
        $result .= $this->addBricks($floor);
        $result .= $this->addMargin($floor);

        return $result;
    }

    protected function addMargin(int $floor)
    {
        $margin = str_repeat(" ", $this->height - $floor - 1);
        return $margin;
    }

    protected function addBricks(int $floor)
    {
        $bricks = str_repeat("*", 2 * $floor + 1);
        return $bricks;
    }
}

// Example
$n = 3;
$result = towerBuilder($n);

foreach ($result as $floor)
{
    echo $floor;
}