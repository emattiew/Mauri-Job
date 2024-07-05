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
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card shadow border-0 mt-4">
            <div class="job_details_header">
                <div class="single_jobs white-bg d-flex justify-content-between">
                    <div class="jobs_left d-flex align-items-center">
                        <div class="jobs_conetent">
                            <h4>Candidats</h4>
                        </div>
                    </div>
                    <div class="jobs_right"></div>
                </div>
            </div>
            <div class="descript_wrap white-bg">
                <table class="table table-striped">
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>CV</th>
                        <th>Diplome</th>
                        <th>Date de candidature</th>
                        <th>Votre Avis </th>
                    </tr>
                    @if ($applications->isNotEmpty())
                        @foreach ($applications as $application)
                        <tr>
                        <td><img src="{{ asset('profile_pic/' . $application->user->image) }}" alt="avatar" class="rounded-circle img-fluid" style="width: 100px;"></td>
                            <td>{{ $application->user->name }}</td>
                            <td>{{ $application->user->email }}</td>
                            <td>{{ $application->user->mobile }}</td>
                            <td>
                                @if($application->user->cv)
                                    <a href="{{ route('download.cv', $application->user->cv) }}">Télécharger CV</a>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                  @if($application->user->diplomas)
                                <a href="{{ route('download.diplomas', $application->user->diplomas) }}">Télécharger diplome</a>
                                @else
                                 N/A
                                @endif
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($application->applied_date)->format('d M, Y') }}
                            </td>
                            <td>
                                <form action="{{ route('expert.opinion', $application->id) }}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="expert_opinion" class="form-control" placeholder="Donner votre avis" value="{{ $application->expert_opinion ?? '' }}">
                                        <button class="btn btn-primary" type="submit">Soumettre</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="5">Aucun candidat trouvé</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
