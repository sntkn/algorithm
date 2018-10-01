<?php

/**
 * クイックソート
 * O(n log n)
 * 安定ソートではない
 *
 * @param array $arr
 * @return void
 */
function quick_sort(array &$arr)
{
    if (count($arr) < 2) {
        return $arr;
    }
    $left = $right = [];
    // ピボットを選んで取り出す
    $pivot = array_pop($arr);
    foreach ($arr as $v) {
        if ($v < $pivot) {
            $left[] = $v;
        } else {
            $right[] = $v;
        }
    }
    quick_sort($left);
    quick_sort($right);
    $arr = array_merge($left, [$pivot], $right);
}
