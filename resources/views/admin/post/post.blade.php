   @extends('admin.layouts.app')

   @section('headSection')

  <link rel="stylesheet" href="{{asset('admin/plugins/select2/select2.min.css') }}">

   @endsection

   @section('main-content')
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post Editor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
              <li class="breadcrumb-item active">Post Editor</li>
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
                <h3 class="card-title">Titles</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
    @include('admin.messages.errors')

              <form role="form" action="{{ route('post.store') }}" method="post">
              {{csrf_field() }}
                <div class="card-body">
                <div class="col-lg-6 pull-left">
                  <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                  </div>
                 <div class="form-group">
                    <label for="slug">Post Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Slug">
                  </div>
                  <div class="form-group">
                  <label>Choose Category</label>
                  <select class="form-control select2 select2-hidden-accessible" multiple="" name="categories[]" data-placeholder="Select a Category" style="width: 100%;" tabindex="-1" aria-hidden="true">
                   @foreach ($categories as $category)

                    <option value="{{ $category->id }}">{{ $category->name }}</option>

                    @endforeach
                  </select>
              
                </div>
                </div>
                <div class="col-lg-6 pull-right">
                  <div class="form-group">
                    <label for="subtitle">Post Sub Title</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle"  placeholder="Enter Sub Title">
                    </div>

                    <div class="form-group col-lg-10 pull-right">
                    <label for="image">Image input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose image</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-check col-lg-2 pull-left" style="margin-top:40px;">
                    <input type="checkbox" class="form-check-input" value="1" id="exampleCheck1" name="status">                  
                    <label class="form-check-label" for="exampleCheck1">Publish</label>
                  </div>
                  <br>
                  <br>
                  <br>

                  <div class="form-group" style="margin-top: 13.5px;">
                  <label>Choose Tags</label>
                  <select class="form-control select2 select2-hidden-accessible" name="tags[]" multiple="" data-placeholder="Select a Tags" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  @foreach ($tags as $tag)

                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>

                    @endforeach
              
                  </select>
              
                </div>
  
                </div>
                </div>
                <!-- /.card-body -->
          <div class="card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Text Post Body
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
 
              </div>
              <!-- /. tools -->
            </div>

            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea id="editor1" name="body" placeholder="Place some text here"  style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>

            </div>
          </div>
                <div class="card-footer">
                  <div class="pull-right"><button type="submit" class="btn btn-primary">Submit</button></div>
                  <div class="pull-left"><a href="{{ route('post.index') }}" class="btn btn-warning">Back</a></div>
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

     @section('footer-editor')

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- FastClick -->
<script src="{{asset('admin/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js') }}"></script>

<script src="{{asset('admin/ckeditor/ckeditor.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('admin/plugins/select2/select2.full.min.js') }}"></script>
<script type="text/javascript">
  
$(document).ready(function() {

$('.select2').select2();
});
    
</script>
<script>
  CKEDITOR.replace( 'editor1' );
</script>


@endsection