<?php

namespace App\Services;

class FileHelperService
{
    public function saveImage($file)
    {
        return $file->store('images');
    }
}