@extends('template.layouts.newauth')

@section('content')

   <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-2">
              <div class="text-muted text-center mt-2 mb-3"><h1>Nacoss Portal</h1></div>
              <div class="btn-wrapper text-center">
                <img src="{{ asset('assets/img/logo.png') }}" width="120">
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
             {{--  <div class="text-center text-muted mb-4">
                <small>Or sign in with credentials</small>
              </div> --}}
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" type="text" placeholder="{{ __('Matric No') }}" name="matric" value="{{ old('matric') }}" required autofocus>

                    @error('matric')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" type="password" placeholder="{{ __('Password') }}" name="password" required>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                
                <div class="text-center">
                  <button type="submit" type="submit" class="btn btn-primary my-4">{{ __('Login') }}</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}" class="text-light"><small>{{ __('Forgot Your Password?') }}</small></a>
              @endif
            </div>
            <div class="col-6 text-right">
              <a href="{{ route('register') }}" class="text-light"><small>Create new account</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('javascript')

@endsection