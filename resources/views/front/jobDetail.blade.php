@extends('front.layouts.app')

@section('main')
<section class="section-4 bg-2">    
    <div class="container pt-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('jobs') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;Retour aux offres d'emploi</a></li>
                    </ol>
                </nav>
            </div>
        </div> 
    </div>
    <div class="container job_details_area">
        <div class="row pb-5">
            <div class="col-md-8">
                @include('front.message')
                <div class="card shadow border-0">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                
                                <div class="jobs_conetent">
                                    <a href="#">
                                        <h4>{{ $job->title }}</h4>
                                    </a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> {{ $job->location }}</p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i> {{ $job->jobType->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now {{ ($count == 1) ? 'saved-job' : '' }}">
                                    <a class="heart_mark " href="javascript:void(0);" onclick="saveJob({{ $job->id }})"> <i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Description du poste</h4>
                            {!! nl2br($job->description) !!}
                            
                            
                        </div>
                        @if (!empty($job->responsibility))
                        <div class="single_wrap">
                            <h4>Responsabilités</h4>
                            {!! nl2br($job->responsibility) !!}
                        </div>
                        @endif
                        @if (!empty($job->qualifications))
                        <div class="single_wrap">
                            <h4>Qualifications</h4>
                            {!! nl2br($job->qualifications) !!}
                        </div>
                        @endif
                        @if (!empty($job->benefits))
                        <div class="single_wrap">
                            <h4>Avantages</h4>
                            {!! nl2br($job->benefits) !!}
                        </div>
                        @endif
                        <div class="border-bottom"></div>
                        <div class="pt-3 text-end">
                        @if (Auth::check())
                                <a href="#" onclick="saveJob({{ $job->id }});" class="btn btn-secondary">Save</a>  
                            @else
                                <a href="javascript:void(0);" class="btn btn-secondary disabled">Connectez-vous pour enregistrer</a>
                            @endif

                            
                            @if (Auth::check())
                                <a href="#" onclick="applyJob({{ $job->id }})" class="btn btn-primary">Postuler</a>
                            @else
                                <a href="javascript:void(0);" class="btn btn-primary disabled">Connectez-vous pour postuler</a>
                            @endif
                            

                        </div>
                    </div>
                </div>

                @if (Auth::user())
                   @if (Auth::user()->id == $job->user_id)
                       
                   
                
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
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>CV</th>
                                <th>Date de candidature</th>
                            </tr>
                            @if ($applications->isNotEmpty())
                                @foreach ($applications as $application)
                                <tr>
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
                                        {{ \Carbon\Carbon::parse($application->applied_date)->format('d M, Y') }}
                                    </td>

                                </tr> 
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3">Aucun candidat trouvé</td>
                                </tr>
                            @endif
                            
                        </table>
                        
                    </div>
                </div>
                @endif 
                @endif
            </div>
            <div class="col-md-4">
                <div class="card shadow border-0">
                    <div class="job_sumary">
                        <div class="summery_header pb-1 pt-4">
                            <h3>Résumé de l'emploi</h3>
                        </div>
                        <div class="job_content pt-3">
                            <ul>
                                <li>Publié le: <span>{{ \Carbon\Carbon::parse($job->created_at)->format('d M, Y') }}</span></li>
                                <li>Vacances: <span>{{ $job->vacancy }}</span></li>
                                

                                @if (!empty($job->salary))
                                <li>Salaire: <span>{{ $job->salary }}</span></li>
                                @endif

                                <li>Lieu: <span>{{ $job->location }}</span></li>
                                <li>Nature de l'emploi: <span>{{ $job->jobType->name }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card shadow border-0 my-4">
                    <div class="job_sumary">
                        <div class="summery_header pb-1 pt-4">
                            <h3>Détails de l'entreprise</h3>
                        </div>
                        <div class="job_content pt-3">
                            <ul>
                                <li>Nom: <span>{{ $job->company_name }}</span></li>

                                @if (!empty($job->company_location))
                                <li>Lieu: <span>{{ $job->company_location }}</span></li>
                                @endif

                                @if (!empty($job->company_website))
                                <li>Site Web: <span><a href="{{ $job->company_website }}">{{ $job->company_website }}</a></span></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('customJs')
<script type="text/javascript">
function applyJob(id){
    if (confirm("Êtes-vous sûr de vouloir postuler à ce poste ?")) {
        $.ajax({
            url : '{{ route("applyJob") }}',
            type: 'post',
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(response) {
                window.location.href = "{{ url()->current() }}";
            } 
        });
    }
}
function saveJob(id){
    $.ajax({
        url : '{{ route("saveJob") }}',
        type: 'post',
        data: {id:id,
            _token: '{{ csrf_token() }}'
            
        },
        dataType: 'json',
        success: function(response) {
            window.location.href = "{{ url()->current() }}";
        } 
    });
}
</script>
@endsection
