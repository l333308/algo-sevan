<?php

function binarySearch(array $arr, int $find)
{
    $n = count($arr);

    return binarySearchRecursive($arr, $find, 0, $n - 1);
}

function binarySearchRecursive(array $arr, int $find, int $start, int $end)
{
    if($start >= $end ) return -1;

    $mid = ($start + $end) / 2;
    if ($arr[$mid] > $find){
        return binarySearchRecursive($arr, $find, $start, $mid);
    }elseif($arr[$mid] < $find){
        return binarySearchRecursive($arr, $find, $mid, $end);
    }else{
        return $mid;
    }
}

$list = range(0, 9);
$find = 8;
var_dump(binarySearch($list, $find));