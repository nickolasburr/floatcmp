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

    composer require nickolasburr/floatcmp:~1.0

Usage
-----

.. code-block:: php

   $a = 0.00528690;
   $b = 0.00528;

   if (floatcmp($a, $b, 5) === 0) {
       /* $a and $b are equal at given precision */
   }
