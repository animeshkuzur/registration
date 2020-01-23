@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload Documents</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($documents->isEmpty())
                            
                        <table class="table table-sm">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Documents</th>
                              <th scope="col">Select</th>
                              <th scope="col">Action</th>
                              <th scope="col">View</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                
                              <th scope="row">1</th>
                              <td>Photo<br>Note 1: File size should not exceed 300KB.<br>Note 2: Only JPEG and PNG file formats allowed.</td>
                              <td>
                                    <form method="POST" id="image" action="{{ url('/register/2/image') }}" enctype="multipart/form-data">
                                @csrf
                                  <div class="form-group">
                                    <input type="file" class="form-control-file @error('photo') is-invalid @enderror" id="photo" name="photo" required autofocus>
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                              </form>
                              </td>
                              <td>
                                <button type="submit" form="image" class="btn btn-outline-primary btn-sm pull-right">
                                    Upload
                                </button>
                              </td>
                              <td>
                                Empty
                              </td>
                          
                            </tr>
                            <tr>
                                
                              <th scope="row">2</th>
                              <td>Signature<br>Note 1: File size should not exceed 300KB.<br>Note 2: Only JPEG and PNG file formats allowed.</td>
                              <td>
                                <form method="POST" id="signature" action="{{ url('/register/2/signature') }}" enctype="multipart/form-data">
                                @csrf
                                  <div class="form-group">
                                    <input type="file" class="form-control-file @error('signature') is-invalid @enderror" id="signature" name="signature" required autofocus>
                                    @error('signature')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                              </form>
                              </td>
                              <td>
                                  <button type="submit" form="signature" class="btn btn-outline-primary btn-sm pull-right">
                                    Upload
                                </button>
                              </td>
                              <td>
                                  Empty
                              </td>
                          
                            </tr>
                            <tr>
                                
                              <th scope="row">3</th>
                              <td>10th Marksheet<br>Note 1: File size should not exceed 2MB.<br>Note 2: Only JPEG, PNG and PDF file formats allowed.</td>
                              <td>
                                <form method="POST" id="marksheet_10" action="{{ url('/register/2/10th-marksheet') }}" enctype="multipart/form-data">
                                @csrf
                                  <div class="form-group">
                                    <input type="file" class="form-control-file @error('10th_mark_sheet') is-invalid @enderror" id="10th_mark_sheet" name="10th_mark_sheet" required autofocus>
                                    @error('10th_mark_sheet')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    

                                  </div>
                              </form>
                              </td>
                              <td>
                                  <button type="submit" form="marksheet_10" class="btn btn-outline-primary btn-sm pull-right">
                                    Upload
                                </button>
                              </td>
                              <td>
                                  Empty
                              </td>
                          
                            </tr>
                            <tr>
                                
                              <th scope="row">4</th>
                              <td>12th Marksheet<br>Note 1: File size should not exceed 2MB.<br>Note 2: Only JPEG, PNG and PDF file formats allowed.</td>
                              <td>
                                <form method="POST" id="marksheet_12" action="{{ url('/register/2/12th-marksheet') }}" enctype="multipart/form-data">
                                @csrf
                                  <div class="form-group">
                                    <input type="file" class="form-control-file @error('12th_mark_sheet') is-invalid @enderror" id="12th_mark_sheet" name="12th_mark_sheet" required autofocus>
                                    @error('12th_mark_sheet')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    

                                  </div>
                              </form>
                              </td>
                              <td>
                                  <button type="submit" form="marksheet_12" class="btn btn-outline-primary btn-sm pull-right">
                                    Upload
                                </button>
                              </td>
                              <td>
                                  Empty
                              </td>
                          
                            </tr>
                            @if($community>1)
                                <tr>
                                    
                              <th scope="row">5</th>
                              <td>Community Certificate<br>Note 1: File size should not exceed 2MB.<br>Note 2: Only JPEG, PNG and PDF file formats allowed.</td>
                              <td>
                                <form method="POST" id="community_cert" action="{{ url('/register/2/community-cert') }}" enctype="multipart/form-data">
                                @csrf
                                  <div class="form-group">
                                    <input type="file" class="form-control-file @error('community_cert') is-invalid @enderror" id="community_cert" name="community_cert" required autofocus>
                                    @error('community_cert')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                  </div>
                              </form>
                              </td>
                              <td>
                                  <button type="submit" form="community_cert" class="btn btn-outline-primary btn-sm pull-right">
                                    Upload
                                </button>
                              </td>
                              <td>
                                  Empty
                              </td>
                          
                            </tr>
                            @endif
                          </tbody>
                        </table>
                        <hr>
                    
                    
                    @else
                    <!-- <form method="POST" id="documents" action="{{ url('/register/2') }}">
                        @csrf -->

                        <table class="table table-sm">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Documents</th>
                              <th scope="col">Select</th>
                              <th scope="col">Action</th>
                              <th scope="col">View</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                
                              <th scope="row">1</th>
                              <td>Photo<br>Note 1: File size should not exceed 300KB.<br>Note 2: Only JPEG and PNG file formats allowed.</td>
                              <td>
                                    <form method="POST" id="image" action="{{ url('/register/2/image') }}" enctype="multipart/form-data">
                                @csrf
                                  <div class="form-group">
                                    <input type="file" class="form-control-file @error('photo') is-invalid @enderror" id="photo" name="photo" required autofocus>
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                              </form>
                              </td>
                              <td>
                                <button type="submit" form="image" class="btn btn-outline-primary btn-sm pull-right">
                                    Upload
                                </button>
                              </td>
                              <td>
                                @foreach($documents as $document)
                                    @if($document->document_type_id==1)
                                        <a href="{{ url($document->path) }}" target="_blank">View</a>
                                   @endif
                                @endforeach
                              </td>
                          
                            </tr>
                            <tr>
                                
                              <th scope="row">2</th>
                              <td>Signature<br>Note 1: File size should not exceed 300KB.<br>Note 2: Only JPEG and PNG file formats allowed.</td>
                              <td>
                                <form method="POST" id="signature" action="{{ url('/register/2/signature') }}" enctype="multipart/form-data">
                                @csrf
                                  <div class="form-group">
                                    <input type="file" class="form-control-file @error('signature') is-invalid @enderror" id="signature" name="signature" required autofocus>
                                    @error('signature')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                              </form>
                              </td>
                              <td>
                                  <button type="submit" form="signature" class="btn btn-outline-primary btn-sm pull-right">
                                    Upload
                                </button>
                              </td>
                              <td>
                                  @foreach($documents as $document)
                                    @if($document->document_type_id==2)
                                        <a href="{{ url($document->path) }}" target="_blank">View</a>
                                    @endif
                                @endforeach
                              </td>
                          
                            </tr>
                            <tr>
                                
                              <th scope="row">3</th>
                              <td>10th Marksheet<br>Note 1: File size should not exceed 2MB.<br>Note 2: Only JPEG, PNG and PDF file formats allowed.</td>
                              <td>
                                <form method="POST" id="marksheet_10" action="{{ url('/register/2/10th-marksheet') }}" enctype="multipart/form-data">
                                @csrf
                                  <div class="form-group">
                                    <input type="file" class="form-control-file @error('10th_mark_sheet') is-invalid @enderror" id="10th_mark_sheet" name="10th_mark_sheet" required autofocus>
                                    @error('10th_mark_sheet')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    

                                  </div>
                              </form>
                              </td>
                              <td>
                                  <button type="submit" form="marksheet_10" class="btn btn-outline-primary btn-sm pull-right">
                                    Upload
                                </button>
                              </td>
                              <td>
                                  @foreach($documents as $document)
                                    @if($document->document_type_id==3)
                                        <a href="{{ url($document->path) }}" target="_blank">View</a>
                                    @endif
                                @endforeach
                              </td>
                          
                            </tr>
                            <tr>
                                
                              <th scope="row">4</th>
                              <td>12th Marksheet<br>Note 1: File size should not exceed 2MB.<br>Note 2: Only JPEG, PNG and PDF file formats allowed.</td>
                              <td>
                                <form method="POST" id="marksheet_12" action="{{ url('/register/2/12th-marksheet') }}" enctype="multipart/form-data">
                                @csrf
                                  <div class="form-group">
                                    <input type="file" class="form-control-file @error('12th_mark_sheet') is-invalid @enderror" id="12th_mark_sheet" name="12th_mark_sheet" required autofocus>
                                    @error('12th_mark_sheet')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    

                                  </div>
                              </form>
                              </td>
                              <td>
                                  <button type="submit" form="marksheet_12" class="btn btn-outline-primary btn-sm pull-right">
                                    Upload
                                </button>
                              </td>
                              <td>
                                  @foreach($documents as $document)
                                    @if($document->document_type_id==4)
                                        <a href="{{ url($document->path) }}" target="_blank">View</a>
                                    @endif
                                @endforeach
                              </td>
                          
                            </tr>
                            @if($community>1)
                                <tr>
                                    
                              <th scope="row">5</th>
                              <td>Community Certificate<br>Note 1: File size should not exceed 2MB.<br>Note 2: Only JPEG, PNG and PDF file formats allowed.</td>
                              <td>
                                <form method="POST" id="community_cert" action="{{ url('/register/2/community-cert') }}" enctype="multipart/form-data">
                                @csrf
                                  <div class="form-group">
                                    <input type="file" class="form-control-file @error('community_cert') is-invalid @enderror" id="community_cert" name="community_cert" required autofocus>
                                    @error('community_cert')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                  </div>
                              </form>
                              </td>
                              <td>
                                  <button type="submit" form="community_cert" class="btn btn-outline-primary btn-sm pull-right">
                                    Upload
                                </button>
                              </td>
                              <td>
                                @foreach($documents as $document)
                                    @if($document->document_type_id==5)
                                        <a href="{{ url($document->path) }}" target="_blank">View</a>
                                    @endif
                                @endforeach
                              </td>
                          
                            </tr>
                            @endif
                          </tbody>
                        </table>
                        <hr>
                    
                    @endif
                    <form method="POST" id="documents" action="{{ url('/register/2') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary btn-sm pull-right">
                        Save and Proceed
                    </button>
                    </form>
                    
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

                    <button type="submit" form="documents" class="btn btn-outline-primary btn-sm">
                        Save and Proceed
                    </button>
                    
                    <a href="{{ url('/home') }}" class="btn btn-outline-danger btn-sm">Cancel & Exit</a>
                    <hr>
                    Progress
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: {{($status/6)*100}}%" aria-valuenow="{{ $status }}" aria-valuemin="0" aria-valuemax="6"></div>
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
</div>
@endsection
