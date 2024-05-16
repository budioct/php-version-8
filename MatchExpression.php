<?php

/**
 * Match Expression
 * ● PHP 8 menambahkan struktur kontrol baru bernama match expression
 * ● Match expression adalah struktur kontrol yang mirip dengan switch case, namun lebih baik
 * ● Match adalah expression, artinya dia bisa mengembalikan value
 * ● https://wiki.php.net/rfc/match_expression_v2
 * ● https://www.php.net/manual/en/control-structures.match.php
 */

// jika tidak menggunakan MatchExpression.. kita pasti menggunakan switch case (tidak return value), jadi harus assaigment

$value = "E"; // set nilai
$result = ""; // tampung hasil expression
switch ($value) {
    case "A":
    case "B":
    case "C":
        $result = "Anda Lulus";
        break;
    case "D" :
        $result = "Anda tidak lulus";
        break;
    case "E":
        $result = "Mungkin Anda salah jurusan";
        break;
    default:
        $result = "Nilai apa itu?";
}
echo $result . PHP_EOL; // value: E // Mungkin Anda salah jurusan


// dengan MatchExpression // code lebih sedikit dan bisa return value
$result = match ($value) {
    "A", "B", "C" => "Anda Lulus",
    "D" => "Anda Tidak Lulus",
    "E" => "Mungkin Anda salah jurusan",
    default => "Nilai apa itu?"
};
echo $result . PHP_EOL; // value: E // Mungkin Anda salah jurusan

// MatchExpression dengan conditional
$value = 78; // set nilai
$result = match (true) {
    $value >= 80 => "A",
    $value >= 70 => "B",
    $value >= 60 => "C",
    $value >= 50 => "D",
    default => "E"
};
echo "Nilai: " . $result . PHP_EOL; // value: 78 // hasil nilai B


// MatchExpression dengan conditional method
$name = "Mrs. Cecil";
$result = match (true){
    str_contains($name, "Mr.") => "Hello Sir",
    str_contains($name, "Mrs.") => "Hello Mam",
    default => "Hello"
};
echo $result . PHP_EOL; // value: Mrs. Cecil // Hello Mam