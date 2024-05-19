@extends ('front.layouts.app')


@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item active">Paramètres du compte</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
               @include('front.account.sidebar')
            </div>
            <div class="col-lg-9">
            @include('front.message')
    <div class="card border-0 shadow mb-4 p-3">
   
        <div class="card-body card-form">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="fs-4 mb-1">Mes offres d'emploi</h3>
                </div>
                <div style="margin-top: -10px;">
                    <a href="{{route('account.createJob')}}" class="btn btn-primary">Publier un emploi</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table ">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">Titre</th>
                            <th scope="col">Offre créée</th>
                            <th scope="col">Candidats</th>
                            <th scope="col">Statut</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border-0">
                        <tr class="active">
                            <td>
                                <div class="job-name fw-500">Développeur Web</div>
                                <div class="info1">Temps plein - Noida</div>
                            </td>
                            <td>05 juin 2023</td>
                            <td>130 candidatures</td>
                            <td>
                                <div class="job-status text-capitalize">actif</div>
                            </td>
                            <td>
                                <div class="action-dots float-end">
                                    <a href="#" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="job-detail.html"> <i class="fa fa-eye" aria-hidden="true"></i> Voir</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fa fa-edit" aria-hidden="true"></i> Modifier</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fa fa-trash" aria-hidden="true"></i> Supprimer</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr class="pending">
                            <td>
                                <div class="job-name fw-500">Développeur HTML</div>
                                <div class="info1">Temps partiel - Delhi</div>
                            </td>
                            <td>13 août 2023</td>
                            <td>20 candidatures</td>
                            <td>
                                <div class="job-status text-capitalize">en attente</div>
                            </td>
                            <td>
                                <div class="action-dots float-end">
                                    <a href="#" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="job-detail.html"> <i class="fa fa-eye" aria-hidden="true"></i> Voir</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fa fa-edit" aria-hidden="true"></i> Modifier</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fa fa-trash" aria-hidden="true"></i> Supprimer</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr class="expired">
                            <td>
                                <div class="job-name fw-500">Développeur Full Stack</div>
                                <div class="info1">Temps plein - Noida</div>
                            </td>
                            <td>27 septembre 2023</td>
                            <td>278 candidatures</td>
                            <td>
                                <div class="job-status text-capitalize">expiré</div>
                            </td>
                            <td>
                                <div class="action-dots float-end">
                                    <a href="#" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="job-detail.html"> <i class="fa fa-eye" aria-hidden="true"></i> Voir</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fa fa-edit" aria-hidden="true"></i> Modifier</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fa fa-trash" aria-hidden="true"></i> Supprimer</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                                <div class="job-name fw-500">Développeur pour entreprise informatique</div>
                                <div class="info1">Temps plein - Goa</div>
                            </td>
                            <td>14 février 2023</td>
                            <td>70 candidatures</td>
                            <td>
                                <div class="job-status text-capitalize">actif</div>
                            </td>
                            <td>
                                <div class="action-dots float-end">
                                    <a href="#" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="job-detail.html"> <i class="fa fa-eye" aria-hidden="true"></i> Voir</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fa fa-edit" aria-hidden="true"></i> Modifier</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="fa fa-trash" aria-hidden="true"></i> Supprimer</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
</div>

        </div>
    </div>
</section>
@endsection
@section('customJs')

@endsection