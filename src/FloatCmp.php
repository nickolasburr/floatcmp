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
use function function_exists;
use function number_format;
use function substr;

final class FloatCmp
{
    public const DECIMAL_SEPARATOR = '.';

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
        /** @var string $result */
        $result = number_format(
            $value,
            ++$scale,
            self::DECIMAL_SEPARATOR,
            ''
        );
        return substr($result, 0, -1);
    }
}
