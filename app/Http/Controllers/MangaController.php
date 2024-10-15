<?php

namespace App\Http\Controllers;

use App\dao\ServiceScenariste;
use App\dao\ServiceDessinateur;
use App\dao\ServiceGenre;
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

    public function ajouterManga()
    {
        try {
        $genres = ServiceGenre::getGenre();
        $dessinateurs = ServiceDessinateur::getDessinateur();
        $scenaristes = ServiceScenariste::getScenariste();
            return view('vues/formManga', compact('genres', 'dessinateurs', 'scenaristes'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/pagesErreur', compact('erreur'));
        }
    }
}
