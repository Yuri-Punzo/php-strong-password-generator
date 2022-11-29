<?php

function passwordGenerator($length)
{
    /* $numbers = "0123456789"; */
    $letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    /* $specialchars = "!@#$%^&*"; */
    $password = [];
    $alphaLength = strlen($letters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $n = rand(0, $alphaLength);
        $password[] = $letters[$n];
    }
    //var_dump(implode($password));
    return implode($password);
}
