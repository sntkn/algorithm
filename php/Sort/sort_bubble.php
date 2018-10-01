<?php

/**
 * バブルソート
 * O(n^2)
 * 安定ソート
 *
 * @param array $arr
 * @return void
 */
function bubble_sort(array &$arr)
{
    $size = count($arr);
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < ($size - 1 - $i); $j++) {
            if ($arr[$j + 1] < $arr[$j]) {
                $tmp = $arr[$j + 1];
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $tmp;
            }
        }
    }
}
