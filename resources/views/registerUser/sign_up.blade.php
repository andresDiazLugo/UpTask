@extends('app')

@section('content')
    <div class="container create">
        @include('templates.titlePage')
        <div class="container-sm">
            <p class="descripction-page">Create an account at UpTask</p>
            @if ($errors)
                <div class="container-alert">
                    <ul>
                        @foreach ($errors as $error)
                            <li>{{ $error[0] }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form" method="POST" action="{{ route('registerUser.store') }}">
                @csrf
                <div class="camp">
                    <label for="name">Name</label>
                    <input type="text" id="name" placeholder="You Name" name="name">
                </div>
                <div class="camp">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="You Email" name="email">
                </div>
                <div class="camp">
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="You Password" name="password">
                </div>
                <div class="camp">
                    <label for="password_confirmation">Repeat Password</label>
                    <input type="password" id="password_confirmation" placeholder="repeat your password"
                        name="password_confirmation">
                </div>

                <input type="submit" class="button" value="Sign Up">
            </form>
            <div class="actions">
                <a href="/sign_in">Do you have an account? Sign in </a>
                <a href="/forget_password">I forgot my password</a>
            </div>
        </div>
    </div>
@endsection
