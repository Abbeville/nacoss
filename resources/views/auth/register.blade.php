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
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" type="text" placeholder="{{ __('First Name') }}" name="fname" value="{{ old('fname') }}"  autofocus>
                  </div>
                  @checkError($errors, 'fname')
                      <div class="text-danger" role="alert">
                          <strong>{{ $errors->first('fname') }}</strong>
                      </div>

                  @endcheckError
                </div>

                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" type="text" placeholder="{{ __('Last Name') }}" name="lname" value="{{ old('lname') }}"  autofocus>

                  </div>
                        @checkError($errors, 'lname')
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('lname') }}</strong>
                            </span>
                        @endcheckError
                </div>

                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" type="text" placeholder="{{ __('Matric No/Form No') }}" name="matric" value="{{ old('matric') }}" >

                  </div>
                        @checkError($errors, 'matric')
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('matric') }}</strong>
                            </span>
                        @endcheckError
                </div>

                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <select class="form-control" name="programme_id">
                            <option selected="" disabled="">Select Programme</option>
                            @foreach($programmes as $program)
                                <option value="{{ $program->id }}">{{ $program->name }}</option>
                            @endforeach
                        </select>

                  </div>
                        @checkError($errors, 'programme_id')
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('programme_id') }}</strong>
                            </span>
                        @endcheckError
                </div>

                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <select class="form-control" name="level_id">
                            <option selected="" disabled="">Select Level</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>

                        @checkError($errors, 'level_id')
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('level_id') }}</strong>
                            </span>
                        @endcheckError
                  </div>
                </div>

                
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" type="password" placeholder="{{ __('Password') }}" name="password" >
                  </div>

                    @checkError($errors, 'password')
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endcheckError
                </div>

                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                   <input class="form-control" type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" >

                  </div>
                </div>

                
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">{{ __('Register') }}</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 text-center">
              <a href="{{ route('login') }}" class="text-light"><small>{{ __('Already have an account? Sign in')}}</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('javascript')

@endsection