@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Select Exam Centre</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($user_choices->isEmpty())
                        <form method="POST" id="exam_centre" action="{{ url('/register/3') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="city1" class="col-md-4 col-form-label text-md-left"><b>Exam Centre Choice 1 :</b></label>
                            <div class="col-md-4">
                                <select id="city1" class="form-control @error('city1') is-invalid @enderror" name="city1" required autofocus>
                                @error('city1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    <option></option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" @if (old('city1') == $city->id) {{ 'selected' }} @endif>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city2" class="col-md-4 col-form-label text-md-left"><b>Exam Centre Choice 2 :</b></label>
                            <div class="col-md-4">
                                <select id="city2" class="form-control @error('city2') is-invalid @enderror" name="city2" required autofocus>
                                @error('city2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    <option></option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" @if (old('city2') == $city->id) {{ 'selected' }} @endif>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city3" class="col-md-4 col-form-label text-md-left"><b>Exam Centre Choice 3 :</b></label>
                            <div class="col-md-4">
                                <select id="city3" class="form-control @error('city3') is-invalid @enderror" name="city3" required autofocus>
                                @error('city3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    <option></option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" @if (old('city3') == $city->id) {{ 'selected' }} @endif>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city4" class="col-md-4 col-form-label text-md-left"><b>Exam Centre Choice 4 :</b></label>
                            <div class="col-md-4">
                                <select id="city4" class="form-control @error('city4') is-invalid @enderror" name="city4" required autofocus>
                                @error('city4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    <option></option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" @if (old('city4') == $city->id) {{ 'selected' }} @endif>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        
                        <button type="submit" class="btn btn-outline-primary btn-sm pull-right">
                            Save and Proceed
                        </button>
                    </form>
                @else
                    <form method="POST" id="exam_centre" action="{{ url('/register/3') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="city1" class="col-md-4 col-form-label text-md-left"><b>Exam Centre Choice 1 :</b></label>
                            <div class="col-md-4">
                                <select id="city1" class="form-control @error('city1') is-invalid @enderror" name="city1" required autofocus>
                                @error('city1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    <option></option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" @if (old('city1',$city1) == $city->id) {{ 'selected' }} @endif>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city2" class="col-md-4 col-form-label text-md-left"><b>Exam Centre Choice 2 :</b></label>
                            <div class="col-md-4">
                                <select id="city2" class="form-control @error('city2') is-invalid @enderror" name="city2" required autofocus>
                                @error('city2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    <option></option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" @if (old('city2',$city2) == $city->id) {{ 'selected' }} @endif>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city3" class="col-md-4 col-form-label text-md-left"><b>Exam Centre Choice 3 :</b></label>
                            <div class="col-md-4">
                                <select id="city3" class="form-control @error('city3') is-invalid @enderror" name="city3" required autofocus>
                                @error('city3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    <option></option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" @if (old('city3',$city3) == $city->id) {{ 'selected' }} @endif>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city4" class="col-md-4 col-form-label text-md-left"><b>Exam Centre Choice 4 :</b></label>
                            <div class="col-md-4">
                                <select id="city4" class="form-control @error('city4') is-invalid @enderror" name="city4" required autofocus>
                                @error('city4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    <option></option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" @if (old('city4',$city4) == $city->id) {{ 'selected' }} @endif>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        
                        <button type="submit" class="btn btn-outline-primary btn-sm pull-right">
                            Save and Proceed
                        </button>
                    </form>
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
                    <button type="submit" form="exam_centre" class="btn btn-outline-primary btn-sm">
                        Save and Proceed
                    </button>
                    <a href="{{ url('/home') }}" class="btn btn-outline-danger btn-sm">Cancel & Exit</a>
                    <hr>
                    Progress
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: {{($status/6)*100}}%" aria-valuenow="{{ $status }}" aria-valuemin="0" aria-valuemax="6"></div>
                    </div>
                </div>
                @if($errors)
                @if(count($errors))
                    <hr>
                    <ul style="font-size: 12px; color: red; display: inline-block;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>                                               
                        @endforeach
                    </ul>
                @endif
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
