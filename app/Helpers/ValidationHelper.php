<?php

if (!function_exists("validation_rules"))
{
    function validation_rules()
    {
        return [
            "required" => ":attribute harus diisi",
            "unique" => ":attribute sudah ada",
            "exists" => ":attribute tidak ditemukan"
        ];
    }
}