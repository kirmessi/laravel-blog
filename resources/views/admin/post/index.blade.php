@extends('admin/layouts/app')


@section('headSection')

  <link rel="stylesheet" href="{{asset('admin/plugins/datatables/dataTables.bootstrap4.css') }}">

@endsection



@section('main-content')



<div class="content-wrapper">

<br>
@include('admin.messages.success')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
              <li class="breadcrumb-item active">Post</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Posts</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
     
<div class="card">
            <div class="card-header">
             <div class="pull-left"><h3 class="card-title">All Posts</h3></div>
            @can('posts.create', Auth::user())
            <div class="pull-right"><a href="{{ route('post.create') }}" class="btn btn-success">Add New</a></div>
            @endcan  
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.Name</th>
                  <th>Post Title</th>
                  <th>Post SubTitle</th>
                  <th>Slug</th>
                  <th>Status</th>
                  <th>Created at</th>
                  @can('posts.update', Auth::user())<th>Edit</th>@endcan
                  @can('posts.update', Auth::user())<th>Delete</th>@endcan
                </tr>
                </thead>
                <tbody>
              
                   @foreach ($posts as $post) 
                  <tr>
                  <td>{{ $loop->index+1 }}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->subtitle }}</td>
                  <td>{{ $post->slug }}</td>
                 <td>{{ $post->status? 'Published' : 'Pending' }}</td>
                  <td>{{ $post->created_at }}</td>
                   @can('posts.update', Auth::user())
                 <td><a href="{{ route('post.edit', $post->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                   @endcan
                    <td>
                     @can('posts.delete', Auth::user())
                  <form id="delete-form-{{$post->id}}" action="{{ route('post.destroy', $post->id) }}" method="post" style="dispaly:none">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    </form>
                 <a href="" onclick="

                 if(confirm('Are you sure, You want to delete this?'))
                  
                 {

                  event.preventDefault();

                  document.getElementById('delete-form-{{ $post->id }}').submit();

                 } 

                 else{

                    event.preventDefault();

                 }"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                  </td>
                  @endcan
                </tr>
                   @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>S.Name</th>
                  <th>Post Title</th>
                  <th>Post SubTitle</th>
                  <th>Slug</th>
                  <th>Status</th>
                  <th>Created at</th>
                  @can('posts.update', Auth::user())<th>Edit</th>@endcan
                  @can('posts.update', Auth::user())<th>Delete</th>@endcan
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