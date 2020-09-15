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
        $fast = $slow = $this->list->head->next;

        while (null != $fast && null != $fast->next){
            $fast = $fast->next->next;
            $slow = $slow->next;

            if ($fast === $slow){
                return true;
            }
        }

        return false;
    }

    public function mergerSortedList(LinkedList $listA, LinkedList $listB)
    {
        // 用以构造新链表的头结点
        $listNewNode = new LinkedListNode();
        $listNew = new LinkedList($listNewNode);
        $tempNode = $listNew->head;

        $nodeA = $listA->head->next;
        $nodeB = $listB->head->next;

        while (null != $nodeA && null != $nodeB){
            if ($nodeA->data <= $nodeB->data){
                $tempNode->next = $nodeA;
                $nodeA = $nodeA->next;
            }else{
                $tempNode->next = $nodeB;
                $nodeB = $nodeB->next;
            }

            // 指针后移
            $tempNode = $tempNode->next;
        }

        // 遍历结束后 非空链表后面部分拼接上
        if (null != $nodeA){
            $tempNode->next = $nodeA;
        }

        if (null != $nodeB){
            $tempNode->next = $nodeB;
        }

        $this->list = $listNew;
    }

    /**
     * 删除链表倒数第n个结点
     *
     * @param $index
     *
     * @return bool
     */
    public function deleteLastKth($index)
    {
        // TODO 不会写
    }

    /**
     * 寻找中间节点
     *
     * 快慢指针遍历
     *
     * @return \Algo_06\SingleLinkedListNode|bool|null
     */
    public function findMiddleNode()
    {
        $fast = $slow = $this->list->head->next;

        while ($fast != null && $fast->next != null){
            $fast = $fast->next->next;
            $slow = $slow->next;
        }
        
        return $slow->data;
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
echo PHP_EOL;

echo '------------------单链表环的检测------------------';
echo PHP_EOL;
$circleList = new LinkedList(new LinkedListNode());
$circleList->buildHasCircleList();
$circleListAlgo = new SingleLinkedListAlgo($circleList);
var_dump($listAlgo->checkHasCircle());
echo PHP_EOL;
var_dump($circleListAlgo->checkHasCircle());
echo PHP_EOL;

echo '------------------两个有序链表合并------------------';
echo PHP_EOL;
$listAHead = new LinkedListNode();
$listA = new LinkedList($listAHead);
$listA->insert(12);
$listA->insert(11);
$listA->insert(8);
$listA->insert(6);
$listA->insert(3);
$listA->printListSimple();
echo PHP_EOL;

$listBHead = new LinkedListNode();
$listB = new LinkedList($listBHead);
$listB->insert(24);
$listB->insert(18);
$listB->insert(12);
$listB->insert(3);
$listB->insert(1);
$listB->printListSimple();
echo PHP_EOL;

$listAlgo = new SingleLinkedListAlgo();
$listAlgo->mergerSortedList($listA, $listB);
$listAlgo->list->printListSimple();
echo PHP_EOL;

echo '------------------删除倒数第N个结点------------------';
echo PHP_EOL;
echo 'TODO 还不会写';
echo PHP_EOL;
echo PHP_EOL;


echo '------------------寻找中间结点------------------';
echo PHP_EOL;
$listAlgo->list->printListSimple();
echo $listAlgo->findMiddleNode();

