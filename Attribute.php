<?php

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_CLASS)] // anotation di php
class NotBlank
{

}

#[Attribute(Attribute::TARGET_PROPERTY)]
class Length
{
    public int $min;
    public int $max;

    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

}

class LoginRequest
{
    #[NotBlank]
    #[Length(min: 4, max: 10)]
    public ?string $username;

    #[NotBlank]
    #[Length(min: 8, max: 10)]
    public ?string $password;

}

function validate(object $object): void
{
    $class = new ReflectionClass($object); // instance reflection
    $properties = $class->getProperties(); // getProperties(): array {} // get semua type property dari object
    foreach ($properties as $property) {
        validationNotBlank($property,$object); // method handle validate
        validateLength($property, $object); // method handle validate
    }
}

function validationNotBlank(ReflectionProperty $property, object $object): void
{
    $attributes = $property->getAttributes(NotBlank::class); // getAttributes(): array {} // kemampuan reflection untuk meniru property dari object
    if (count($attributes) > 0) {
        if (!$property->isInitialized($object)) {
            throw new Exception("Property $property->name is null");
        }
        if ($property->getValue($object) == null) {
            throw new Exception("Property $property->name is null");
        }
    }
}

function validateLength(ReflectionProperty $property, object $object): void
{
    // jika belum initialized dan property belum di set makan return kosong
    if (!$property->isInitialized($object) || $property->getValue($object) == null) {
        return;
    }

    $value = $property->getValue($object); // getValue(): mixed // get value dari reflection properties
    $attributes = $property->getAttributes(Length::class); // getAttributes(): array {} // kemampuan reflection untuk meniru property dari object
    foreach ($attributes as $attribute) {
        $length = $attribute->newInstance(); // newInstance(): object // Membuat instance atribut baru dengan argumen yang diteruskan
        $valueLength = strlen($value); // strlen() // check panjang character
        if ($valueLength < $length->min)
            throw new Exception("Property $property->name is too short");
        if ($valueLength > $length->max)
            throw new Exception("Property $property->name is too long");
    }
}

// test validation
$request = new LoginRequest();
$request->username = "budhi";
$request->password = "password";
validate($request);
