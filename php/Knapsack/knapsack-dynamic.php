<?php

/**
 * ナップサック問題
 * 動的計画法
 * 分割統治法とメモ化
 */

/**
 * ナップサックの重さ
 */
$max_weight = 9;

/**
 * 商品の一覧
 */
$items = [
    ['name' => '*', 'weight' => 0, 'price' => 0],//DUMMY
    ['name' => 'A', 'weight' => 1, 'price' => 730],
    ['name' => 'B', 'weight' => 2, 'price' => 1470],
    ['name' => 'C', 'weight' => 3, 'price' => 2200],
    ['name' => 'E', 'weight' => 5, 'price' => 3500],
    ['name' => 'D', 'weight' => 4, 'price' => 2870],
];

// 価値の合計の最大値を表す二次元配列
$C = [];
// 商品を持っていくことを選択したかを表す
$G = [];

// C, Gを初期化
for ($i = 0; $i <= count($items); $i++) {
    $C[$i] = array_fill(0, $max_weight + 1, 0);
    $G[$i] = array_fill(0, $max_weight + 1, false);
}

print_CG(0);

// 価値の最大化を計算するループ
for ($i = 1; $i < count($items); $i++) {
    // ナップサックの重さについて計算するループ
    for ($w = 1; $w <= $max_weight; $w++) {
        $it = $items[$i];
        // 商品がナップサックに入るか？
        if ($it['weight'] <= $w) {
            // 持っていくと仮定した場合の価値を算定
            $v1 = $it['price'] + $C[$i - 1][$w - $it['weight']];
            $v2 = $C[$i - 1][$w];
            if ($v1 > $v2) {
                $C[$i][$w] = $v1;
                $G[$i][$w] = true;
            } else {
                $C[$i][$w] = $v2;
            }
        } else {
            $C[$i][$w] = $C[$i - 1][$w];
        }
    }
    print_CG($i);
}

// 結果を表示
echo "\n持っていく商品: ";
$i = count($items) - 1;
$w = $max_weight;
while ($i > 0 || $w > 0) {
    $it = $items[$i];
    if ($G[$i][$w]) {
        echo $it['name'];
        $w -= $it['weight'];
    }
    $i--;
}
echo "\n\n";

function print_CG($i)
{
    global $C, $G, $max_weight, $items;
    if ($i == 0) {
        echo "  ";
        for ($w = 0; $w <= $max_weight; $w++) {
            printf("|%6d", $w);
        }
        echo "\n  ";
        for ($w = 0; $w <= $max_weight; $w++) {
            echo "+------";
        }
        echo "\n";
    }
    echo "{$items[$i]['name']} ";
    for ($w = 0; $w <= $max_weight; $w++) {
        printf("|%4d:%1s", $C[$i][$w], $G[$i][$w] ? "o" : "x");
    }
    echo "\n";
}