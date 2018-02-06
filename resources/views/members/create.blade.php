@extends('layouts.admin')
@section('title')
   Member Create - FIMZ Cemerlang Bangsa
@endsection
@section('content')
   <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
         <h2>Member</h2>
         <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="{{route('member/index')}}">Member</a></li>
            <li class="active"><strong>Create</strong></li>
         </ol>
      </div>
      <div class="col-lg-2">
      </div>
   </div>
   <div class="wrapper wrapper-content animated fadeInRight ecommerce">
      @if (session('success'))
      <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Success!</strong> {{session('success') }}
      </div>
      @endif
      @if (session('failed'))
      <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Success!</strong> {{session('failed') }}
      </div>
      @endif
      <div class="row">
         <div class="col-lg-12">
            <div class="tabs-container">
               <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#tab-1"> Create</a></li>
               </ul>
                  <div class="tab-content">
                     <div id="tab-1" class="tab-pane active">
                        <form action="{{ route('member/store') }}" method="post">
                           <div class="panel-body">
                              <fieldset class="form-horizontal">
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Pin:</label>
                                    <div class="col-sm-10">
                                       @if ($errors->has('memberPin'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('memberPin') }}</strong>
                                          </span>
                                       @endif
                                       <select class="form-control" name="memberPin">
                                          <option value="">-- Please select pin --</option>
                                          @foreach ($memberPins as $memberPin)
                                             <option value="{{$memberPin->id}}">
                                                {{$memberPin->pin->name}} - {{$memberPin->pin->package->name}}
                                                @if ($memberPin->stat == 0)
                                                   [No Bonus]
                                                @elseif ($memberPin->stat == 1)
                                                   [Full Bonus]
                                                @endif
                                             </option>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Upline:</label>
                                    <div class="col-sm-4">
                                       @if ($errors->has('upline'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('upline') }}</strong>
                                          </span>
                                       @endif
                                       <input type="text" name="upline" class="form-control" value="{{ old('upline') }}">
                                    </div>
                                    <label class="col-sm-2 control-label">Sponsor:</label>
                                    <div class="col-sm-4">
                                       @if ($errors->has('sponsor'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('sponsor') }}</strong>
                                          </span>
                                       @endif
                                       <input type="text" name="sponsor" class="form-control" value="{{ old('sponsor') }}">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Username:</label>
                                    <div class="col-sm-4">
                                       @if ($errors->has('username'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('username') }}</strong>
                                          </span>
                                       @endif
                                       <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                                    </div>
                                    <label class="col-sm-2 control-label">Password:</label>
                                    <div class="col-sm-4">
                                       @if ($errors->has('password'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('password') }}</strong>
                                          </span>
                                       @endif
                                       <input type="text" name="password" class="form-control" value="{{ old('password') }}">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">NIK:</label>
                                    <div class="col-sm-4">
                                       @if ($errors->has('nik'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('nik') }}</strong>
                                          </span>
                                       @endif
                                       <input type="text" name="nik" class="form-control" value="{{ old('nik') }}">
                                    </div>
                                    <label class="col-sm-2 control-label">Name:</label>
                                    <div class="col-sm-4">
                                       @if ($errors->has('name'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('name') }}</strong>
                                          </span>
                                       @endif
                                       <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Address:</label>
                                    <div class="col-sm-10">
                                       @if ($errors->has('address'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('address') }}</strong>
                                          </span>
                                       @endif
                                       <textarea name="address" class="form-control"></textarea>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Desa:</label>
                                    <div class="col-sm-10">
                                       @if ($errors->has('desa_id'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('desa_id') }}</strong>
                                          </span>
                                       @endif
                                       <input type="text" name="" class="form-control" value="" id="search_text">
                                       <input type="hidden" name="desa_id" class="form-control" value="" id="desa_id">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Ahliwaris:</label>
                                    <div class="col-sm-4">
                                       @if ($errors->has('heir'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('heir') }}</strong>
                                          </span>
                                       @endif
                                       <input type="text" name="heir" class="form-control" value="{{ old('heir') }}">
                                    </div>
                                    <label class="col-sm-2 control-label">Hubungan:</label>
                                    <div class="col-sm-4">
                                       @if ($errors->has('relation'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('relation') }}</strong>
                                          </span>
                                       @endif
                                       <input type="text" name="relation" class="form-control" value="{{ old('relation') }}">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">No. Rekening:</label>
                                    <div class="col-sm-4">
                                       @if ($errors->has('rekening_no'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('rekening_no') }}</strong>
                                          </span>
                                       @endif
                                       <input type="text" name="rekening_no" class="form-control" value="{{ old('rekening_no') }}">
                                    </div>
                                    <label class="col-sm-2 control-label">Nama Rekening:</label>
                                    <div class="col-sm-4">
                                       @if ($errors->has('rekening_name'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('rekening_name') }}</strong>
                                          </span>
                                       @endif
                                       <input type="text" name="rekening_name" class="form-control" value="{{ old('rekening_name') }}">
                                    </div>
                                 </div>
                              </fieldset>
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-primary pull-right btn-sm" data-toggle="tooltip" data-placement="top" title="Send">
                                 <i class="fa fa-save"></i> Save
                              </button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <br>
@endsection
