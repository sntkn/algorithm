<?php
namespace DataStructure;

/**
 * リングバッファ構造
 */
class RingBuffer
{
    private $buff = [];
    private $top;
    private $bottom;
    private $size;

    /**
     * コンストラクタ
     *
     * @param integer $size
     */
    public function __construct(int $size)
    {
        $this->size = $size;
        $this->top = 0;
        $this->bottom = -1;
        $this->buff = array_fill(0, $size, null);
    }

    /**
     * データを設定
     *
     * @param integer $index
     * @param mixed $v
     * @return void
     */
    public function set(int $index, $v)
    {
        $this->buff[$this->getPosition($index)] = $v;
    }

    /**
     * データを取得
     *
     * @param integer $index
     * @return mixed
     */
    public function get(int $index)
    {
        return $this->buf[$this->getPosition($index)];
    }

    /**
     * データを末尾に追加
     *
     * @param mixed $v
     * @return void
     */
    public function append($v)
    {
        $this->bottom = ($this->bottom + 1) % $this->size;
        $this->buff[$this->bottom] = $v;
        if ($this->top >= $this->bottom) {
            $this->top = $this->bottom + 1;
        }
    }

    /**
     * ポジションを返す
     *
     * @param integer $index
     * @return integer
     */
    private function getPosition(int $index) : int
    {
        return ($this->top + $index) % $this->size;
    }
}
