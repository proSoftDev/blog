<?php

namespace App\Services\Post\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface RetrievePosts
{
    public function handle(): LengthAwarePaginator;
}
