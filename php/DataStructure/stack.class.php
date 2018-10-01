<?php
namespace DataStructure;

/**
 * スタック構造
 */
class Stack
{
    private $stack = [];

    /**
     * データを追加
     *
     * @param string $v
     * @return void
     */
    public function push($v)
    {
        $this->stack[] = $v;
    }

    /**
     * データを取り出す
     *
     * @return string
     */
    public function pop()
    {
        return array_pop($this->stack);
    }

    /**
     * データ個数を返す
     *
     * @return integer
     */
    public function length()
    {
        return count($this->stack);
    }
}
