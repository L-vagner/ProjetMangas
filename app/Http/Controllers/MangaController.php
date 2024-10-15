<?php

namespace App\Http\Controllers;

use App\dao\ServiceScenariste;
use App\dao\ServiceDessinateur;
use App\dao\ServiceGenre;
use App\Models\Manga;
use Exception;
use App\dao\ServiceManga;
use Illuminate\Http\Request;

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
            $title = "Ajouter un manga";
            $genres = ServiceGenre::getGenre();
            $dessinateurs = ServiceDessinateur::getDessinateur();
            $scenaristes = ServiceScenariste::getScenariste();
            $manga = new Manga();
            return view('vues/formManga', compact('title', 'manga','genres', 'dessinateurs', 'scenaristes'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/pageErreur', compact('erreur'));
        }
    }

    public function validerManga(Request $request)
    {
        try {
            $serviceManga = new ServiceManga();
            $id_manga = $request->input('hid_id');
            if ($id_manga == 0) {
                $manga = new Manga();
            } else {
                $manga = $serviceManga->getManga($id_manga);
            }

            $manga->titre = $request->input('txt_titre');
            $manga->id_genre = $request->input('sel_genre');
            $manga->id_dessinateur = $request->input('sel_dessi');
            $manga->id_scenariste = $request->input('sel_scena');
            $manga->prix = $request->input('num_prix');
            $couv = $request->file('fil_couv');
            if (isset($couv)) {
                $manga->couverture = $couv->getClientOriginalName();
                $couv->move(public_path() . '/assets/images/' . $manga->couverture);
            }
            $serviceManga->saveManga($manga);
            return redirect('listerMangas');
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/pageErreur', compact('erreur'));
        }
    }

    public function modifierManga($id)
    {
        try {
            $title = "Modifier un manga";
            $serviceManga = new ServiceManga();
            $manga = $serviceManga->getManga($id);
            $genres = ServiceGenre::getGenre();
            $dessinateurs = ServiceDessinateur::getDessinateur();
            $scenaristes = ServiceScenariste::getScenariste();
            return view('vues/formManga', compact('title', 'manga', 'genres', 'dessinateurs', 'scenaristes'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/pageErreur', compact('erreur'));
        }
    }
}
