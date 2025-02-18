floatcmp
========

.. contents::
    :local:

Description
-----------

Compare floating-point numbers with optional precision.

Installation
------------

.. code-block:: sh

    composer require nickolasburr/floatcmp:^1.0

Usage
-----

.. code-block:: php

   use function floatcmp;

   $a = 0.00528690;
   $b = 0.00528;

   if (floatcmp($a, $b, 5) === 0) {
       /*
        * $a and $b are equal at given scale precision.
        *
        * Unlike a floating-point arithmetic library,
        * floatcmp() does not apply rounding to its
        * arguments but instead takes a fixed-width
        * scale approach like bccomp(). When bcmath
        * is available, floatcmp() will use bccomp()
        * for the float comparison.
        */
   }
