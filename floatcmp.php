<?php
/**
 * floatcmp.php
 *
 * @package   FloatCmp
 * @copyright Copyright (C) 2022 Nickolas Burr <nickolasburr@gmail.com>
 */
declare(strict_types=1);

#require_once __DIR__ . '/src/FloatCmp.php';
use FloatCmp\FloatCmp;

/**
 * PHP 7.1 polyfill
 */
if (!defined('PHP_FLOAT_DIG')) {
    define('PHP_FLOAT_DIG', 15);
}

if (!function_exists('floatcmp')) {
    /**
     * @param float $a
     * @param float $b
     * @param int|null $scale
     * @return int
     */
    function floatcmp(float $a, float $b, ?int $scale = PHP_FLOAT_DIG): int {
        return FloatCmp::compare($a, $b, $scale);
    }
}
