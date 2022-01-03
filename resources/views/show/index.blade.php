@extends('layout/base')

@section('content')

    <h1 class="is-size-1">Liste des séries</h1>

<table class="table">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Année</th>
            <th>Nb Saisons</th>
            <th>Nb episodes/saison</th>
            <th>Note</th>
            <th>Résumé</th>
            <th>Pays</th>
            <th>Genre</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($shows as $show)
            <tr>
                <!--
                    appel de la route "shows.edit"
                    En paramètre : show (qui correspond à notre modèle), la valeur attendue est l'ID du film
                -->
                <td><a href="{{ route("shows.edit", ["show" => $show->id]) }}">{{ $show->title }}</a></td>
                <td>{{ $show->year }}</td>
                <td>{{ $show->seasons }}</td>
                <td>{{ $show->episodesPerSeason }}</td>
                <td>{{ $show->stars }}</td>
                <td>{{ $show->review }}</td>
                <td>{{ $show->country->name }}</td>
                <td>{{ $show->genre->name }}</td>
                <td>
                    <form action="{{ route('shows.destroy', ['show' => $show->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="button is-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
