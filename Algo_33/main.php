<?php

namespace Algo_33;
require_once "../vendor/autoload.php";

$sourceString = trim(str_repeat('a,', 10000), ',');
$algo = new StringMatchAlgo(
    explode(',', $sourceString),
    [
        'a',
        'a',
        'a',
        'b'
    ]);

echo '--------------暴力匹配算法BF-----------------';
echo PHP_EOL;
$begin = microtime(true);
$algo->matchThroughBF();
$end = microtime(true);
$diff = $end-$begin;
echo "耗时{$diff}秒";
echo PHP_EOL;




