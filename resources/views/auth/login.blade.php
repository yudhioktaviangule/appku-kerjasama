<html>
    <head>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="container" style='padding-top:8em'>
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        

                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-4" style='padding-top:6em;padding-left:50px'>       
                                    <div class="row justify-content-center">
                                        <div class="col text-center">
                                            <img src="{{asset('gambar/makassar150x150.png')}}" style='width:100px'>
                                            <h5 style='padding-top:1em'>{{ config('app.name', 'Laravel') }}</h5>

                                        </div>

                                    </div>
                        
                                </div>
                                <form method="POST" action="{{ route('login') }}" class='col' style='padding-top:2em;padding-bottom:2em;'>
                                    @csrf
                                    <div class="text-center">
                                        <h5>Login Aplikasi</h5>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Ingat Saya') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="form-group row justify-content-center ">
                                        
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Lupa Password?') }}
                                            </a>
                                                
                                        
                                    </div>
                                    <div class="form-group row mb-0">
                                       
                                    
                                           
                                               
                                      
                                 
                                        
                                    </div>
                                    <div class="form-group text-center"> 
                                        <small>
                                            Belum Punya Akun? &nbsp;<a  href="{{ route('register') }}">{{ __(' click untuk register') }}</a>

                                        </small>              
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>