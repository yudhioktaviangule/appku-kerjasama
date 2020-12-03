<html>
    <head>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="container" style='padding-top:2em'>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="text-center" style='padding-top:2em;padding-bottom:2em'>
                            <img src="{{asset('gambar/makassar150x150.png')}}" style='width:100px'>
                            <h5>Register Akun Baru</h5>
                            
                        </div>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
        
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nomor_identitas" class="col-md-4 col-form-label text-md-right">{{ __('No. Identitas') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="nomor_identitas" type="text" class="form-control @error('name') is-invalid @enderror" name="nomor_identitas" value="{{ old('nomor_identitas') }}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="telepon" class="col-md-4 col-form-label text-md-right">{{ __('No. Telepon') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="telepon" type="text" class="form-control @error('name') is-invalid @enderror" name="telepon" value="{{ old('telepon') }}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fl-id-card" class="col-md-4 col-form-label text-md-right">{{ __('File Kartu Identitas') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="fl-id-card" type="hidden" class="form-control @error('name') is-invalid @enderror" name="file-id-card" value="{{ old('name') }}" required autocomplete=false autofocus>
                                        <input type="file" id='filex' onchange="window.upd($(this),'#fl-id-card')">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
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
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Password') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                        <a href="{{ route('login') }}">{{ __('Kembali ke Login') }}</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('dist/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('dist/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('dist/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
        <script>
            $(document).ready(()=>{
                window.upd=(object,vObj)=>{
                    pdfUpload.upload(object,vObj);
                }
            });
        </script>
    </body>
</html>
