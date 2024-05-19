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
    <form action="{{route('account.saveJob')}}" method="post" id="createJobForm" name="createJobForm">
        @csrf
        <div class="card border-0 shadow mb-4 ">
            <div class="card-body card-form p-4">
                <h3 class="fs-4 mb-1">Détails de l'offre d'emploi</h3>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="" class="mb-2">Titre<span class="req">*</span></label>
                        <input type="text" placeholder="Titre du poste" id="title" name="title" class="form-control">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="col-md-6  mb-4">
                        <label for="" class="mb-2">Catégorie<span class="req">*</span></label>
                        <select name="category" id="category" class="form-control">
                            <option value="">Sélectionnez une catégorie</option>
                            @if ($categories->isNotEmpty())
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            @endif   
                        </select>
                        @error('category')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="" class="mb-2">Nature du poste<span class="req">*</span></label>
                        <select name="jobType" id="jobType" class="form-select">
                        @if ($jobTypes->isNotEmpty())
                                @foreach ($jobTypes as $jobType)
                                <option value="{{ $jobType->id }}">{{ $jobType->name }}</option>
                                @endforeach
                            @endif
                           
                        </select>
                        @error('jobType')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="col-md-6  mb-4">
                        <label for="" class="mb-2">Vacance<span class="req">*</span></label>
                        <input type="number" min="1" placeholder="Nombre de postes vacants" id="vacancy" name="vacancy" class="form-control">
                    </div>
                    @error('vacancy')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                </div>

                <div class="row">
                    <div class="mb-4 col-md-6">
                        <label for="" class="mb-2">Salaire</label>
                        <input type="text" placeholder="Salaire" id="salary" name="salary" class="form-control">
                       
                    </div>

                    <div class="mb-4 col-md-6">
                        <label for="" class="mb-2">Lieu<span class="req">*</span></label>
                        <input type="text" placeholder="Lieu" id="location" name="Location" class="form-control">
                        @error('Location')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="" class="mb-2">Description<span class="req">*</span></label>
                    <textarea class="form-control" name="description" id="description" cols="5" rows="5" placeholder="Description"></textarea>
                    @error('description')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                </div>
                <div class="mb-4">
                    <label for="" class="mb-2">Avantages</label>
                    <textarea class="form-control" name="benefits" id="benefits" cols="5" rows="5" placeholder="Avantages"></textarea>
                
                </div>
                <div class="mb-4">
                    <label for="" class="mb-2">Responsabilités</label>
                    <textarea class="form-control" name="responsibility" id="responsibility" cols="5" rows="5" placeholder="Responsabilités"></textarea>
                   
                </div>
                <div class="mb-4">
                    <label for="" class="mb-2">Qualifications</label>
                    <textarea class="form-control" name="qualifications" id="qualifications" cols="5" rows="5" placeholder="Qualifications"></textarea>
                    
                </div>

                <div class="mb-4">
                            <label for="" class="mb-2">Experience<span class="req">*</span></label>
                            <select name="experience" id="experience" class="form-control">
                                  <option value="1">1 ans</option>
                                  <option value="2">2 ans</option>
                                   <option value="3">3 ans</option>
                                  <option value="4">4 ans</option>
                                  <option value="5">5 ans</option>
                                  <option value="6">6 ans</option>
                                    <option value="7">7 ans</option>
                                  <option value="8">8 ans</option>
                                  <option value="9">9 ans</option>
                                  <option value="10">10 ans</option>
                                  <option value="10_plus">10+ ans</option>
                           </select>
                           @error('experience')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                <div class="mb-4">
                    <label for="" class="mb-2">Mots-clés<span class="req">*</span></label>
                    <input type="text" placeholder="Mots-clés" id="keywords" name="keywords" class="form-control">
                    
                </div>

                <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Détails de l'entreprise</h3>

                <div class="row">
                    <div class="mb-4 col-md-6">
                        <label for="" class="mb-2">Nom<span class="req">*</span></label>
                        <input type="text" placeholder="Nom de l'entreprise" id="company_name" name="company_name" class="form-control">
                        @error('company_name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>

                    <div class="mb-4 col-md-6">
                        <label for="" class="mb-2">Lieu</label>
                        <input type="text" placeholder="Lieu" id="location" name="location" class="form-control">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="" class="mb-2">Site web</label>
                    <input type="text" placeholder="Site web" id="website" name="website" class="form-control">
                </div>
            </div> 
            <div class="card-footer  p-4">
                <button type="submit" class="btn btn-primary">Enregistrer l'offre</button>
            </div>               
        </div>
    </form>             
</div>

</section>
@endsection
@section('customJs')
<script>
   $("#createJobForm").submit(function(e) {
    e.preventDefault();
    
    $.ajax({
        url: '{{ route("account.saveJob") }}',
        type: 'POST',
        dataType: 'json',
        data: $("#createJobForm").serializeArray(),
       
        success: function(response) {
            if(response.status == true) {
                $("#title").removeClass('is-invalid')
                   .siblings('p')::::
                   .removeClass('invalid-feedback')
                   .html('')

                $("#category").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')

                $("#jobType").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')

                $("#vacancy").removeClass('is-invalid')
                   .siblings('p')
                   .removeClass('invalid-feedback')
                   .html('')

                $("#location").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')

                $("#description").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')

                $("#company_name").removeClass('is-invalid')
                     .siblings('p')
                     .removeClass('invalid-feedback')
                     .html('')
             window.location.href="{{ route('account.myJobs') }}";

            } else {
                var errors = response.errors;*
                if(errors.title) {
                    $("#title").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.title);
                } else {
                    $("#title").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('');
                }
                if(errors.category){
                        $("#category").addClass('is-invalid')
                            .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.category)
                    }else{
                        $("#category").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('');
                     
                    }
                    if(errors.jobType){
                        $("#jobType").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.jobType)
                    }else{
                        $("#jobType").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('');
                     
                    }
                    if(errors.vacancy){
                        $("#vacancy").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.vacancy)
                    }else{
                        $("#vacancy").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('');
                     
                    }
                    if(errors.location){
                        $("#location").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.location)
                    }else{
                        $("#location").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('');
                     
                    }
                    if(errors.description){
                        $("#description").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.description)
                    }else{
                        $("#description").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('');
                     
                    }
                    if(errors.company_name){
                        $("#company_name").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.company_name)
                    }else{
                        $("#company_name").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('');
                     
                    }
            
            }
        }
    });
});


 
</script>

@endsection