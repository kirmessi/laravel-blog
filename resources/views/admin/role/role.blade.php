@extends('admin/layouts/app')

<link rel="stylesheet" href="{{asset('admin/plugins/iCheck/all.css')}}"> @section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Roles Editor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Roles</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Roles</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    @include('admin.messages.errors')

                    <form role="form" action="{{ route('role.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="col-lg-offset-3 col-lg-6 pull-left">
                                <div class="form-group">
                                    <label for="name">Role Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Role Name">
                                </div>
                            </div>
                            <div class="col-lg-offset-3 col-lg-6 pull-right">
                                <div class="col-lg-offset-3 col-lg-4 pull-left">
                                    <div>
                                        <label>Posts Permissions</label>
                                    </div>
                                    @foreach ($permissions as $permission)
                                        
                                        @if ($permission->for == 'Post')
                                        <div>
                                                 <label class="">
                                            <div class="icheckbox_flat-green" aria-checked="true" aria-disabled="false" style="position: relative;">
                                                <input type="checkbox" class="flat-red" name="permission[]" value="{{ $permission->id }}" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                        </label>
                                        {{ $permission->name }}
                                        </div>
                                        @endif
                                    @endforeach
                                  </div>
                                  <div class="col-lg-offset-3 col-lg-4 pull-left">
                                    <div>
                                        <label>User Permissions</label>
                                    </div>
                           @foreach ($permissions as $permission)
                                        
                                        @if ($permission->for == 'User')
                                        <div>
                                                 <label class="">
                                            <div class="icheckbox_flat-green" aria-checked="true" aria-disabled="false" style="position: relative;">
                                                <input type="checkbox" class="flat-red" name="permission[]" value="{{ $permission->id }}" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                        </label>
                                        {{ $permission->name }}
                                        </div>
                                        @endif
                                    @endforeach

                                </div>
                                <div class="col-lg-offset-3 col-lg-4 pull-left">
                                    <div>
                                        <label>Other Permissions</label>
                                    </div>
                           @foreach ($permissions as $permission)
                                        
                                        @if ($permission->for == 'Other')
                                        <div>
                                                 <label class="">
                                            <div class="icheckbox_flat-green" aria-checked="true" aria-disabled="false" style="position: relative;">
                                                <input type="checkbox" class="flat-red" name="permission[]" value="{{ $permission->id }}" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                        </label>
                                        {{ $permission->name }}
                                        </div>
                                        @endif
                                    @endforeach

                                </div>
                                
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                            <div class="pull-left"><a href="{{ route('role.index') }}" class="btn btn-warning">Back</a></div>
                        </div>

                    </form>
                </div>

            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>

@endsection @section('footerSection')


<script src="{{asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('admin/plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{asset('admin/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('admin/plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{asset('admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{asset('admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{asset('admin/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="{{asset('admin/dist/js/pages/dashboard.js') }}"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js') }}"></script>

<script src="{{asset('admin/plugins/iCheck/icheck.min.js')}}"></script>

<script type="text/javascript">
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    })
</script>

@endsection