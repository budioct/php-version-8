<?php

function sayHello(string $first, ?string $middle = "", string $last): void
{
    echo "Hello $first $middle $last" . PHP_EOL;
}

// akses argument parameter function biasa
sayHello("budhi", "octaviansyah", "22"); // akses harus urutan dengan argument
// sayHello("budhi", "22"); // error karna walaupun sudah di set argument default value, tetap wajib di isi

// akses named argument function versi php 8
sayHello(last: "22", first: "budhi", middle: "octaviansyah"); // akses bisa acak acak argument
// sayHello(first: "budhi", last: "22"); // error karna walaupun sudah di set argument default value, tetap wajib di isi