@extends('app')

@section('content')
    <div class="container forget">
        @include('templates.titlePage')
        <div class="container-sm">
            <p class="descripction-page">I forgot my password</p>
            @if ($errors)
                <div class="container-alert">
                    <ul>
                        @foreach ($errors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form" method="POST" action="{{ route('registerUser.storeForgetPassword') }}">
                @csrf
                <div class="camp">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="You Email" name="email">
                </div>
                <input type="submit" class="button" value="Send">
            </form>
            <div class="actions">
                <a href="/sign_in">Do you have an account? Sign in </a>
                <a href="/sign_up">Don't have an account yet? Create one</a>
            </div>
        </div>
    </div>
@endsection
