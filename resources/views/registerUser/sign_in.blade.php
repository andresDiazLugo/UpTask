@extends('app')

@section('content')
    <div class="container login">
        @include('templates.titlePage')
        <div class="container-sm">
            <p class="descripction-page">Sign In</p>
            @if ($errors)
                <div class="container-alert">
                    <ul>
                        @foreach ($errors as $error)
                            <li>{{ $error[0] }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form" method="POST" action="{{ route('registerUser.store_sign_in') }}">
                @csrf
                <div class="camp">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="You Email" name="email">
                </div>
                <div class="camp">
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="You Password" name="password">
                </div>

                <input type="submit" class="button" value="Sign In">
            </form>
            <div class="actions">
                <a href="/sign_up">Don't have an account yet? Create one</a>
                <a href="/forget_password">I forgot my password</a>
            </div>
        </div>
    </div>
@endsection
