@extends('layouts.admin')
@section('title')
   Package - FIMZ Cemerlang Bangsa
@endsection
@section('content')
   <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
         <h2>Package</h2>
         <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active"><strong>Package</strong></li>
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
      <div class="row">
          <div class="col-lg-12 animated fadeInRight">
              <div class="ibox-content">
                  <h2 class="page-header">Package ({{ $packages->count() }})</h2>
                  <div class="mail-tools tooltip-demo m-t-md">
                      <div class="btn-group pull-right">
                          {{-- {{ $banks->links() }} --}}
                      </div>
                      {{-- <a class="btn btn-primary btn-sm" data-toggle="modal" href='#myModal'><i class="fa fa-plus-circle"></i> Add</a>
                      <a class="btn btn-danger btn-sm" href='#'><i class="fa fa-file-pdf-o"></i> Pdf</a> --}}
                  </div><br>
                  <div class="table-responsive">
                      <table id="example1" class="table table-hover table-striped">
                          <thead>
                              <tr>
                                  <th style="text-align: center;">No.</th>
                                  <th style="text-align: center;">Name</th>
                                  <th style="text-align: center;">Value</th>
                                  <th style="text-align: center;">Created at</th>
                              </tr>
                          </thead>
                          <tbody>
                              @php
                              $no = 0;
                              @endphp
                              @foreach ($packages as $package)
                              <tr class="read">
                                 <td class="text-center">{{ ++$no }}</td>
                                 <td class="text-left">{{ $package->name }}</td>
                                 <td class="text-center">{{ $package->value }}</td>
                                 <td class="text-center">{{ $package->created_at }}</td>
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
@endsection
