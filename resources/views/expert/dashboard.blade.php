@extends('front.layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item active">Tableau de Bord</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('expert.sidebar')
            </div>
            <div class="col-lg-9">
                @include('front.message')
                <div class="card border-0 shadow mb-4">
                   <div class="card-body dashboard text-center">
                        <p class="h2">Bienvenue Expert !!</p>
                   </div>
                   <div class="card border-0 shadow mb-4">
                   <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('expert.jobApplications') }}">Candidatures pour l'emploi</a>
                </li>
                </div>
                </div>                          
            </div>
        </div>
    </div>
</section>
@endsection