<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;
use App\Models\Genre;
use App\Models\Country;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('show/index', [
            'shows' => Show::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('show/create', [
            'show' => new Show(),
            'genres' => Genre::all(),
            'countries' => Country::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Règle de validation de nos champs de formulaire
        // voir : https://laravel.com/docs/8.x/validation#quick-writing-the-validation-logic
        $request->validate([
            'title' => 'required|max:255',
            'year' => 'required',
            'seasons' => 'required',
            'episodesPerSeason' => 'required',
            'stars' => 'required',
            'review' => 'required',
            'country_id' => 'required|exists:countries,id',
            'genre_id' => 'required|exists:genres,id',
        ]);


        // récupère l'ID de la série à modifier
        // si on est sur le formulaire en création, cette valeur sera vide
        $id = $request->input("id");


        if ($id == "") {
            // crée un nouvel objet à partir de notre modèle Show
            $show = new Show();
        } else {
            // Modification donc on recharge notre objet
            $show = Show::find($id) ?? new Show();

            // équivalent à
            /*if (Show::find($id) != null) {
                $show = Show::find($id);
            } else {
                $show = new Show();
            }*/
        }

        $show->title = $request->input('title');
        $show->year = $request->input('year');
        $show->seasons = $request->input('seasons');
        $show->episodesPerSeason = $request->input('episodesPerSeason');
        $show->stars = $request->input('stars');
        $show->review = $request->input('review');
        $show->country_id = $request->input('country_id');
        $show->genre_id = $request->input('genre_id');
        $show->save();

        // redirection vers la liste des séries
        return redirect('shows');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Show $show)
    {
        return view('show/edit', [
            'show' => $show,
            'genres' => Genre::all(),
            'countries' => Country::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // suppression de notre série dans la base de données
        Show::destroy($id);

        // redirection sur le listing
        return redirect('shows');
    }
}
