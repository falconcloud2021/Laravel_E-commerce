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
                    <h3 class="card-title">Product edit form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="PATCH" action="{{ route('products.update', $productEdit->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="CategoryNameEN">Product name EN
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="cat_name_en" value="{{ $productEdit->prod_name_en }}">
                        @error('product_name_en')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="CategoryDescriptionEN">Description EN</label>
                        <input type="text" class="form-control" name="cat_description_en" value="{{ $productEdit->prod_description_en }}">
                    </div>
                    <div class="form-group">
                        <label for="CategoryNameUA">Product name UA
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="cat_name_ua" value="{{ $productEdit->prod_name_ua }}">
                        @error('cat_name_ua')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="CategoryDescriptionUA">Description UA</label>
                        <input type="text" class="form-control" name="cat_description_ua" value="{{ $productEdit->prod_description_ua }}">
                    </div>
                    <div class="form-group">
                        <label for="CategoryImage">File input</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="cat_image" value="{{ $productEdit->prod_image }}">
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
