<?php
/**
 * FloatCmp.php
 *
 * @package   FloatCmp
 * @copyright Copyright (C) 2025 Nickolas Burr <nickolasburr@gmail.com>
 */
declare(strict_types=1);

namespace FloatCmp;

use function bccomp;
use function floatval;
use function function_exists;
use function mb_substr;
use function number_format;

final class FloatCmp
{
    public const DECIMAL_SEPARATOR = '.';

    /**
     * @param float|string $a
     * @param float|string $b
     * @param int|null $scale
     * @return int
     * @static
     */
    public static function compare(
        float|string $a,
        float|string $b,
        ?int $scale = null
    ): int {
        $a = (float) $a;
        $b = (float) $b;

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
        /** @var string $result */
        $result = number_format(
            $value,
            ++$scale,
            self::DECIMAL_SEPARATOR,
            ''
        );
        return mb_substr($result, 0, -1);
    }
}
