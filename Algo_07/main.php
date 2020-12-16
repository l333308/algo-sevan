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

        $prev = null;
        $cur = $head->next;
        $next = null;

        while ($cur != null){
            $next = $cur->next;

            // 指向翻转
            $cur->next = $prev;

            // prev、cur各后移一位
            $prev = $cur;
            $cur = $next;
        }
        
        // head指向翻转后链表的第一个结点
        $head->next = $prev;
        
        return true;
    }

    public function checkHasCircle()
    {
        if ($this->list->head->next == null){
            return false;
        }

        $slow = $this->list->head;
        $fast = $this->list->head;

        while ($fast != null && $fast->next != null){
            $slow = $slow->next;
            $fast = $fast->next->next;
            if ($fast === $slow){
                return true;
            }
        }
        
        return false;
    }

    public function mergerSortedList(LinkedList $listA, LinkedList $listB)
    {
        // 创建新链表
        $newList = new LinkedList();
        // 记录新链表最新结点 用以最后拼接未遍历完的链表
        $newListCurNode = $newList->head;

        // 两链表分别取指针
        $pointerA = $listA->head->next;
        $pointerB = $listB->head->next;

        // 比较结点值大小
        while ($pointerA != null && $pointerB != null){
            if ($pointerA->data <= $pointerB->data){
                $newNode = new LinkedListNode($pointerA->data);
                $pointerA = $pointerA->next;
            }else{
                $newNode = new LinkedListNode($pointerB->data);
                $pointerB = $pointerB->next;
            }

            // 新结点拼接到新链表末尾
            $newListCurNode->next = $newNode;

            // 更新新链表最新结点 $newListCurNode
            $newListCurNode = $newNode;
        }

        // 拼接未遍历完的链表
        if (null == $pointerA){
            $newListCurNode->next = $pointerB;
        }
        if (null == $pointerB){
            $newListCurNode->next = $pointerA;
        }

        $this->list = $newList;

        return $newList;
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

        while ($fast != null && $fast->next != null) {
            $fast = $fast->next->next;
            $slow = $slow->next;
        }

        return $slow->data;
    }
}

function meet(int $holeCount, int $speedOfRabbit, int $speedOfWolf)
{
    if ($holeCount <= 0 || $speedOfRabbit <= 0 || $speedOfWolf <= 0 ){
        return false;
    }

    // 速度差
    $speedDiff = $speedOfRabbit > $speedOfWolf;
    $speedDiff = $speedDiff >= 0 ? $speedDiff : -$speedDiff;

    $days = 1;
    while ($days){
        // 兼顾每天速度可以大于总洞数
        if (($speedDiff * $days) % $holeCount == 0){
            return $days;
        }
        $days++;
    }
}

echo '------------------狼和兔子------------------';
echo PHP_EOL;
echo meet(21, 4, 2);
echo PHP_EOL;
echo PHP_EOL;

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
echo PHP_EOL;

