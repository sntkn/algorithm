<?php

/**
 * ナップサック問題
 * 全探索法
 */

// ナップサックの重さ
$max_weight = 9;

// 商品の一覧
$items = [
    ['name' => 'A', 'weight' => 1, 'price' => 730],
    ['name' => 'B', 'weight' => 2, 'price' => 1470],
    ['name' => 'C', 'weight' => 3, 'price' => 2200],
    ['name' => 'D', 'weight' => 4, 'price' => 2870],
    ['name' => 'E', 'weight' => 5, 'price' => 3500],
];

// すべての組み合わせを作る
$result = [];
f_search(0, 0, 0, '');
asort($result, SORT_NUMERIC);
$result = array_reverse($result);

// 最適解を表示
$max = 0;
echo 'Count = ' . count($result) . "\n";
foreach ($result as $key => $val) {
    if ($max == 0) {
        $max = $val;
    }
    if ($val < $max) {
        break;
    }
    echo "商品: $key = {$val}円\n";
}

function f_search($i, $weight, $price, $knapsack)
{
    global $items, $result, $max_weight;
    // 最後まで調べたら終わり
    if (count($items) <= $i) {
        $result[$knapsack] = $price;
        return;
    }
    $it = $items[$i];
    // 商品$iを持たない場合
    f_search($i + 1, $weight, $price, $knapsack);
    // 商品$iを持つ場合
    $weight2 = $weight + $it['weight'];
    $price2 = $price + $it['price'];
    // 重量オーバーした場合
    if ($weight2 > $max_weight) {
        $result[$knapsack] = $price;
        return;
    }
    $knapsack .= $it['name']; // ナップサックに商品を追加
    f_search($i + 1, $weight2, $price2, $knapsack);
}
