<?php


namespace Algo_06;


class LinkedListNode
{
    /**
     * 结点数据域
     * @var
     */
    public $data;

    /**
     * 结点指针域
     * @var
     */
    public $next;

    public function __construct($data = null)
    {
        $this->data = $data;
        $this->next = null;
    }
}
