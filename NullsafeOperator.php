<?php

/**
 * Nullsafe Operator
 * ● PHP sekarang memiliki nullsafe operator seperti di bahasa pemrograman Kotlin atau TypeScript
 * ● Biasanya ketika kita ingin mengakses sesuatu dari sebuah object yang bisa memungkinan nilai null,
 *    maka kita akan melakukan pengecekan apakah object tersebut null atau tidak, jika tidak baru kita
 *    akses object tersebut
 * ● Dengan nullsafe operator, kita tidak perlu melakukan itu, kita hanya perlu menggunakan karakter ?
 *   (tanda tanya), secara otomatis PHP akan melakukan pengecekan null tersebut
 * ● https://wiki.php.net/rfc/nullsafe_operator
 */

class Address
{
    public ?string $country; // tambah ? supaya null able
}

class User
{
    public ?Address $address; // peroperty reference object // tambah ? supaya null able
}

function getCountryNullCheckManual(?User $user): ?string
{
    if ($user != null) {
        if ($user->address != null) {
            return $user->address->country;
        }
    }
    return null;

//    return $user->address->country; // ERROR // akses tanpa pengechekan
}

function getCountryNullSafeOperator(?User $user): ?string
{
    return $user?->address?->country; // ? untuk mengakses type turunan supaya null safe check
}

echo getCountryNullCheckManual(null) . PHP_EOL;
echo getCountryNullSafeOperator(null) . PHP_EOL;