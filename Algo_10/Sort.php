<?php
function bubbleSort(array $arr)
{
    if(count($arr) < 2) return $arr;

    $n = count($arr);
    for($i = 0; $i < $n; $i++){
        // 如果该轮无数据移动 则所有数据均已有序 跳出循环
        $hasChange = false;
        for($j = 0; $j < $n - $i - 1; $j++){
            if ($arr[$j] > $arr[$j + 1]){
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;

                $hasChange = true;
            }
        }

        if (!$hasChange) break;
    }
    
    return $arr;
}

function insertionSort(array $arr)
{
    $len = count($arr);
    for($i = 1; $i < $len; $i++){
        // 当前需要确定位置的元素
        $cur = $arr[$i];

        // 8,20,1,3,6,3,17 当执行到第四个元素3时 前面是1,8,20
        for($j = $i - 1; $j >= 0; $j--){
            // 当前面元素 > 3 前面元素后移一位
            if ($arr[$j] > $cur){
                $arr[$j + 1] = $arr[$j];
            }else{  // 当前面元素 <= 3 即已确定3的位置 终止本次循环
                break;
            }
        }

        $flag1[] = $j;
        // 放置3
        $arr[$j + 1] = $cur;
    }
    
    return $arr;
}

function selectionSort(array $arr)
{

}

echo '-----------------------------冒泡排序-------------------------------';
echo PHP_EOL;
$targetArr = range(1, 10000);
$i = 0;
shuffle($targetArr);
$targetArr1 = $targetArr;

$bubbleArr = [8,15,20,3,21,3,17];

$begin = microtime(true);
$targetArr = bubbleSort($targetArr);
$end = microtime(true);
//print_r(($targetArr));
$timeDiff = $end - $begin;
echo "冒泡排序耗时:{$timeDiff}s";
echo PHP_EOL;
echo PHP_EOL;

echo '-----------------------------插入排序-------------------------------';
echo PHP_EOL;

$begin = microtime(true);
$targetArr1 = insertionSort($targetArr1);
$end = microtime(true);
//print_r($targetArr1);

$timeDiff = $end - $begin;
echo "插入排序耗时:{$timeDiff}s";
echo PHP_EOL;
echo PHP_EOL;

echo '-----------------------------选择排序-------------------------------';
echo PHP_EOL;
echo "TODO...";
echo PHP_EOL;