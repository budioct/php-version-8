<?php

/**
 * Union Types
 * ● PHP adalah bahasa pemrograman yang dynamic
 * ● Kita tahu sebenarnya saat membuat variabel, parameter, argument, return value, sebenarnya di
 *    PHP kita tidak wajib menyebutkan tipe datanya, dan PHP bisa berubah-ubah tipe data
 * ● Saat kita tambahkan tipe data, maka secara otomatis PHP akan memastikan tipe data tersebut
 *    harus sesuai dengan tipe data yang sudah kita definisikan
 * ● Di PHP 8, ada fitur Union Types, dimana kita bisa menambahkan lebih dari satu tipe data ke
 *    property, argument, parameter, atau return value
 * ● Penggunaan Union Types bisa menggunakan tanpa | diikuti dengan tipe data selanjutnya
 * ● https://wiki.php.net/rfc/union_types_v2
 */

class UnionType
{
    public string|int|bool|array $data; // union type 1 property bisa lebih dari satu type data

}

$example = new UnionType();
$example->data = "budhi";
$example->data = 100;
$example->data = true;
$example->data = [];

// union type argument
function sampleFunctionVoid(string|array $data): void
{
    if (is_array($data)) {
        echo "Array" .PHP_EOL;
    } else if (is_string($data)) {
        echo "String" .PHP_EOL;
    }
}

sampleFunctionVoid("budhi"); // String
sampleFunctionVoid([]); // Array

// union type return value
function sampleFunctionType(string|array $data): string|array
{
    if (is_array($data)) {
        return ["Array"];
    } else if (is_string($data)) {
        return "String";
    }
    return "Unknown type";
}

var_dump(sampleFunctionType("Eko"));
var_dump(sampleFunctionType([]));

/**
 * result:
 * String
 * Array
 *
 * string(6) "String"
 *
 * array(1) {
 * [0]=>
 * string(5) "Array"
 * }
 */