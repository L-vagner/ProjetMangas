<?php

namespace App\Http\Controllers;

use Exception;
use App\dao\ServiceManga;

class MangaController extends Controller
{
    public function listerMangas()
    {
        try {
            $serviceManga = new ServiceManga();
            $desMangas = $serviceManga->getMangasAvecNoms();
            foreach ($desMangas as $unManga) {
                if (!file_exists('assets\\images\\' . $unManga->couverture)) {
                    $unManga->couverture = 'erreur.png';
                }
            }
            return view('vues/pageMangas', compact('desMangas'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/pageErreur', compact('erreur'));
        }
    }
}
