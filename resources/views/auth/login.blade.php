@extends('layouts.header')

@section('content')
<div class="jumbotron mb-0 rounded-0" style="height:100vh;">
    <h1 class="display-5 text-center">Hopac Canteen</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item rounded">
                            <div class="row">
                                <div class="col-md-12">
                                   <h5 class="my-4 text-center">Login here</h5>
                                   <form method="POST" action="{{ route('login') }}">
                                      @csrf
                                        <input class="form-control mb-2 @error('email') is-invalid @enderror" type="email" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        <input type="password" class="form-control mb-2 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                                        @error('password')
                                    
                                    <span class="invalid-feedback" role=" <?php 
                                    echo "<script>
        swal({
            icon: 'error',
            title: 'Error!',
            text: 'Incorrect password',
            timer: 5000,
            });
            </script>";

    ?>
">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                                        <input class="btn btn-primary btn-block mb-2" type="submit" name="submit" value="Login">
                                     
                                        
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
