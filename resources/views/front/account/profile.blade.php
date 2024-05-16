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
                            <label for="designation" class="mb-2">Fonction*</label>
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
                    <div class="card-body p-4">
                        <h3 class="fs-4 mb-1">Changer le mot de passe</h3>
                        <div class="mb-4">
                            <label for="old_password" class="mb-2">Ancien mot de passe*</label>
                            <input type="password" placeholder="Ancien mot de passe" class="form-control" id="old_password">
                        </div>
                        <div class="mb-4">
                            <label for="new_password" class="mb-2">Nouveau mot de passe*</label>
                            <input type="password" placeholder="Nouveau mot de passe" class="form-control" id="new_password">
                        </div>
                        <div class="mb-4">
                            <label for="confirm_password" class="mb-2">Confirmez le mot de passe*</label>
                            <input type="password" placeholder="Confirmez le mot de passe" class="form-control" id="confirm_password">
                        </div>                        
                    </div>
                    <div class="card-footer p-4">
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
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
</script>
@endsection