<?php

class Validators
{
    // Validar si el email es válido
    public static function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    // Validar si la contraseña cumple con los requisitos: mínimo 8 caracteres, al menos una letra y un número
    public static function validatePassword($password)
    {
        $pattern = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
        return preg_match($pattern, $password);
    }

    // Sanitizar entradas para evitar inyecciones de SQL y XSS
    public static function sanitizeInput($input)
    {
        return htmlspecialchars(strip_tags(trim($input)));
    }
}
