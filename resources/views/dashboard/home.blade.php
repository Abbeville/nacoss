@extends('template.layouts.dashboard')

@section('content')

      <p>Welcome {{ Auth::user()->fullname() }}</p>

      @if (auth()->user()->type == config('type.roles.member'))

        @if (!Auth::user()->paymentStatus())
          <div class="bs-callout-primary callout-border-left p-1" style="background-color: #0fd;">
              <strong>Information!</strong>
              <p style="display: inline">Please make payment</p>
              <a href="/payment-page" class="btn btn-sm btn-warning" style="float: right;" type="button">Make Payment</a>
          </div>
        @endif

        @if(Auth::user()->paymentStatus() && !Auth::user()->profileUpdated())
          <div class="bs-callout-primary callout-border-left p-1" style="background-color: #ffd40073;">
              <strong>Information!</strong>
              <p style="display: inline">Please Update your Profile.</p>
              <a href="/profile" class="btn btn-sm btn-primary" style="float: right;" type="button">Update Profile</a>
          </div>
        @endif

      @endif

      @if (auth()->user()->type == config('type.roles.soft_dir') && auth()->user()->type == config('type.roles.admin'))

        <div class="row">
          <div class="col-xl-3 col-lg-6 col-md-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="align-self-center">
                      {{-- <i class="la la-user-md font-large-2 success"></i> --}}
                      <p style="font-size: 40px;">🙍</p>
                    </div>
                    <div class="media-body text-right">
                      <h5 class="text-muted text-bold-500">Registered Students</h5>
                      <h3 class="text-bold-600">{{ $data['registered'] }}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-6 col-md-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="align-self-center">
                      {{-- <i class="la la-user-md font-large-2 success"></i> --}}
                      <p style="font-size: 40px;">💵</p>
                    </div>
                    <div class="media-body text-right">
                      <h5 class="text-muted text-bold-500">Paid Students</h5>
                      <h3 class="text-bold-600">{{ $data['paid'] }}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-6 col-md-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="align-self-center">
                      {{-- <i class="la la-user-md font-large-2 success"></i> --}}
                      <p style="font-size: 40px;">🙍</p>
                    </div>
                    <div class="media-body text-right">
                      <h5 class="text-muted text-bold-500">Completed Profile</h5>
                      <h3 class="text-bold-600">{{ $data['avatar'] }}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-6 col-md-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="align-self-center">
                      {{-- <i class="la la-user-md font-large-2 success"></i> --}}
                      <p style="font-size: 40px;">💳</p>
                    </div>
                    <div class="media-body text-right">
                      <h5 class="text-muted text-bold-500">Printed ID card</h5>
                      <h3 class="text-bold-600">{{ $data['printed'] }}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Portal Report Summary Chart</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content collapse show">
                <div class="card-body chartjs">
                  <canvas id="combo-bar-line" height="400"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>

      @endif

    </div>
  </div>
        

@endsection

@section('javascript')
<script src=" {{ asset('/') }}app-assets/vendors/js/charts/chart.min.js"></script>
@endsection