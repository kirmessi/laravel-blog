@extends('admin/layouts/app')


@section('main-content')
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Permissions Editor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
              <li class="breadcrumb-item active">Permissions</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Permission</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @include('admin.messages.errors')
              
              <form permission="form" action="{{ route('permission.update', $permission->id ) }}" method="post">
              {{ csrf_field() }}
              {{method_field('PUT')}}
                <div class="card-body">
                <div class="col-lg-offset-3 col-lg-6 pull-left">
                  <div class="form-group">
                    <label for="name">Permission</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $permission->name}}"  placeholder="Enter Permission">
                  </div>
                  </div>
                    <div class="col-lg-offset-3 col-lg-6 pull-right">
                     <div class="form-group">
                      <label for="for">Permission For</label>
                      <select name="for" id="for" class="form-control">
                       <option value="{{ $permission->for}}" selected>{{ $permission->for}}</option>
                      <option value="User">User</option>
                      <option value="Post">Post</option>
                      <option value="Other">Other</option>
                      </select>
                  </div>
                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <div class="pull-right"><button type="submit" class="btn btn-primary">Submit</button></div>
                     <div class="pull-left"><a href="{{ route('permission.index') }}" class="btn btn-warning">Back</a></div>
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

@endsection

@section('footerSection')


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


@endsection