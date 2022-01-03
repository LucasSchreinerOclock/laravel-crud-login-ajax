@extends('layout/base')

@section('content')



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




<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="field">
        <p class="control has-icons-left has-icons-right">
          <input class="input" type="text" name="email" value="{{ old('email') }}" placeholder="Email">
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fas fa-check"></i>
          </span>
        </p>
      </div>
      <div class="field">
        <p class="control has-icons-left">
          <input class="input" type="password" name="password" placeholder="Password">
          <span class="icon is-small is-left">
            <i class="fas fa-lock"></i>
          </span>
        </p>
      </div>
      <div class="field">
        <p class="control">
          <button class="button is-success">
            Login
          </button>
        </p>
      </div>
</form>


@endsection

