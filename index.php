<?php

use Pack\TestCase;
use Pack\Offer;
use Pack\PriceOptimizer;
use Pack\Printer;

require __DIR__ . '/vendor/autoload.php';

// Тестовые данные

$testCases = [
    new TestCase([
        new Offer(111, 42, 13, 1),
        new Offer(222, 77, 11, 10),
        new Offer(333, 103, 10, 50),
        new Offer(444, 65, 12, 5),
    ], 76, 'Тест 1'),
    new TestCase([
        new Offer(111, 42, 9, 1),
        new Offer(222, 77, 11, 10),
        new Offer(333, 103, 10, 50),
        new Offer(444, 65, 12, 5),
    ], 76, 'Тест 2'),
    new TestCase([
        new Offer(111, 100, 30, 1),
        new Offer(222, 60, 11, 10),
        new Offer(333, 100, 13, 50),
    ], 76, 'Тест 3'),
];

foreach ($testCases as $test) {
    $optimizer = new PriceOptimizer($test, new Printer());
    $optimizer->printResult();
}
