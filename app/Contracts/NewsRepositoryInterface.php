<?php
namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
interface NewsRepositoryInterface
{
    public function search(string $query = ''): Collection;
}
