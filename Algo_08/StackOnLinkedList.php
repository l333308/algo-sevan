<?php


namespace Algo_08;


use Algo_06\LinkedListNode;

class StackOnLinkedList
{
    /**
     * 头指针
     * @var LinkedListNode
     */
    public $head;

    /**
     * 栈长度
     * @var int
     */
    public $length;

    /**
     * StackOnLinkedList constructor.
     */
    public function __construct()
    {
        $this->head = new LinkedListNode();
        $this->length = 0;
    }

    public function pop()
    {
        if ($this->length <= 0){
            return false;
        }

        $temp = $this->head->next;
        $this->head->next = $this->head->next->next;
        $this->length--;

        return $temp;
    }

    /**
     * 入栈node
     * @param LinkedListNode $node
     * @return bool
     */
    public function pushNode(LinkedListNode $node)
    {
        if (null == $node){
            return false;
        }

        $node->next = $this->head->next;
        $this->head->next = $node;
        $this->length++;

        return true;
    }

    /**
     * 入栈data
     * @param $data
     * @return bool
     */
    public function pushData($data)
    {
        $node = new LinkedListNode($data);

        return $this->pushNode($node);
    }

    /**
     * 返回栈长度
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * 栈是否为空
     * @return bool
     */
    public function isEmpty()
    {
        return !(0 == $this->length);
    }
}
