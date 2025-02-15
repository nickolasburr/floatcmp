<?php
/**
 * BcMath.php
 *
 * @package   FloatCmp
 * @copyright Copyright (C) 2025 Nickolas Burr <nickolasburr@gmail.com>
 */
declare(strict_types=1);

namespace FloatCmp;

use BcMath\Number;
use ValueError;

final class BcMath
{
    /**
     * @param float|string $a
     * @param float|string $b
     * @param int|null $scale
     * @return int
     * @throws ValueError
     * @static
     */
    public static function compare(
        float|string $a,
        float|string $b,
        ?int $scale = null
    ): int {
        $a = (string) $a;
        $b = (string) $b;

        /** @var Number $value */
        $value = new Number($a);
        return $value->compare(
            new Number($b),
            $scale
        );
    }
}
