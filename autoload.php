<?php
/**
 * autoload.php
 *
 * @package   FloatCmp
 * @copyright Copyright (C) 2025 Nickolas Burr <nickolasburr@gmail.com>
 */
declare(strict_types=1);

require_once __DIR__ . (
    PHP_VERSION_ID < 80400 || !extension_loaded('bcmath')
        ? '/floatcmp.php' : '/bcmath.php'
);
