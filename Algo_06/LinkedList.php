<?php


namespace Algo_06;


class LinkedList
{
    /**
     * 头结点 哨兵结点
     * @var
     */
    public $head;

    /**
     * 链表长度
     * @var
     */
    public $length;

    public function __construct(LinkedListNode $head)
    {
        $this->head = $head;
    }

    // 插入结点 此处用简单的头插入方式
    public function insert($data)
    {
        return $this->insertAfter($this->head, $data);

    }

    // 结点后插入结点
    public function insertAfter(LinkedListNode $node, $data)
    {
        if (null == $node){
            return false;
        }

        // 为data新建结点
        $newNode = new LinkedListNode();
        $newNode->data = $data;

        // 指针操作
        $newNode->next = $node->next;
        $node->next = $newNode;

        // 链表长度
        $this->length++;

        return true;
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
}
