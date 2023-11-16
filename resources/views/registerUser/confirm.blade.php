@extends('app')

@section('content')
    <div class="container confirm">
        @include('templates.titlePage')
        @if (count($errors) > 0)
            <div class="container-alert">
                <ul>
                    @foreach ($errors as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @else
            <div class="container-alert-success">
                <ul>
                    @foreach ($success as $succes)
                        <li>{{ $succes }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container-sm">
            {{-- <p class="descripction-page">Create an account at UpTask</p> --}}
            <div class="actions">
                <a href="/sign_in">Sign in </a>
            </div>
        </div>
    </div>
@endsection
