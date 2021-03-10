<?php


namespace LaravelMainTech\Chapter_6;


class Train implements Visit
{
    public function go()
    {
        echo "Go to Tibet by train.";
    }
}