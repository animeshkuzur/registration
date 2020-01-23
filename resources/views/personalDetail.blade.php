@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Personal Details</div>
                @if(is_null($personal_data) && is_null($address_data))
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <form method="POST" id="personal" action="{{ url('/register/1') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="occupation" class="col-md-4 col-form-label text-md-left"><b>Applying for the position of :</b></label>
                        <div class="col-md-4">
                            <select id="occupation" class="form-control @error('occupation') is-invalid @enderror" name="occupation" required autofocus>
                            @error('occupation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <option></option>
                                @foreach($occupations as $occupation)
                                    <option value="{{ $occupation->id }}" @if (old('occupation') == $occupation->id) {{ 'selected' }} @endif>{{$occupation->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-left"><b>Full Name</b><br>Note 1: Name as recorded in the Matriculation/Secondary Examination Certificate.<br>Note 2: Please do not use any prefix such as Mr. or Ms. etc. </label>
                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label text-md-left"><b>Gender</b></label>
                        <div class="col-md-4">
                            <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required autofocus>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <option></option>
                                @foreach($genders as $gender)
                                    <option value="{{ $gender->id }}" @if (old('gender') == $gender->id) {{ 'selected' }} @endif>{{$gender->type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dob" class="col-md-4 col-form-label text-md-left"><b>Date of Birth</b><br>Note 3: Date of Birth as recorded in the Matriculation/Secondary Examination Certificate</label>
                        <div class="col-md-4">
                            <input id="dob" type="date" class="form-control @error('name') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autofocus>
                            @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-md-4 col-form-label text-md-left"><b>Father's Name</b><br>Note 4: Please do not use any prefix such as Shri or Dr. etc.</label>
                        <div class="col-md-8">
                            <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autofocus>
                            @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mname" class="col-md-4 col-form-label text-md-left"><b>Mother's Name</b><br>Note 5: Please do not use any prefix such as Smt or Dr. etc.</label>
                        <div class="col-md-8">
                            <input id="mname" type="text" class="form-control @error('mname') is-invalid @enderror" name="mname" value="{{ old('mname') }}" required autofocus>
                            @error('mname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nationality" class="col-md-4 col-form-label text-md-left"><b>Nationality</b></label>
                        <div class="col-md-4">
                            <select id="nationality" class="form-control @error('nationality') is-invalid @enderror" name="nationality" required autofocus>
                            @error('nationality')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <option></option>
                                @foreach($nationalities as $nationality)
                                    <option value="{{ $nationality->id }}" @if (old('nationality') == $nationality->id) {{ 'selected' }} @endif>{{$nationality->type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="marital_status" class="col-md-4 col-form-label text-md-left"><b>Marital Status</b></label>
                        <div class="col-md-4">
                            <select id="marital_status" class="form-control @error('marital_status') is-invalid @enderror" name="marital_status" required autofocus>
                            @error('marital_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <option></option>
                                @foreach($marital_statuses as $marital_status)
                                    <option value="{{ $marital_status->id }}" @if (old('marital_status') == $marital_status->id) {{ 'selected' }} @endif>{{$marital_status->type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="community" class="col-md-4 col-form-label text-md-left"><b>Community</b></label>
                        <div class="col-md-4">
                            <select id="community" class="form-control @error('community') is-invalid @enderror" name="community" required autofocus>
                            @error('community')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <option></option>
                                @foreach($communities as $community)
                                    <option value="{{ $community->id }}" @if (old('community') == $community->id) {{ 'selected' }} @endif>{{$community->type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="religion" class="col-md-4 col-form-label text-md-left"><b>Religion</b></label>
                        <div class="col-md-4">
                            <select id="religion" class="form-control @error('religion') is-invalid @enderror" name="religion" required autofocus>
                            @error('religion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <option></option>
                                @foreach($religions as $religion)
                                    <option value="{{ $religion->id }}" @if (old('religion') == $religion->id) {{ 'selected' }} @endif>{{$religion->type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="education" class="col-md-4 col-form-label text-md-left"><b>Latest Education Qualification</b></label>
                        <div class="col-md-8">
                            <input id="education" type="text" class="form-control @error('education') is-invalid @enderror" name="education" value="{{ old('education') }}" required autofocus>
                            @error('education')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <hr>

                    <div class="text-md-left">
                        <b>Address</b><br>Note 6:Do not enter special characters like ( _ , \ , / etc.) in the address.<br><br>
                    </div>

                    <div class="form-group row">
                        <label for="line1" class="col-md-4 col-form-label text-md-left">Line 1</label>
                        <div class="col-md-8">
                            <input id="line1" type="text" class="form-control @error('line1') is-invalid @enderror" name="line1" value="{{ old('line1') }}" required autofocus>
                            @error('line1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="line2" class="col-md-4 col-form-label text-md-left">Line 2</label>
                        <div class="col-md-8">
                            <input id="line2" type="text" class="form-control @error('line2') is-invalid @enderror" name="line2" value="{{ old('line2') }}" autofocus>
                            @error('line2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="line3" class="col-md-4 col-form-label text-md-left">Line 3</label>
                        <div class="col-md-8">
                            <input id="line3" type="text" class="form-control @error('line3') is-invalid @enderror" name="line3" value="{{ old('line3') }}" autofocus>
                            @error('line3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="city" class="col-md-4 col-form-label text-md-left">City</label>
                        <div class="col-md-8">
                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autofocus>
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="state" class="col-md-4 col-form-label text-md-left">State</label>
                        <div class="col-md-4">
                            <select id="state" class="form-control @error('state') is-invalid @enderror" name="state" required autofocus>
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <option></option>
                                @foreach($states as $state)
                                    <option value="{{ $state->id }}" @if (old('state') == $state->id) {{ 'selected' }} @endif>{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pin" class="col-md-4 col-form-label text-md-left">Pincode</label>
                        <div class="col-md-4">
                            <input id="pin" type="text" class="form-control @error('pin') is-invalid @enderror" name="pin" value="{{ old('pin') }}" required autofocus>
                            @error('pin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-left">Phone</label>
                        <div class="col-md-8">
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autofocus>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alternate_email" class="col-md-4 col-form-label text-md-left">Alternative Email</label>
                        <div class="col-md-8">
                            <input id="alternate_email" type="email" class="form-control @error('alternate_email') is-invalid @enderror" name="alternate_email" value="{{ old('alternate_email') }}" required autofocus>
                            @error('alternate_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <hr>
                    
                    <button type="submit" class="btn btn-outline-primary btn-sm pull-right">
                        Save and Proceed
                    </button>
                </form>    
                    
                </div>
                @else
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <form method="POST" id="personal" action="{{ url('/register/1') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="occupation" class="col-md-4 col-form-label text-md-left"><b>Applying for the position of :</b></label>
                        <div class="col-md-4">
                            <select id="occupation" class="form-control @error('occupation') is-invalid @enderror" name="occupation" required autofocus>
                            @error('occupation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <option></option>
                                @foreach($occupations as $occupation)
                                    <option value="{{ $occupation->id }}" @if (old('occupation',$personal_data->occupation_id) == $occupation->id) {{ 'selected' }} @endif>{{$occupation->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-left"><b>Full Name</b><br>Note 1: Name as recorded in the Matriculation/Secondary Examination Certificate.<br>Note 2: Please do not use any prefix such as Mr. or Ms. etc. </label>
                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$personal_data->name) }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label text-md-left"><b>Gender</b></label>
                        <div class="col-md-4">
                            <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required autofocus>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <option></option>
                                @foreach($genders as $gender)
                                    <option value="{{ $gender->id }}" @if (old('gender',$personal_data->gender_id) == $gender->id) {{ 'selected' }} @endif>{{$gender->type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dob" class="col-md-4 col-form-label text-md-left"><b>Date of Birth</b><br>Note 3: Date of Birth as recorded in the Matriculation/Secondary Examination Certificate</label>
                        <div class="col-md-4">
                            <input id="dob" type="date" class="form-control @error('name') is-invalid @enderror" name="dob" value="{{ old('dob',$personal_data->dob) }}" required autofocus>
                            @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-md-4 col-form-label text-md-left"><b>Father's Name</b><br>Note 4: Please do not use any prefix such as Shri or Dr. etc.</label>
                        <div class="col-md-8">
                            <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname',$personal_data->father_name) }}" required autofocus>
                            @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mname" class="col-md-4 col-form-label text-md-left"><b>Mother's Name</b><br>Note 5: Please do not use any prefix such as Smt or Dr. etc.</label>
                        <div class="col-md-8">
                            <input id="mname" type="text" class="form-control @error('mname') is-invalid @enderror" name="mname" value="{{ old('mname',$personal_data->mother_name) }}" required autofocus>
                            @error('mname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nationality" class="col-md-4 col-form-label text-md-left"><b>Nationality</b></label>
                        <div class="col-md-4">
                            <select id="nationality" class="form-control @error('nationality') is-invalid @enderror" name="nationality" required autofocus>
                            @error('nationality')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <option></option>
                                @foreach($nationalities as $nationality)
                                    <option value="{{ $nationality->id }}" @if (old('nationality',$personal_data->nationality_id) == $nationality->id) {{ 'selected' }} @endif>{{$nationality->type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="marital_status" class="col-md-4 col-form-label text-md-left"><b>Marital Status</b></label>
                        <div class="col-md-4">
                            <select id="marital_status" class="form-control @error('marital_status') is-invalid @enderror" name="marital_status" required autofocus>
                            @error('marital_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <option></option>
                                @foreach($marital_statuses as $marital_status)
                                    <option value="{{ $marital_status->id }}" @if (old('marital_status',$personal_data->marital_status_id) == $marital_status->id) {{ 'selected' }} @endif>{{$marital_status->type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="community" class="col-md-4 col-form-label text-md-left"><b>Community</b></label>
                        <div class="col-md-4">
                            <select id="community" class="form-control @error('community') is-invalid @enderror" name="community" required autofocus>
                            @error('community')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <option></option>
                                @foreach($communities as $community)
                                    <option value="{{ $community->id }}" @if (old('community',$personal_data->community_id) == $community->id) {{ 'selected' }} @endif>{{$community->type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="religion" class="col-md-4 col-form-label text-md-left"><b>Religion</b></label>
                        <div class="col-md-4">
                            <select id="religion" class="form-control @error('religion') is-invalid @enderror" name="religion" required autofocus>
                            @error('religion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <option></option>
                                @foreach($religions as $religion)
                                    <option value="{{ $religion->id }}" @if (old('religion',$personal_data->religion_id) == $religion->id) {{ 'selected' }} @endif>{{$religion->type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="education" class="col-md-4 col-form-label text-md-left"><b>Education Qualification</b></label>
                        <div class="col-md-8">
                            <input id="education" type="text" class="form-control @error('education') is-invalid @enderror" name="education" value="{{ old('education',$personal_data->education_qualification) }}" required autofocus>
                            @error('education')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <hr>

                    <div class="text-md-left">
                        <b>Address</b><br>Note 6:Do not enter special characters like ( _ , \ , / etc.) in the address.<br><br>
                    </div>

                    <div class="form-group row">
                        <label for="line1" class="col-md-4 col-form-label text-md-left">Line 1</label>
                        <div class="col-md-8">
                            <input id="line1" type="text" class="form-control @error('line1') is-invalid @enderror" name="line1" value="{{ old('line1',$address_data->line1) }}" required autofocus>
                            @error('line1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="line2" class="col-md-4 col-form-label text-md-left">Line 2</label>
                        <div class="col-md-8">
                            <input id="line2" type="text" class="form-control @error('line2') is-invalid @enderror" name="line2" value="{{ old('line2',$address_data->line2) }}" autofocus>
                            @error('line2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="line3" class="col-md-4 col-form-label text-md-left">Line 3</label>
                        <div class="col-md-8">
                            <input id="line3" type="text" class="form-control @error('line3') is-invalid @enderror" name="line3" value="{{ old('line3',$address_data->line3) }}" autofocus>
                            @error('line3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="city" class="col-md-4 col-form-label text-md-left">City</label>
                        <div class="col-md-8">
                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city',$address_data->city) }}" required autofocus>
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="state" class="col-md-4 col-form-label text-md-left">State</label>
                        <div class="col-md-4">
                            <select id="state" class="form-control @error('state') is-invalid @enderror" name="state" required autofocus>
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <option></option>
                                @foreach($states as $state)
                                    <option value="{{ $state->id }}" @if (old('state',$address_data->state_id) == $state->id) {{ 'selected' }} @endif>{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pin" class="col-md-4 col-form-label text-md-left">Pincode</label>
                        <div class="col-md-4">
                            <input id="pin" type="text" class="form-control @error('pin') is-invalid @enderror" name="pin" value="{{ old('pin',$address_data->pincode) }}" required autofocus>
                            @error('pin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-left">Phone</label>
                        <div class="col-md-8">
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone',$personal_data->phone) }}" required autofocus>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alternate_email" class="col-md-4 col-form-label text-md-left">Alternative Email</label>
                        <div class="col-md-8">
                            <input id="alternate_email" type="email" class="form-control @error('alternate_email') is-invalid @enderror" name="alternate_email" value="{{ old('alternate_email',$personal_data->alternate_email) }}" required autofocus>
                            @error('alternate_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <hr>
                    
                    <button type="submit" class="btn btn-outline-primary btn-sm pull-right">
                        Save and Proceed
                    </button>
                </form>    
                    
                </div>
                @endif
                
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="side-card">
                    <div class="side-card-header">
                        Registration Number : <b>{{ $registration_number }}</b>
                    </div>
                    <hr>
                        
                    <button type="submit" form="personal" class="btn btn-outline-primary btn-sm">
                        Save and Proceed
                    </button>

                    <a href="{{ url('/home') }}" class="btn btn-outline-danger btn-sm">Cancel & Exit</a>
                
                    <hr>
                    Progress
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: {{($status/6)*100}}%" aria-valuenow="{{ $status }}" aria-valuemin="{{$status}}" aria-valuemax="6"></div>
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
