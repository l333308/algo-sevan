<?php


namespace Algo_06;


class LinkedList
{
    public $head;

    public $length;

    public function __construct()
    {
        $this->head = new LinkedListNode();
        $this->length = 0;
    }

    public function insert($data)
    {
        return $this->insertAfter($this->head, $data);
    }

    public function insertAfter(LinkedListNode $node, $data)
    {
        if (null == $node){
            return false;
        }

        $newNode = new LinkedListNode($data);
        
        $newNode->next = $node->next;
        $node->next = $newNode;
        
        $this->length++;
        
        return true;
    }

    public function insertNodeAfter(LinkedListNode $node, LinkedListNode $newNode)
    {
        if (null == $node){
            return false;
        }

        $newNode->next = $node->next;
        $node->next = $newNode;
        
        $this->length++;
        
        return $newNode;
    }

    // (少用)结点前插入结点
    public function insertBefore(LinkedListNode $node, $data)
    {
        if (null == $node){
            return false;
        }

        // 遍历链表 获取node的前一结点
        // 边界条件 node为第一个结点
        $length = $this->length;
        $curNode = $this->head;
        while ($curNode->next != $node){
            $curNode = $curNode->next;
        }

        // 为data新建结点
        $newNode = new LinkedListNode();
        $newNode->data = $data;

        // 指针操作
        $newNode->next = $node;
        $curNode->next = $newNode;

        // 长度
        $this->length++;

        return true;
    }

    // 获取前一结点
    public function getPreNode(LinkedListNode $node)
    {

    }

    // 删除尾部结点

    /**
     * 输出单链表 当data的数据为可输出类型
     *
     * @return bool
     */
    public function printListSimple()
    {
        if (null == $this->head->next) {
            return false;
        }

        $curNode = $this->head;
        while ($curNode->next != null) {
            echo $curNode->next->data . ' -> ';

            $curNode = $curNode->next;
        }
        echo 'NULL' . PHP_EOL;

        return true;
    }
    
    public function buildHasCircleList()
    {
        $node0 = new LinkedListNode(1);
        $node1 = new LinkedListNode(2);
        $node2 = new LinkedListNode(3);
        $node3 = new LinkedListNode(4);
        $node4 = new LinkedListNode(5);
        $node5 = new LinkedListNode(6);
        $node6 = new LinkedListNode(7);
        $node7 = new LinkedListNode(8);

        $this->insertNodeAfter($this->head, $node0);
        $this->insertNodeAfter($node0, $node1);
        $this->insertNodeAfter($node1, $node2);
        $this->insertNodeAfter($node2, $node3);
        $this->insertNodeAfter($node3, $node4);
        $this->insertNodeAfter($node4, $node5);
        $this->insertNodeAfter($node5, $node6);
        $this->insertNodeAfter($node6, $node7);

        $node7->next = $node4;
    }
}