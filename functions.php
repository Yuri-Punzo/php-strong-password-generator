<?php

function passwordGenerator($length, $letters, $numbers, $specialchars, $repeat)
{
    if (isset($letters)) {
        $letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    }
    if (isset($numbers)) {
        $numbers = "0123456789";
    }
    if (isset($specialchars)) {
        $specialchars = "!@#$%^&*";
    }

    $password = $letters . $numbers . $specialchars;

    if ($repeat == "yes") {
        $passwordRepeat = "";
        for ($i = 0; $i < $length; $i++) {
            $passwordRepeat = $passwordRepeat . $password[rand(0, strlen($password) - 1)];
        }
        return $passwordRepeat;
    } else {
        return substr(str_shuffle($password), 0, $length);
    };
}
