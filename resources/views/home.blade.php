@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-sm">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Details</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Personal Details</td>
                            @if($status>0 && $status<4)
                                <td>Complete.</td>
                                <td><a href="{{ url('/registration/1') }}" class="btn btn-outline-primary btn-sm">Edit</a></td>
                            @elseif($status>=4)
                                <td>Complete.</td>
                                <td><a href="{{ url('/registration/1') }}" class="btn btn-outline-secondary btn-sm">Disabled</a></td>
                            @else
                                <td>Incomplete.</td>
                                <td><a href="{{ url('/registration/1') }}" class="btn btn-outline-primary btn-sm">Fill</a></td>
                            @endif
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Document Upload</td>
                            @if($status>1 && $status<4)
                                <td>Complete.</td>
                                <td><a href="{{ url('/registration/2') }}" class="btn btn-outline-primary btn-sm">Edit</a></td>
                            @elseif($status==1)
                                <td>Incomplete.</td>
                                <td><a href="{{ url('/registration/2') }}" class="btn btn-outline-primary btn-sm">Fill</a></td>
                            @elseif($status>=4)
                                <td>Complete.</td>
                                <td><a href="{{ url('/registration/2') }}" class="btn btn-outline-secondary btn-sm">Disabled</a></td>
                            @else
                                <td>Incomplete.</td>
                                <td><a href="{{ url('/registration/2') }}" class="btn btn-outline-secondary btn-sm" disabled>Disabled</a></td>
                            @endif
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Exam Centre Choice</td>
                          @if($status>2 && $status<4)
                                <td>Complete.</td>
                                <td><a href="{{ url('/registration/3') }}" class="btn btn-outline-primary btn-sm">Edit</a></td>
                            @elseif($status==2)
                                <td>Incomplete.</td>
                                <td><a href="{{ url('/registration/3') }}" class="btn btn-outline-primary btn-sm">Fill</a></td>
                            @elseif($status>=4)
                                <td>Complete.</td>
                                <td><a href="{{ url('/registration/3') }}" class="btn btn-outline-secondary btn-sm">Disabled</a></td>
                            @else
                                <td>Incomplete.</td>
                                <td><a href="{{ url('/registration/3') }}" class="btn btn-outline-secondary btn-sm" disabled>Disabled</a></td>
                            @endif
                        </tr>
                        <tr>
                          <th scope="row">4</th>
                          <td>Review Application</td>
                            @if($status>3 && $status<6)
                                <td>Complete.</td>
                                <td><a href="{{ url('/registration/4') }}" class="btn btn-outline-primary btn-sm">View</a></td>
                            @elseif($status==3)
                                <td>Incomplete.</td>
                                <td><a href="{{ url('/registration/4') }}" class="btn btn-outline-primary btn-sm">Fill</a></td>
                            @elseif($status==6)
                                <td>Complete.</td>
                                <td><a href="{{ url('/registration/4') }}" class="btn btn-outline-secondary btn-sm" disabled>Disabled</a></td>    
                            @else
                                <td>Incomplete.</td>
                                <td><a href="{{ url('/registration/4') }}" class="btn btn-outline-secondary btn-sm" disabled>Disabled</a></td>
                            @endif
                        </tr>
                        <tr>
                          <th scope="row">5</th>
                          <td>Payment</td>
                            @if($status>4 && $status<6)
                                <td>Complete.</td>
                                <td><a href="{{ url('/registration/5') }}" class="btn btn-outline-primary btn-sm">View</a></td>
                            @elseif($status==4)
                                <td>Incomplete.</td>
                                <td><a href="{{ url('/registration/5') }}" class="btn btn-outline-primary btn-sm">Fill</a></td>
                            @elseif($status==6)
                                <td>Complete.</td>
                                <td><a href="{{ url('/registration/5') }}" class="btn btn-outline-secondary btn-sm" disabled>Disabled</a></td>
                            @else
                                <td>Incomplete.</td>
                                <td><a href="{{ url('/registration/5') }}" class="btn btn-outline-secondary btn-sm" disabled>Disabled</a></td>
                            @endif
                        </tr>
                      </tbody>
                    </table>
                    @if($status==6)
                        <hr>
                        <a href="{{ url('/register/729347823948/application/download') }}" class="btn btn-outline-primary">Download Application</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="side-card">
                    <div class="side-card-header">
                        Registration Number : <b>{{ $registration_number }}</b>
                    </div>
                    <hr>
                    <div class="side-card-body">
                        <p>Note : {{ $notice }}</p>
                    </div>
                    <hr>
                    Progress
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: {{($status/6)*100}}%" aria-valuenow="{{ $status }}" aria-valuemin="0" aria-valuemax="6"></div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
