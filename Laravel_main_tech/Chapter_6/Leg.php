<?php


namespace LaravelMainTech\Chapter_6;


class Leg implements Visit
{
    public function go()
    {
        echo "Walking to Tibet.";
    }
}