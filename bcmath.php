<?php
/**
 * bcmath.php
 *
 * @package   FloatCmp
 * @copyright Copyright (C) 2025 Nickolas Burr <nickolasburr@gmail.com>
 */
declare(strict_types=1);

#require_once __DIR__ . '/src/BcMath.php';
use FloatCmp\BcMath;

if (!function_exists('floatcmp')) {
    /**
     * @param float|string $a
     * @param float|string $b
     * @param int|null $scale
     * @return int
     */
    function floatcmp(
        float|string $a,
        float|string $b,
        ?int $scale = PHP_FLOAT_DIG
    ): int {
        return BcMath::compare($a, $b, $scale);
    }
}
