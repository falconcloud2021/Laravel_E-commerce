@extends('layouts.dashboard')
@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select id="inputStatus" class="form-control custom-select">
                  <option disabled>Select one</option>
                  <option>On Hold</option>
                  <option>Canceled</option>
                  <option selected>Success</option>
                </select>
              </div>
            
              <div class="form-group">
                <label for="inputProjectLeader">Project Leader</label>
                <input type="text" id="inputProjectLeader" class="form-control" value="Tony Chicken">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
          <div class="col-md-9">
              <div class="card card-dark">
                <div class="card-header">
                <h3 class="card-title">Main categories list</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Category name EN</th>
                    <th>Description EN</th>
                    <th>Category name UA</th>  
                    <th>Description UA</th>
                    <th>Image</th>
                    <th>Rating</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                @foreach($categoriesList as $item)
                  <tr>
                    <td>{{ $item->cat_name_en }}</td>
                    <td>{{ $item->cat_description_en }}</td>
                    <td>{{ $item->cat_name_ua }}</td>
                    <td>{{ $item->cat_description_ua }}</td>
                    <td>
                        <img src="/{{ $item->cat_image }}" style="width: 50px; height: 40px">
                    </td>
                    <td>{{ $item->cat_rating }}</td>
                    <td>
                        <a href="{{ route('categories.show', $item->id) }}" class="btn btn-sm btn-success" title="show">
                            <i class="fas fa-eye"></i></a></a>
                        <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-sm btn-info" title="edit">
                            <i class="fas fa-pencil-alt"></i></a>
                        <a href="{{ route('categories.destroy', $item->id) }}" class="btn btn-sm btn-danger" title="delete">
                            <i class="fas fa-trash"></i></a></a>
                    </td>
                  </tr>
                @endforeach

                  </tbody>
                  </table>
                </div>
              </div>
                <!-- /.card -->
            </div>

            <!-- right column -->
            <div class="col-md-3">
                <!-- general form elements -->
                <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title"><i>Add Category form</i></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="CategoryNameEN"><i>Category name EN</i>
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="cat_name_en" placeholder="Enter category name EN">
                        @error('cat_name_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="CategoryDescriptionEN"><i>Description EN</i></label>
                        {{-- <input type="text" class="form-control" name="cat_description_en" placeholder="Enter description EN"> --}}
                        <textarea class="form-control" name="cat_description_en" placeholder="Enter description EN" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="CategoryNameUA"><i>Category name UA</i>
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="cat_name_ua" placeholder="Enter category UA">
                        @error('cat_name_ua')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="CategoryDescriptionUA"><i>Description UA</i></label>
                        <input type="text" class="form-control" name="cat_description_ua" placeholder="Enter description EN">
                    </div>
                    <div class="form-group">
                        <label for="CategoryImage"><i>File input</i></label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="cat_image">
                            <label class="custom-file-label" for="InputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                        </div>
                    </div>
                    <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Dropzone.js <small><em>jQuery File Upload</em> like look</small></h3>
              </div>
              <div class="card-body">
                <div id="actions" class="row">
                  <div class="col-lg-6">
                    <div class="btn-group w-100">
                      <span class="btn btn-success col fileinput-button">
                        <i class="fas fa-plus"></i>
                        <span>Add files</span>
                      </span>
                      <button type="submit" class="btn btn-primary col start">
                        <i class="fas fa-upload"></i>
                        <span>Start upload</span>
                      </button>
                      <button type="reset" class="btn btn-warning col cancel">
                        <i class="fas fa-times-circle"></i>
                        <span>Cancel upload</span>
                      </button>
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center">
                    <div class="fileupload-process w-100">
                      <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table table-striped files" id="previews">
                  <div id="template" class="row mt-2">
                    <div class="col-auto">
                        <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                    </div>
                    <div class="col d-flex align-items-center">
                        <p class="mb-0">
                          <span class="lead" data-dz-name></span>
                          (<span data-dz-size></span>)
                        </p>
                        <strong class="error text-danger" data-dz-errormessage></strong>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                          <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                        </div>
                    </div>
                    <div class="col-auto d-flex align-items-center">
                      <div class="btn-group">
                        <button class="btn btn-primary start">
                          <i class="fas fa-upload"></i>
                          <span>Start</span>
                        </button>
                        <button data-dz-remove class="btn btn-warning cancel">
                          <i class="fas fa-times-circle"></i>
                          <span>Cancel</span>
                        </button>
                        <button data-dz-remove class="btn btn-danger delete">
                          <i class="fas fa-trash"></i>
                          <span>Delete</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Visit <a href="https://www.dropzonejs.com">dropzone.js documentation</a> for more examples and information about the plugin.
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-warning"><b>+</b> Add category</button>
                    </div>
                </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>


@endsection
