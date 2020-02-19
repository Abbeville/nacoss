@extends('template.layouts.dashboard')

@section('page-header')

  <div class="content-header-left col-md-6 col-12 mb-2">
    <h3 class="content-header-title">Profile</h3>
    <div class="row breadcrumbs-top">
      <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Transanctions
          </li>
        </ol>
      </div>
    </div>
  </div>

@endsection

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Transaction History</h4>
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Transaction Ref</th>
                                    <th>Fee Code</th>
                                    <th>Approved Amount</th>
                                    <th>Transaction Time</th>
                                    <th>Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)

                                    @php
                                        switch($transaction->status){
                                            case 'success':
                                                $status_color = 'success';
                                                break;
                                            case 'pending':
                                                $status_color = 'warning';
                                                break;
                                            case 'failed':
                                                $status_color = 'danger';
                                                break;
                                            default:
                                                break;
                                            }
                                    @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->txref }}</td>
                                    <td>{{ $transaction->fee_code }}</td>
                                    <td>{{ $transaction->amount }}</td>
                                    <td>{{ $transaction->created_at->format('M j, Y H:ia') }}</td>
                                    <td><div class="badge badge-{{ $status_color }}">{{ $transaction->status }}</div></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')

@endsection