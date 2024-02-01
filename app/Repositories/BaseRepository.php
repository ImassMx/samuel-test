<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Log;

class BaseRepository
{

    public function printLog($e)
    {
        $errors = "{$e->getMessage()} \n {$e->getTraceAsString()}";
        Log::error($errors);
    }
}