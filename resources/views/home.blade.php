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

                    {{ __('T\'est connecté !') }}
                </div>
                <div>
                    <h1>Bienvenue sur intranet</h1>
                        <small> La plate-forme de l'entreprise qui vous permet de trouver tous vos collaborateurs</small>
                            <h4>Avez-vous dit bonjour à :</h4>

                        @foreach ($users as $user)
                        <div>
                            <div>
                                <img src="" />
                            </div>
                            <div>
                                <div>
                                    <h3>{{ $user->name }} </h3>
                                    <p>Age, ans</p>
                                </div>
                                <p>Adresse, vile</p>
                                <p>{{ $user->email }}</p>
                                <p>numero tél</p>
                                <p>Date d'anniversaire</p>
                            </div>
                        </div>
                        @endforeach

                        <div>
                            <button> DIRE BONJOUR À QUELQU'UN D'AUTRE</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
