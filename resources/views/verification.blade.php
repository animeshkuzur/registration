@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Application Review</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Applying for the position of : <b> {{ $pdata->occupation->name }}</b><br>
                    <hr>
                    Full Name : <b>{{ $pdata->name }}</b><br>
                    Email : <b>{{ $user->email }}</b><br>
                    Alternate Email : <b>{{ $pdata->alternate_email }}</b><br>
                    Phone : <b>{{ $pdata->phone }}</b><br>
                    Gender : <b>{{ $pdata->gender->type }}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date of Birth : <b>{{ $pdata->dob }}</b><br>
                    Father's Name : <b>{{ $pdata->father_name }}</b><br>
                    Mother's Name : <b>{{ $pdata->mother_name }}</b><br>
                    Nationality : <b>{{ $pdata->nationality->type }}</b>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Marital Status : <b>{{ $pdata->marital_status->type }}</b><br>
                    Community : <b>{{ $pdata->community->type }}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Religion : <b>{{ $pdata->religion->type }}</b><br>
                    Education : <b>{{ $pdata->education_qualification }}</b><br>
                    <hr>
                    <b>Address</b><br>
                    {{ $address->line1 }}<br>
                    {{ $address->line2 }}<br>
                    {{ $address->line3 }}<br>
                    {{ $address->city }}<br>
                    {{ $address->pincode }}<br>
                    {{ $address->state->name }}<br>
                    <hr>
                    <b>Documents Uploaded</b><br>
                    @foreach($user->documents as $document)
                        {{ $document->document_type->type }} : <a href="{{ url($document->path) }}" target="_blank">View</a><br>
                    @endforeach
                    <hr>
                    <b>Exam Centres</b><br>
                    @foreach($user->exam_centres as $centre)
                        {{ $centre->preference }}. {{ \DB::table('exam_centres')->where('id',$centre->id)->get(['name'])->first()->name }}
                    @endforeach
                    @if($status<4)
                    <hr>
                    <form method="POST" id="verification" action="{{ url('/register/4') }}">
                        @csrf
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="verify_check" name="verify_check" value="1" required autofocus @if($status>=4) checked @endif>
                            <label class="form-check-label" for="verify_check">&nbsp;&nbsp;<b> I here by declare, all the information listed above are correct.</b></label>
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-sm pull-right" data-toggle="modal" data-target="#alert">
                        Verify and Proceed
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
                    @if($status<4)
                    <button type="button" class="btn btn-outline-primary btn-sm pull-right" data-toggle="modal" data-target="#alert">
                        Verify and Proceed
                    </button>
                    @elseif($status==4)
                        <a href="{{ url('/registration/5') }}" class="btn btn-outline-primary btn-sm pull-right">Proceed to Payment</a>
                    @else
                        
                    @endif
                    <a href="{{ url('/home') }}" class="btn btn-outline-danger btn-sm">Cancel & Exit</a>
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

<!-- Modal -->
<div class="modal fade" id="alert" tabindex="-1" role="dialog" aria-labelledby="alertLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="alertLabel">Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Hence forth you won't be able to make any changes to your application. Do you wish to submit your application for final review? If not then click on 'Make Changes' button.
      </div>
      <div class="modal-footer">
        <a href="{{ url('/home') }}" class="btn btn-outline-primary btn-sm">Make Changes</a>
        <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Cancel</button>
        <button type="submit" form="verification" class="btn btn-outline-success btn-sm">Yes</button>
      </div>
    </div>
  </div>
</div>
@endsection
