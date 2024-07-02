@extends ('front.layouts.app')

@section('main')
<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>

        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Inscription</h1>
                    <form action="{{ route('account.processRegistration') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="mb-2">Nom*</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Entrez votre nom" value="{{ old('name') }}">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div class="mb-3">
                            <label for="email" class="mb-2">Email*</label>
                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Entrez votre email" value="{{ old('email') }}">
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div class="mb-3">
                            <label for="password" class="mb-2">Mot de passe*</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Entrez votre mot de passe">
                            @error('password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div class="mb-3">
                            <label for="confirm_password" class="mb-2">Confirmez le mot de passe*</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirmez votre mot de passe">
                            @error('confirm_password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div> 
                        <button class="btn btn-primary mt-2">S'inscrire</button>
                    </form>                    
                </div>
                <div class="mt-4 text-center">
                    <p>Vous avez déjà un compte?<a href="{{ route('login') }}">Connectez-vous</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('customJs')
<script>
    $("#registrationForm").submit(function(e){
        e.preventdefault();

        $.ajax({
            url:'{{ route("account.processRegistration") }}',
            type:'post',
            data:$("#registrationForm").serializeArray(),
            dataType:'json',
            success: function(response) {

                if(response.status == false){
                    var errors = response.errors;
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
                        .html('')
                    }
                    if(errors.password){
                        $("#password").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.password)
                    }else{
                        $("#password").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('')
                    }
                    if(errors.confirm_password){
                        $("#confirm_password").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.confirm_password)
                    }else{
                        $("#confirm_password").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('')
                    }
                }else {
                    $("#name").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('');

                        $("#email").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('');

                        $("#password").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('');

                        $("#confirm_password").removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('');

                        window.location.href='{{route ("login")}}'

                }
            }
        })

    });
</script>
@endsection