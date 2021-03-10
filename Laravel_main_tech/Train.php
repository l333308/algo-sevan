<?php


namespace LaravelMainTech;


class Train implements Visit
{
    public function go()
    {
        echo "Go to Tibet by train.";
    }
}