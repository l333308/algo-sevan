<?php


namespace LaravelMainTech;

class Car implements Visit
{
    public function go()
    {
        echo "Driving a car to Tibet.";
    }
}