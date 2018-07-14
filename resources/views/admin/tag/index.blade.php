@extends('admin/layouts/app')

@section('headSection')

  <link rel="stylesheet" href="{{asset('admin/plugins/datatables/dataTables.bootstrap4.css') }}">

@endsection
@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
@include('admin.messages.success')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
       
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
              <li class="breadcrumb-item active">Tag</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

 <div class="card-body">
     
<div class="card">
            <div class="card-header">
             <div class="pull-left"><h3 class="card-title">All Tags</h3></div>
              <div class="pull-right"><a href="{{ route('tag.create') }}" class="btn btn-success">Add New</a></div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.Name</th>
                  <th>Tag Name</th>
                  <th>Slug</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
              
                   @foreach ($tags as $tag) 
                  <tr>
                  <td>{{ $loop->index+1 }}</td>
                  <td>{{ $tag->name }}</td>
                  <td>{{ $tag->slug }}</td>
                  <td><a href="{{ route('tag.edit', $tag->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                  <td>
                  <form id="delete-form-{{$tag->id}}" action="{{ route('tag.destroy', $tag->id) }}" method="post" style="dispaly:none">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    </form>
             <a href="" onclick="

                 if(confirm('Are you sure, You want to delete this?'))
                  
                 {

                  event.preventDefault();

                  document.getElementById('delete-form-{{ $tag->id }}').submit();

                 } 

                 else{

                    event.preventDefault();

                 }"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                  </td>
                </tr>
                   @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>S.Name</th>
                  <th>Tag Name</th>
                  <th>Slug</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>




        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection


@section('footerSection')

<script src="{{asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{asset('admin/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- SlimScroll -->
<script src="{{asset('admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{asset('admin/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js') }}"></script>


<script>
  $(function () {
    $("#example1").DataTable();
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

@endsection