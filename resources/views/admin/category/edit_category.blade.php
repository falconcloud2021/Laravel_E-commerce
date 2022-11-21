@extends('layouts.dashboard')
@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
      <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Category form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('categories.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $categoryEdit->id }}">
                    <input type="hidden" name="old_image" value="{{ $categoryEdit->cat_image }}">
                    <div class="card-body">
                    <div class="form-group">
                        <label for="CategoryNameEN">Category name EN
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="cat_name_en" value="{{ $categoryEdit->cat_name_en }}">
                        @error('cat_name_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="CategoryDescriptionEN">Description EN</label>
                        <input type="text" class="form-control" name="cat_description_en" value="{{ $categoryEdit->cat_description_en }}">
                    </div>
                    <div class="form-group">
                        <label for="CategoryNameUA">Category name UA
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="cat_name_ua" value="{{ $categoryEdit->cat_name_ua }}">
                        @error('cat_name_ua')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="CategoryDescriptionUA">Description UA</label>
                        <input type="text" class="form-control" name="cat_description_ua" value="{{ $categoryEdit->cat_description_ua }}">
                    </div>
                    <div class="form-group">
                        <label for="CategoryImage">File input</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="cat_image" value="{{ $categoryEdit->cat_image }}">
                            <label class="custom-file-label" for="InputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>


@endsection
