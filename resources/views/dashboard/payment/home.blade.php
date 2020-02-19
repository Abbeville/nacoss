@extends('template.layouts.dashboard')

@section('page-header')

  <div class="content-header-left col-md-6 col-12 mb-2">
    <h3 class="content-header-title">Profile</h3>
    <div class="row breadcrumbs-top">
      <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Payment
          </li>
        </ol>
      </div>
    </div>
  </div>

@endsection

@section('content')

<section id="basic-form-layouts">
  <div class="row match-height">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title" id="basic-layout-colored-form-control">Payment Details</h4>
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
            <div class="row">
              <ul class="list-group col-md-3 col-sm-3">
                <li class="list-group-item"><strong>Student Name</strong></li>
                <li class="list-group-item"><strong>Class</strong></li>
                <li class="list-group-item"><strong>Payment Code</strong></li>
                <li class="list-group-item"><strong>Amount</strong></li>
              </ul>
              <ul class="list-group col-md-8 col-sm-8">
                <li class="list-group-item">{{ $user->fullname() }}</li>
                <li class="list-group-item">{{ $user->level->name  }}</li>
                <li class="list-group-item">{{ feeName(intval($user->level->fee_id)) }}</li>
                <li class="list-group-item">{{ feeAmount(intval($user->level->fee_id)) }}</li>
              </ul>
            </div>           
            
          </div>
        </div>
      </div>
    </div>

        <div class="col-lg-4 col-md-4">
          <div class="card">
            
            <div class="card-content collapse show">
              <div class="card-body">
                <center><h2 style="line-height: 100px;">Proceed to Payment.</h2>
                <form method="POST" action="{{ route('pay') }}" id="paymentForm">
                    {{ csrf_field() }}
                    <input type="hidden" name="amount" value="{{ feeAmount(intval($user->level->fee_id)) }}" /> 
                    <input type="hidden" name="payment_method" value="both" /> 
                    <input type="hidden" name="description" value="No description" /> 
                    <input type="hidden" name="country" value="NG" /> 
                    <input type="hidden" name="currency" value="NGN" /> 
                    <input type="hidden" name="email" value="abbeville13@gmail.com" />
                    <input type="hidden" name="firstname" value="{{ $user->fname }}" />
                    <input type="hidden" name="lastname" value="{{ $user->lname }}" />
                    {{-- <input type="hidden" name="metadata" value="{{ json_encode($array) }}" >  --}}<!-- Meta data that might be needed to be passed to the Rave Payment Gateway -->
                    {{-- <input type="hidden" name="phonenumber" value="090929992892" /> --}} 
                    <input type="hidden" name="paymentcode" value="{{ feeName(intval($user->level->fee_id)) }}">
                    <input type="hidden" name="ref" value="{{ $txref }}" /> 
                    <input type="hidden" name="logo" value="https://pbs.twimg.com/profile_images/915859962554929153/jnVxGxVj.jpg" /> <!-- Replace the value with your logo url (Optional, present in .env)-->
                    <input type="hidden" name="title" value="Nacoss Portal" /> 
                    <input type="submit" class="btn btn-lg btn-info square btn-min-width mr-1 mb-1" value="Pay {{ feeAmount(intval($user->level->fee_id)) }} NGN"  />
                </form>
              </center>
              </div>
            </div>
          </div>
        </div>
  </div>
</section>

@endsection

@section('javascript')

@endsection