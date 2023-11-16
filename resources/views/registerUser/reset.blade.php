@extends('app')

@section('content')
    <div class="container reset">
        @include('templates.titlePage')
        <div class="container-sm">
            @if ($errors)
                <div class="container-alert">
                    <ul>
                        @foreach ($errors as $error)
                            <li>{{ $error[0] }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <p class="descripction-page">Inset you new password</p>
            <form class="form" method="POST" action="{{ route('registerUser.resetStore', ['token' => $token]) }}">
                @csrf
                <div class="camp">
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="You new Password" name="password">
                </div>

                <input type="submit" class="button" value="Save new password">
            </form>
            <div class="actions">
                <a href="/sign_in">Do you have an account? Sign in </a>
                <a href="/sign_up">Don't have an account yet? Create one</a>
            </div>
        </div>
    </div>
@endsection
