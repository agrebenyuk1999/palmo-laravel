<?php

namespace App\Providers;

use App\Contracts\TaskServiceContract;
use App\Services\TaskService;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    public $bindings = [
        TaskServiceContract::class => TaskService::class,
    ];
}
