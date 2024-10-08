<?php

namespace App\dao;

use App\Models\Manga;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Exceptions\MonException;

class ServiceManga
{
    public function getMangasAvecNoms()
    {
        try {
            $mangas = DB::table('mangas')
                ->select('id_manga', 'titre', 'prix', 'couverture',
                    'genre.lib_genre', 'dessinateur.nom_dessinateur', 'scenariste.nom_scenariste')
                ->join('genre', 'genre.id_genre', '=', 'manga.id_genre')
                ->join('dessinateur', 'dessinateur.id_dessinateur', '=', 'dessinateur.id_dessinateur')
                ->join('scenariste', 'scenariste.id_scenariste', '=', 'scenariste.id_scenariste')
                ->get();
            return $mangas;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
}
