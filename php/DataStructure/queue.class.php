<?php
namespace DataStructure;

/**
 * キュー構造
 */
class Queue
{
    private $list = [];

    /**
     * データを追加
     *
     * @param string $v
     * @return void
     */
    public function enqueue($v)
    {
        $this->list[] = $v;
    }

    /**
     * データを取り出す
     *
     * @return string
     */
    public function dequeue()
    {
        return array_shift($this->list);
    }

    /**
     * データ個数を返す
     *
     * @return integer
     */
    public function length()
    {
        return count($this->list);
    }
}
