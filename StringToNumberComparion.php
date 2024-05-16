<?php

/**
 * tring to Number Comparison PHP ver 8
 * ● Salah satu yang membingungkan di PHP adalah ketika kita melakukan perbandingan number dan string
 * ● Misal saat kita bandingkan 0 == “eko”, maka hasilnya true
 * ● Kenapa true? Karena PHP akan melakukan type jugling dan mengubah “eko” menjadi 0, sehingga
 *    hasilnya true
 * ● Di PHP 8, khusus perbandingan String ke Number diubah, agar tidak membingungkan
 * ● https://wiki.php.net/rfc/string_to_number_comparison
 *
 * Number to String
 * Comparison     | Before | After
 * ------------------------------
 * 0 == "0"       | true   | true
 * 0 == "0.0"     | true   | true
 * 0 == "foo"     | true   | false
 * 0 == ""        | true   | false
 * 42 == "   42"  | true   | true
 * 42 == "42foo"  | true   | false
 *
 *
 * String to Number
 * Comparison       | Result
 * ------------------------
 * "0" == "0"       | true
 * "0" == "0.0"     | true
 * "0" == "foo"     | false
 * "0" == ""        | false
 * "42" == "   42"  | true
 * "42" == "42foo"  | false
 *
 */

//echo 0 == "0" . PHP_EOL;
//echo 0 == "0.0" . PHP_EOL;
//echo 0 == "foo" . PHP_EOL;
//echo 0 == "" . PHP_EOL;
//echo 42 == "   42" . PHP_EOL;
//echo 42 == "42foo" . PHP_EOL;

//echo "0" == "0" . PHP_EOL;
//echo "0" == "0.0" . PHP_EOL;
//echo "0" == "foo" . PHP_EOL;
//echo "0" == "" . PHP_EOL;
//echo "42" == "   42" . PHP_EOL;
//echo "42" == "42foo" . PHP_EOL;
