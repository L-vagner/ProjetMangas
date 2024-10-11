<?php

namespace App\dao;

use App\Models\Genre;
use Illuminate\Database\QueryException;
use App\Exceptions\MonException;

class ServiceGenre
{
    public static function getGenre()
    {
        try {
            return Genre::all();
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
}
