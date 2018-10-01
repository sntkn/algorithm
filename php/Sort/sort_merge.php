<?php

/**
 * マージソート
 * O(n log n)
 * 安定ソート
 *
 * @param array $arr
 * @return void
 */
function merge_sort(array &$arr)
{
    $arr = merge_sort_split($arr);
}

/**
 * 分割
 *
 * @param array $arr
 * @return array
 */
function merge_sort_split(array $arr) : array
{
    if (count($arr) === 1) {
        return $arr;
    }
    // 配列を半分にする
    $mid = floor(count($arr) / 2);
    $left = array_slice($arr, 0, $mid);
    $right = array_slice($arr, $mid, count($arr));
    // 再帰的に分割
    $left = merge_sort_split($left);
    $right = merge_sort_split($right);
    return merge_sort_merge($left, $right);
}

/**
 * 結合
 *
 * @param array $left
 * @param array $right
 * @return array
 */
function merge_sort_merge(array $left, array $right) : array
{
    $result = array();
    // 左右を小さい順に追加
    while (count($left) && count($right)) {
        if ($left[0] < $right[0]) {
            $result[] = array_shift($left);
        } else {
            $result[] = array_shift($right);
        }
    }
    // 残りの半端な要素を追加
    return array_merge($result, $left, $right);
}
