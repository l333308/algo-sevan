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
    if(($count = count($arr)) < 2) return;

    // 大 -> 小 则内层循环判断条件为 <
    // 小 -> 大 则内层循环判断条件为 >
    for($i = 0; $i < $count - 1; $i++){
        $swapFlag = false;

        for($j = $i + 1; $j < $count; $j++){
            if ($arr[$i] > $arr[$j]){
                [$arr[$i], $arr[$j]] = [$arr[$j], $arr[$i]];
                $swapFlag = true;
            }
        }

        // 该轮遍历若不用冒泡 则数组已有序 退出循环
        if(!$swapFlag) break;
    }

    return $arr;
}

// 利用递归思想 归并排序数组
function mergeSortRecursive(array $arr, $start, $end)
{
    // 递归终止条件
    if ($start >= $end){
        return [$arr[$end]];
    }

    // 求出左右数组分界点
    $middle = (int)(($start + $end) / 2);

    // 递归得出左右数组
    $left = mergeSortRecursive($arr, $start, $middle);
    $right = mergeSortRecursive($arr, $middle + 1, $end);

    // 左右数组合并
    return merge($left, $right);
}

// 合并有序数组 类似合并有序链表
function merge(array $left, array $right)
{
    // 合并后数组
    $merge = [];

    // 左右数组分别设一游标 指向第一个元素
    $lenLeft = count($left);
    $lenRight = count($right);
    $cursorLeft = 0;
    $cursorRight = 0;

    // 当左右数组任一遍历结束 结束循环
    while ( ($cursorLeft < $lenLeft) && ($cursorRight < $lenRight) ){
        // 比较左、右游标
        if ($left[$cursorLeft] < $right[$cursorRight]){
            $merge[] = $left[$cursorLeft];
            $cursorLeft++;
        }else{
            $merge[] = $right[$cursorRight];
            $cursorRight++;
        }
    }

    // 最后 拼接未遍历完的左或右数组
    if ($cursorLeft < $lenLeft){
        do{
            $merge[] = $left[$cursorLeft];
            $cursorLeft++;
        }while($cursorLeft < $lenLeft);
    }else{
        do{
            $merge[] = $right[$cursorRight];
            $cursorRight++;
        }while($cursorRight < $lenRight);
    }
    
    return $merge;
}

function quickSort(array &$arr)
{
    $n = count($arr);
    quickSortInternal($arr, 0, $n - 1);
}

function quickSortInternal(array &$arr, int $start, int $end)
{
    if ($start >= $end){
        return ;
    }

    $pivot = partition($arr, $start, $end);
    quickSortInternal($arr, $start, $pivot - 1);
    quickSortInternal($arr, $pivot + 1, $end);
}

function partition(array &$arr, int $start, int $end)
{
    $pivot = $arr[$end];
    $i = $start;

    // 如arr[j] < pivot swap arr[i]与arr[j]
    for($j = $start; $j < $end; $j++){
        if ($arr[$j] < $pivot){
            [$arr[$j], $arr[$i]] = [$arr[$i], $arr[$j]];
            $i++;
        }
    }

    // 遍历结束后 交换arr[i]与pivot的值
    [$arr[$end], $arr[$i]] = [$arr[$i], $arr[$end]];

    return $i;
}

$targetArr = range(1, 10000);
shuffle($targetArr);
$targetArr5 = $targetArr4 = $targetArr3 = $targetArr2 = $targetArr1 = $targetArr;

echo '-----------------------------冒泡排序-------------------------------';
echo PHP_EOL;

$begin = microtime(true);
$targetArr = bubbleSort($targetArr);
$end = microtime(true);
//print_r(($targetArr));
$timeDiff = $end - $begin;
echo "冒泡排序耗时:{$timeDiff}s";
echo PHP_EOL;
echo PHP_EOL;
exit();

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

$begin = microtime(true);
$targetArr2 = selectionSort($targetArr2);
$end = microtime(true);
//print_r($targetArr1);

$timeDiff = $end - $begin;
echo "插入排序耗时:{$timeDiff}s";
echo PHP_EOL;
echo PHP_EOL;

echo '-----------------------------归并排序-------------------------------';
echo PHP_EOL;

$begin = microtime(true);
echo PHP_EOL;

$targetArr3 = mergeSortRecursive($targetArr3, 0, 9999);
$end = microtime(true);
//print_r($targetArr2);
echo PHP_EOL;

$timeDiff = $end - $begin;
echo "归并排序耗时:{$timeDiff}s";
echo PHP_EOL;
echo PHP_EOL;

echo '-----------------------------快速排序-------------------------------';
echo PHP_EOL;

$begin = microtime(true);
quickSort($targetArr4);
$end = microtime(true);
//print_r($targetArr3);
echo PHP_EOL;

$timeDiff = $end - $begin;
echo "快速排序耗时:{$timeDiff}s";
echo PHP_EOL;
echo PHP_EOL;

echo '-----------------------------桶排序-------------------------------';
echo PHP_EOL;

$begin = microtime(true);
//bucketSort($targetArr4);
$end = microtime(true);
//print_r($targetArr4);
echo PHP_EOL;

$timeDiff = $end - $begin;
echo "桶排序耗时:{$timeDiff}s";
echo PHP_EOL;
echo PHP_EOL;