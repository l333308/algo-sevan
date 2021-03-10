<?php
namespace LaravelMainTech;
require_once '../vendor/autoload.php';


class Traveller
{
    protected $trafficTool;
    
    public function __construct()
    {
        // 产生依赖
        $this->trafficTool = new Car();
    }

    public function visitTibet()
    {
        $this->trafficTool->go();
    }
}

$traveller = new Traveller();
$traveller->visitTibet();