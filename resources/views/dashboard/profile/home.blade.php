@extends('template.layouts.dashboard')

@section('page-header')

  <div class="content-header-left col-md-6 col-12 mb-2">
    <h3 class="content-header-title">Profile</h3>
    <div class="row breadcrumbs-top">
      <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Profile
          </li>
        </ol>
      </div>
    </div>
  </div>

@endsection

@section('content')


<section id="basic-form-layouts">
  <div class="row match-height">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title" id="basic-layout-colored-form-control">Edit Profile</h4>
          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-content collapse show">
          <div class="card-body">

            <form class="form" action="{{ route('dashboard.profile') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="userinput1">Fist Name</label>
                      <input type="text" id="userinput1" class="form-control border-primary" placeholder="Name" name="fname" readonly="" value="{{ $user->fname }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="userinput2">Last Name</label>
                      <input type="text" id="userinput2" class="form-control border-primary" placeholder="Company" name="lname" readonly="" value="{{ $user->lname }}">
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="userinput3">Matric No</label>
                      <input type="text" id="userinput3" class="form-control border-primary" placeholder="Matric No" name="matric" readonly="" value="{{ $user->matric }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="userinput4">Email</label>
                      <input type="email" id="userinput4" class="form-control border-primary @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ isset($user->email) ? $user->email : ''}}">

                      @error('email')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="userinput2">Mobile No</label>
                      <input type="number" id="userinput2" class="form-control border-primary @error('mobile') is-invalid @enderror" placeholder="Phone no" name="mobile" value="{{ isset($user->mobile) ? $user->mobile : '' }}">

                      @error('mobile')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Select Photo</label>
                      <label id="projectinput7" class="file center-block">
                        <input type="file" id="file" name="avatar" @error('avatar') is-invalid @enderror>
                        <span class="file-custom"></span>
                        @error('avatar')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </label>
                    </div>
                  </div>
                </div>

              </div>

              <div class="form-actions text-right">
                <button type="button" class="btn btn-warning mr-1">
                  <i class="ft-x"></i> Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                  <i class="la la-check-square-o"></i> Save
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('javascript')

@endsection