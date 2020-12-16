<?php


namespace Algo_06;


class LinkedListNode
{
    public $data;

    public $next;

    public function __construct($data = null)
    {
        $this->data = $data;
        $this->next = null;
    }
}
