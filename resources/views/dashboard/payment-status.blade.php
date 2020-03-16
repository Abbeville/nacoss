@extends('template.layouts.dashboard')

@section('content')

<section id="basic-form-layouts">
  <div class="row match-height">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title" id="basic-layout-colored-form-control">{{ ucwords($user->fullname()) }}</h4>
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
            <ul>
              <li>Payment Status: {{ $user->payment_status ? 'Paid' : 'Not Paid' }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection