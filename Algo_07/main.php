<?php

namespace Algo_07;
require_once '../vendor/autoload.php';


use Algo_06\LinkedList;
use Algo_06\LinkedListNode;

Class SingleLinkedListAlgo{
    /**
     * 单链表
     * @var
     */
    public $list;


    public function __construct(LinkedList $list = null)
    {
        $this->list = $list;
    }

    public function setList(LinkedList $list)
    {
        $this->list = $list;
    }

    public function reverse()
    {
        $head = $this->list->head;

        $pre = null;
        $cur = $head->next;
        $next = null;

        while (null != $cur){
            $next = $cur->next;
            $cur->next = $pre;
            $pre = $cur;
            $cur = $next;
        }

        $head->next = $pre;

        return true;
    }

    public function checkHasCircle()
    {

    }
}



echo '------------------单链表反转------------------';
echo PHP_EOL;
$head = new LinkedListNode();
$linkedList = new LinkedList($head);
$linkedList->insert(1);
$linkedList->insert(2);
$linkedList->insert(3);
$linkedList->insert(4);
$linkedList->insert(5);
$linkedList->insert(6);
$linkedList->insert(7);
$listAlgo = new SingleLinkedListAlgo($linkedList);
$listAlgo->list->printListSimple();
$listAlgo->reverse();
$listAlgo->list->printListSimple();


echo '------------------单链表环的检测------------------';
echo PHP_EOL;
