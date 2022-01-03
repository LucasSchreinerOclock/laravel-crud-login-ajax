<!-- affichage des erreurs fournies par $request->validate() -->
@if ($errors->any())
    <article class="message is-danger">
        <div class="message-header">
        <p>Problème dans le formulaire</p>
        <button class="delete" aria-label="delete"></button>
        </div>
        <div class="message-body">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </article>
@endif




<form action="/shows" method="POST">
    <!-- Insertion du token CSRF géré par Laravel -->
    @csrf

    <!-- on stock l'ID du film (vide si on est sur le formulaire en création) -->
    <input type="hidden" name="id" value="{{ $show->id }}">

    <div class="field">
        <label class="label">Titre</label>
        <div class="control">
            <input class="input" type="text" name="title" placeholder="titre du film" value="{{ old('title', $show->title) }}">
        </div>
    </div>

    <div class="field">
        <label class="label">Année de sortie</label>
        <div class="control">
            <input class="input" type="text" name="year" value="{{ old('year', $show->year) }}" placeholder="année de sortie du film">
        </div>
    </div>

    <div class="field">
        <label class="label">Nombre de saisons</label>
        <div class="control">
            <input class="input" type="text" name="seasons" value="{{ old('seasons', $show->seasons) }}" placeholder="Nombre de saisons">
        </div>
    </div>

    <div class="field">
        <label class="label">Nombre d'épisodes par saison</label>
        <div class="control">
            <input class="input" type="text" name="episodesPerSeason" value="{{ old('episodesPerSeason', $show->episodesPerSeason) }}" placeholder="Nombre d'épisodes par saison">
        </div>
    </div>

    <div class="field">
        <label class="label">Note</label>

        <div class="select">
            <select name="stars">
                <option>choisissez une note</option>
                <option value="0" {{ old('stars', $show->stars) == 0 ? 'selected' : '' }}>0</option>
                <option value="1" {{ old('stars', $show->stars) == 1 ? 'selected' : '' }}>1</option>
                <option value="2" {{ old('stars', $show->stars) == 2 ? 'selected' : '' }}>2</option>
                <option value="3" {{ old('stars', $show->stars) == 3 ? 'selected' : '' }}>3</option>
                <option value="4" {{ old('stars', $show->stars) == 4 ? 'selected' : '' }}>4</option>
                <option value="5" {{ old('stars', $show->stars) == 5 ? 'selected' : '' }}>5</option>
            </select>
        </div>
    </div>

    <div class="field">
        <label class="label">Résumé</label>
        <div class="control">
            <textarea class="textarea" rows="10" name="review" placeholder="Résumé du film">{{ old('review', $show->review) }}</textarea>
        </div>
    </div>






    <div class="field">
        <label class="label">Genre</label>

        <div class="select">
            <select name="genre_id">
                <option>choisissez un genre</option>

                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ old('genre_id', $show->genre_id) == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                @endforeach

            </select>
        </div>
    </div>


    <div class="field">
        <label class="label">Pays</label>

        <div class="select">
            <select name="country_id">
                <option>choisissez un pays</option>

                @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{ old('country_id', $show->country_id) == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                @endforeach

            </select>
        </div>
    </div>


    <div class="field is-grouped">
        <div class="control">
            <button class="button is-link">Enregistrer</button>
        </div>
        <div class="control">
            <button class="button is-link is-light">Annuler</button>
        </div>
    </div>

</form>