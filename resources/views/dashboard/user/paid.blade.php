@extends('template.layouts.dashboard')

@section('page-header')

  <div class="content-header-left col-md-6 col-12 mb-2">
    <h3 class="content-header-title">Members</h3>
    <div class="row breadcrumbs-top">
      <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Members
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
                <h4 class="card-title">All Members</h4>
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
                                    <th>Photo</th>
                                    <th>Fullname</th>
                                    <th>Matric</th>
                                    <th>Level</th>
                                    <th>Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)

                                    @php
                                        switch($user->status){
                                            case '1':
                                                $status_color = 'success';
                                                $message = 'Paid';
                                                break;
                                            case 0:
                                                $status_color = 'danger';
                                                $message = 'Not Paid';
                                                break;
                                            case null:
                                                $status_color = 'danger';
                                                $message = 'Not Paid';
                                                break;
                                            default:
                                                break;
                                            }
                                    @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img class="rounded-circle" src="{{ asset('uploads/'.$user->avatar) }}" width="40px" /></td>
                                    <td>{{ $user->fullName() }}</td>
                                    <td>{{ $user->matric }}</td>
                                    <td>{{ $user->level->name }}</td>
                                    {{-- <td>{{ $user->created_at->format('M j, Y H:ia') }}</td> --}}
                                    <td><div class="badge badge-{{ $status_color }}">{{ $message }}</div></td>

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