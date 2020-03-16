@extends('template.layouts.dashboard')

@section('content')

<section id="basic-form-layouts">
  <div class="row match-height">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title" id="basic-layout-colored-form-control">Verify Student</h4>
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        {{-- @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach --}}
                    </ul>
                </div>
            @endif

            <form class="form" action="{{ route('student.verify') }}" method="POST">
              @csrf
              <div class="form-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="userinput3">Enter Matric/Form No to Verify</label>
                      <input type="text" id="userinput3" class="form-control border-primary" placeholder="Matric/Form No" name="matric" value="">
                    </div>
                  </div>
                </div>

              </div>

              <div class="form-actions text-right">
                <button type="submit" class="btn btn-primary">
                  <i class="la la-check-square-o"></i> Verify
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