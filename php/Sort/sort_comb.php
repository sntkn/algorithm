<?php

/**
 * コムソート
 * O(n log n)
 * 安定ソートではない
 *
 * @param array $arr
 * @return void
 */
function comb_sort(array &$arr)
{
    $gap = $size = count($arr);
    $swap = true;
    while ($gap > 1 || $swap) {
        if ($gap > 1) {
            $gap = floor($gap / 1.25);
            if ($gap == 9 || $gap == 10) {
                $gap = 11;
            }
        }
        $swap = false;
        $i = 0;
        while ($i + $gap < $size) {
            if ($arr[$i] > $arr[$i + $gap]) {
                $tmp = $arr[$i];
                $arr[$i] = $arr[$i + $gap];
                $arr[$i + $gap] = $tmp;
                $swap = true;
            }
            $i++;
        }
    }
}
