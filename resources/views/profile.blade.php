@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

                <div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h1>Modifier mon profil</h1>
                        <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div>
                                <label for="name">Name:</label>
                                <input type="text" name="name" value="{{ $user->name }}" required>
                            </div>

                            <div>
                                <label for="email">Email:</label>
                                <input type="email" name="email" value="{{ $user->email }}" required>
                            </div>

                            <button type="submit">MODIFIER</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
