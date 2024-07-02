@extends ('front.layouts.app')

@section('main')
<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        @if (Session::has('success'))
        <div class ="alert alert-success">
            <p>{{ Session::get('success')}}</p>
        </div>
        @endif
        @if (Session::has('error'))
        <div class ="alert alert-danger">
            <p>{{ Session::get('error')}}</p>
        </div>
        @endif
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Connexion</h1>
                    <form action="{{ route('account.authenticate') }}" method="post">
                    @csrf
                        <div class="mb-3">
                            <label for="" class="mb-2">Email*</label>
                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="exemple@exemple.com" value="{{ old('email') }}">
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Mot de passe*</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Entrez votre mot de passe">
                            @error('password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div class="justify-content-between d-flex">
                        <button class="btn btn-primary mt-2">Connexion</button>
                            <a href="{{ route('account.forgotPassword') }}" class="mt-3">Mot de passe oublié?</a>
                        </div>
                    </form>                    
                </div>
                <div class="mt-4 text-center">
                    <p>Vous n'avez pas de compte? <a  href="{{ route('account.registration') }}">Inscription</a></p>
                </div>
            </div>
        </div>
        <div class="py-lg-5">&nbsp;</div>
    </div>
</section>
@endsection
