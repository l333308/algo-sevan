<?php


namespace LaravelMainTech\Chapter_6;

class Car implements Visit
{
    public function go()
    {
        echo "Driving a car to Tibet.";
    }
}