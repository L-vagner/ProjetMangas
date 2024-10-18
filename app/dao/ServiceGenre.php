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
            return Genre::all()->sortBy('id_genre');
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public static function getLibGenre($id_genre)
    {
        try {
            return Genre::query()->findOrFail($id_genre);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
}
