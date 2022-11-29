<?php

function passwordGenerator($length)
{
    $letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $numbers = "0123456789";
    $specialchars = "!@#$%^&*";
    $password = [];
    $alphaLength = strlen($letters) - 1;
    $numbersLength = strlen($numbers) - 1;
    $specialCharsLength = strlen($specialchars) - 1;
    for ($i = 0; $i < $length; $i++) {
        $n = rand(0, $alphaLength);
        $password[] = $letters[$n];
    }
    //var_dump(implode($password));
    return implode($password);
}
