<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>Iniciar sesión | Ayelen</title>
    <link rel="icon" type="image/jpg" href="{{asset('img/favicon.ico')}}" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet" />
    <style>
        .form-outline .form-control:focus ~ .form-notch .form-notch-leading {
            border-top: .125rem solid #edcc9c;
            border-bottom: .125rem solid #edcc9c;
            border-left: .125rem solid #edcc9c;
        }

        .form-outline .form-control:focus ~ .form-notch .form-notch-middle {
            border-bottom: .125rem #edcc9c;
            border-color: #edcc9c;
        }

        .form-outline .form-control:focus ~ .form-notch .form-notch-trailing {
            border-color: currentcolor currentcolor currentcolor #edcc9c;
            border-bottom: .125rem solid #edcc9c;
            border-right: .125rem solid #edcc9c;
            border-top: .125rem solid #edcc9c;
        }

        .form-outline .form-control:focus ~ .form-label {
            color: #edcc9c;
        }
    </style>
</head>
<body style="background-color: rgba(66, 19, 101);">
    <div class="container mt-5">
        <div class="card bg-light text-dark px-5 pb-5 mx-auto" style="border-radius: 1rem; max-width: 400px;">
            <div class="text-center mt-4">
                <img src="{{asset('img/Logo.png')}}" style="max-width: 200px;">
                <p class="text-dark-50 mt-4">Ingresa tus credenciales</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
            
                <div class="form-outline mb-4">                  
                    <input id="rut" type="text" class="form-control form-control-lg @error('rut') is-invalid @enderror" name="rut" value="{{ old('rut') }}" required>
                    <label class="form-label" for="rut">Rut</label>
                    @error('rut')
                        <div id="rut" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-outline mb-4">                    
                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <label class="form-label" for="pass">Contraseña</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                <div class="text-center">
                    <button class="btn btn-lg text-light px-5" style="background-color: rgba(66, 19, 101);">Ingresar</button>
                </div>
            
            </form>
        </div>
    </div>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
</body>
</html>