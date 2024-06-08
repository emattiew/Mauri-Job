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
                <div class="card border-0 shadow mb-4">
                    <form action="{{ route('account.updateProfile') }}" method="post" id="userForm" name="userForm">
                    @csrf
                    @method('PUT')
                    <div class="card-body p-4">
                        <h3 class="fs-4 mb-1">Mon Profil</h3>
                        <div class="mb-4">
                            <label for="name" class="mb-2">Nom*</label>
                            <input type="text" name="name" id="name" placeholder="Entrez votre nom" class="form-control" value="{{$user->name}}">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="mb-2">Email*</label>
                            <input type="text"  name="email" id="email" placeholder="Entrez votre email" class="form-control" value="{{$user->email}}">
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="designation" class="mb-2">designation*</label>
                            <input type="text" name="designation" id="designation" placeholder="Fonction" class="form-control" value="{{$user->designation}}">
                        </div>
                        <div class="mb-4">
                            <label for="mobile" class="mb-2">Mobile*</label>
                            <input type="text" name="mobile" id="mobile" placeholder="Mobile" class="form-control" value="{{$user->mobile}}">
                        </div>                        
                    </div>
                    <div class="card-footer p-4">
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                    </form>
                </div>
            <div class="card border-0 shadow mb-4">
                <form action="{{ route('account.updateCV') }}" method="post" id="updateCVForm" name="updateCVForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body p-4">
                        <h3 class="fs-4 mb-1">Mettre à jour le CV</h3>
                        <div class="mb-4">
                            <label for="cv" class="mb-2">Sélectionner un fichier*</label>
                            <input type="file" name="cv" id="cv" class="form-control">
                            @error('cv')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer p-4">
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
                <div class="card border-0 shadow mb-4">
                    <form action="" method="post" id="changePasswordForm" name="changePasswordForm">
                    @csrf
                        <div class="card-body p-4">
                            <h3 class="fs-4 mb-1">Changer le mot de passe</h3>
                            <div class="mb-4">
                                <label for="" class="mb-2">Ancien mot de passe*</label>
                                <input type="password" name="old_password" id="old_password" placeholder="Old Password" class="form-control">
                                <p></p>
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">Nouveau mot de passe*</label>
                                <input type="password" name="new_password" id="new_password" placeholder="New Password" class="form-control">
                                <p></p>
                            </div>
                            <div class="mb-4">
                                <label for="" class="mb-2">Confirmer le mot de passe*</label>
                                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control">
                                <p></p>
                            </div>                        
                        </div>
                        <div class="card-footer  p-4">
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </div>
                    </form>
                </div>               
            </div>
        </div>
    </div>
</section>
@endsection
@section('customJs')
<script>
    $("#userForm").submit(function(e){
        e.preventdefault();

        $.ajax({
            url:'{{route ("account.updateProfile")}}',
            type:'put',
            data:$("#userForm").serializeArray(),
            dataType:'json',
            success: function(response) {
               if(response.status== true){

               }else{
                var errors=response.errors;
                if(errors.name){
                        $("#name").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.name)
                    }else{
                        $("#name").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('')
                    }
                    if(errors.email){
                        $("#email").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.email)
                    }else{
                        $("#email").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('');
                        window.location.href='{{route ("account.login")}}'
                    }
               }
            }
        });

    });
    $("#changePasswordForm").submit(function(e){
    e.preventDefault();

    $.ajax({
        url: '{{ route("account.updatePassword") }}',
        type: 'post',
        dataType: 'json',
        data: $("#changePasswordForm").serializeArray(),
        success: function(response) {

            if(response.status == true) {

                $("#name").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')

                $("#email").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')

                window.location.href="{{ route('account.profile') }}";

            } else {
                var errors = response.errors;

                if (errors.old_password) {
                    $("#old_password").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback')
                    .html(errors.old_password)
                } else {
                    $("#old_password").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')
                }

                if (errors.new_password) {
                    $("#new_password").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback')
                    .html(errors.new_password)
                } else {
                    $("#new_password").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')
                }

                if (errors.confirm_password) {
                    $("#confirm_password").addClass('is-invalid')
                    .siblings('p')
                    .addClass('invalid-feedback')
                    .html(errors.confirm_password)
                } else {
                    $("#confirm_password").removeClass('is-invalid')
                    .siblings('p')
                    .removeClass('invalid-feedback')
                    .html('')
                }
            }

        }
    });
});
</script>
@endsection