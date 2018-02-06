@extends('layouts.admin')
@section('title')
   Pin - FIMZ Cemerlang Bangsa
@endsection
@section('content')
   <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
         <h2>Package</h2>
         <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active"><strong>Pin</strong></li>
            <li class="active"><strong>{{$stat}}</strong></li>
         </ol>
      </div>
      <div class="col-lg-2">
      </div>
   </div>
   <div class="wrapper wrapper-content animated fadeInRight">
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
          <div class="col-lg-12 animated fadeInRight">
              <div class="ibox-content">
                  <h2 class="page-header">Pin ({{ $pins->count() }})</h2>
                  <div class="mail-tools tooltip-demo m-t-md">
                     <div class="btn-group pull-right">
                        {{-- {{ $banks->links() }} --}}
                     </div>
                     @if ($stat == 'available')
                        <a class="btn btn-primary btn-sm" data-toggle="modal" href='#myModal'><i class="fa fa-cogs"></i> Generate</a>
                        <a class="btn btn-primary btn-sm" data-toggle="modal" href='#transfer'><i class="fa fa-exchange"></i> Transfer</a>
                     @endif
                  </div><br>
                  <div class="table-responsive">
                      <table id="example1" class="table table-hover table-striped">
                          <thead>
                              <tr>
                                 <th style="text-align: center;">No.</th>
                                 <th style="text-align: center;">Pin</th>
                                 <th style="text-align: center;">Package</th>
                                 <th style="text-align: center;">Generator</th>
                                 @if ($stat == 'sent')
                                    <th style="text-align: center;">Member</th>
                                    <th style="text-align: center;">Type</th>
                                    <th style="text-align: center;">Stat</th>
                                 @endif
                                 <th style="text-align: center;">Created at</th>
                              </tr>
                          </thead>
                          <tbody>
                              @php
                              $no = 0;
                              @endphp
                              @foreach ($pins as $pin)
                              <tr class="read">
                                 <td class="text-center">{{ ++$no }}</td>
                                 <td class="text-center">{{ $pin->name }}</td>
                                 <td class="text-center">{{ $pin->package->name }}</td>
                                 <td class="text-center">{{ $pin->user->name }}</td>
                                 @if ($stat == 'sent')
                                    <td class="text-center">{{ $pin->memberPin->member->name }}</td>
                                    @if ($pin->memberPin->type == 1)
                                       <td class="text-center">Registrasi</td>
                                    @elseif ($pin->memberPin->type == 2)
                                       <td class="text-center">Repeat Order (RO)</td>
                                    @endif
                                    @if ($pin->memberPin->stat == 0)
                                       <td class="text-center">No Bonus</td>
                                    @elseif ($pin->memberPin->stat == 1)
                                       <td class="text-center">Full Bonus</td>
                                    @endif
                                 @endif
                                 <td class="text-center">{{ $pin->created_at }}</td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
   </div>
   <br>
   {{-- generate modal --}}
   <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content animated bounceInRight">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                   <i class="fa fa-cogs modal-icon"></i>
                   <h4 class="modal-title">Pin</h4>
                   <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
               </div>
               <form action="{{ route('pin/generate') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                   <div class="modal-body">
                       <fieldset class="form-horizontal">
                           <div class="form-group">
                               <label class="col-sm-2 control-label">Quantity:</label>
                               <div class="col-sm-10">
                                   @if ($errors->has('qty'))
                                   <span class="help-block">
                                       <strong style="color: red">{{ $errors->first('qty') }}</strong>
                                   </span>
                                   @endif
                                   <input type="number" name="qty" class="form-control" value="{{ old('qty') }}">
                               </div>
                           </div>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Package:</label>
                              <div class="col-sm-10">
                                 @if ($errors->has('package'))
                                    <span class="help-block">
                                       <strong style="color: red">{{ $errors->first('package') }}</strong>
                                    </span>
                                 @endif
                                 <select class="form-control" name="package" required>
                                    <option value="">-- Please select package --</option>
                                    @foreach ($packages as $package)
                                       <option value="{{$package->id}}">{{$package->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                       </fieldset>
                       {{csrf_field()}}
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-white btn-sm" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                       <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-cogs"></i> Generate</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
   {{-- modal transfer --}}
   <div class="modal inmodal" id="transfer" tabindex="-1" role="dialog" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content animated bounceInRight">
               <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                   <i class="fa fa-cogs modal-icon"></i>
                   <h4 class="modal-title">Transfer</h4>
                   <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
               </div>
               <form action="{{ route('memberPin/store') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                   <div class="modal-body">
                       <fieldset class="form-horizontal">
                           <div class="form-group">
                               <label class="col-sm-2 control-label">Quantity:</label>
                               <div class="col-sm-10">
                                   @if ($errors->has('qty'))
                                   <span class="help-block">
                                       <strong style="color: red">{{ $errors->first('qty') }}</strong>
                                   </span>
                                   @endif
                                   <input type="number" name="qty" class="form-control" value="{{ old('qty') }}">
                               </div>
                           </div>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Package:</label>
                              <div class="col-sm-10">
                                 @if ($errors->has('package'))
                                    <span class="help-block">
                                       <strong style="color: red">{{ $errors->first('package') }}</strong>
                                    </span>
                                 @endif
                                 <select class="form-control" name="package" required>
                                    <option value="">-- Please select package --</option>
                                    @foreach ($packages as $package)
                                       <option value="{{$package->id}}">{{$package->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="form-group">
                               <label class="col-sm-2 control-label">Send to:</label>
                               <div class="col-sm-10">
                                   @if ($errors->has('memebr'))
                                   <span class="help-block">
                                       <strong style="color: red">{{ $errors->first('member') }}</strong>
                                   </span>
                                   @endif
                                   <input type="text" name="member" class="form-control" value="{{ old('member') }}">
                               </div>
                           </div>
                           <div class="form-group">
                               <label class="col-sm-2 control-label">Type:</label>
                               <div class="col-sm-10">
                                   @if ($errors->has('type'))
                                   <span class="help-block">
                                       <strong style="color: red">{{ $errors->first('type') }}</strong>
                                   </span>
                                   @endif
                                    <select class="form-control" name="type" required>
                                       <option value="">-- Please select type --</option>
                                       <option value="0">No Bonus</option>
                                       <option value="1">Full Bonus</option>
                                    </select>
                               </div>
                           </div>
                           <div class="form-group">
                               <label class="col-sm-2 control-label">Stat:</label>
                               <div class="col-sm-10">
                                   @if ($errors->has('stat'))
                                   <span class="help-block">
                                       <strong style="color: red">{{ $errors->first('stat') }}</strong>
                                   </span>
                                   @endif
                                    <select class="form-control" name="stat" required>
                                       <option value="">-- Please select stat --</option>
                                       <option value="1">Registrasi</option>
                                       <option value="2">Repeat Order (RO)</option>
                                    </select>
                               </div>
                           </div>
                       </fieldset>
                       {{csrf_field()}}
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-white btn-sm" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                       <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-send"></i> Send</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
@endsection
