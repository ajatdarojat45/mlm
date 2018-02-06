<!DOCTYPE html>
<html>

<head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>@yield('title')</title>

   <link href="{{asset('inspinia/css/bootstrap.min.css')}}" rel="stylesheet">
   <link href="{{asset('inspinia/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
   <link href="{{asset('inspinia/css/animate.css')}}" rel="stylesheet">
   <link href="{{asset('inspinia/css/style.css')}}" rel="stylesheet">
   <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('datatables/dataTables.bootstrap.css') }}">
   {{-- autocomplete --}}
   <link rel="stylesheet" type="text/css" href="">
   <link href="{{ asset('autocomplete/jquery.ui.autocomplete.css') }}" rel="stylesheet">

</head>

<body>
   <div id="wrapper">
      <nav class="navbar-default navbar-static-side" role="navigation">
         <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
               <li class="nav-header">
                  <div class="dropdown profile-element">
                     <span>
                        <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                     </span>
                     <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                           <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong></span>
                           <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                        </span>
                     </a>
                     <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                     </ul>
                  </div>
                  <div class="logo-element">
                     IN+
                  </div>
               </li>
               <li>
                  <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
               </li>
               <li>
                  <a href="index.html"><i class="fa fa-database"></i> <span class="nav-label">Data Master</span> <span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level collapse">
                     <li><a href="{{route('package/index')}}">Package</a></li>
                     <li><a href="{{route('package/index')}}">Bonus</a></li>
                  </ul>
               </li>
               <li>
                  <a href="#"><i class="fa fa-money"></i> <span class="nav-label">Daily Bonus</span> <span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level collapse">
                     <li><a href="{{route('dailyBonus/index', 'all')}}">All</a></li>
                     <li><a href="{{route('dailyBonus/index', 'qualified')}}">Qualified</a></li>
                     <li><a href="{{route('dailyBonus/index', 'unqualified')}}">Unqualified</a></li>
                  </ul>
               </li>
               <li>
                  <a href="#"><i class="fa fa-bitcoin"></i> <span class="nav-label">Pin</span> <span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level collapse">
                     <li><a href="{{route('pin/index', 'available')}}">Available</a></li>
                     <li><a href="{{route('pin/index', 'sent')}}">Sent</a></li>
                  </ul>
               </li>
               <li>
                  <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Member</span> <span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level collapse">
                     <li><a href="{{route('member/create')}}">Create</a></li>
                     <li><a href="{{route('member/index')}}">List</a></li>
                  </ul>
               </li>
            </ul>
         </div>
      </nav>
      <div id="page-wrapper" class="gray-bg">
         <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
               <div class="navbar-header">
                  <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                  <form role="search" class="navbar-form-custom" action="search_results.html">
                     <div class="form-group">
                        <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                     </div>
                  </form>
               </div>
               <ul class="nav navbar-top-links navbar-right">
                  <li>
                     <span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
                  </li>
                  <li>
                     <a href="login.html">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                  </li>
               </ul>
            </nav>
         </div>
         @yield('content')
         <div class="footer">
            <div class="pull-right">
               10GB of <strong>250GB</strong> Free.
            </div>
            <div>
               <strong>Copyright</strong> Example Company &copy; 2014-2017
            </div>
         </div>
      </div>
   </div>
   <!-- Mainly scripts -->
   <script src="{{asset('inspinia/js/jquery-3.1.1.min.js')}} "></script>
   <script src="{{asset('inspinia/js/bootstrap.min.js')}}"></script>
   <script src="{{asset('inspinia/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
   <script src="{{asset('inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
   <!-- Custom and plugin javascript -->
   <script src="{{asset('inspinia/js/inspinia.js')}}"></script>
   <script src="{{asset('inspinia/js/plugins/pace/pace.min.js')}}"></script>
   <!-- DataTables -->
   <script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('datatables/dataTables.bootstrap.min.js') }}"></script>
   <script>
      $(function () {
         $("#example1").DataTable();
         $("#example3").DataTable();
         $("#example4").DataTable();
         $("#example5").DataTable();
         $("#example6").DataTable();
         $("#example7").DataTable();
         $("#example8").DataTable();
         $("#example9").DataTable();
         $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
         });
     });
   </script>
   {{-- autocomplete --}}
   <script src="{{ asset('autocomplete/jquery-ui.min.js') }}"></script>
   <script type="text/javascript">
      src = "{{ route('desa/autoComplete') }}";
      $(function() {
         $("#search_text").autocomplete({
            source: src,
            minLength: 3,
            select: function( event, ui ) {
                $("#search_text").val(ui.item.value);
                $("#desa_id").val(ui.item.id);
            }
         });
      });
   </script>
</body>

</html>
