<?php
/**
 * FloatCmp.php
 *
 * @package   FloatCmp
 * @copyright Copyright (C) 2022 Nickolas Burr <nickolasburr@gmail.com>
 */
declare(strict_types=1);

namespace FloatCmp;

use function bccomp;
use function floatval;
use function floor;
use function function_exists;
use function log10;
use function max;
use function sprintf;
use function substr;

class FloatCmp
{
    /**
     * @param float $a
     * @param float $b
     * @param int|null $scale
     * @return int
     * @static
     */
    public static function compare(
        float $a,
        float $b,
        ?int $scale = null
    ): int {
        if ($scale === null) {
            return $a <=> $b;
        }

        /** @var string $x */
        $x = self::strval($a, $scale);

        /** @var string $y */
        $y = self::strval($b, $scale);

        return function_exists('bccomp')
            ? bccomp($x, $y, $scale)
            : floatval($x) <=> floatval($y);
    }

    /**
     * @param float $value
     * @param int $scale
     * @return string
     * @static
     */
    private static function strval(
        float $value,
        int $scale
    ): string {
        /** @var string $format */
        $format = sprintf(
            '%%.%dF',
            max($scale - floor(log10($value)), 0) + 1
        );

        /** @var string $result */
        $result = sprintf($format, $value);
        return substr($result, 0, -1);
    }
}
