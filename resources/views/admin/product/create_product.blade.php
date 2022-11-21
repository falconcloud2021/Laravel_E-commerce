@extends('layouts.dashboard')

@section('content')

<!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Quick Example</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                        <div class="form-group">
                            <label for="ProductNameEN">Product name EN
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="prod_name_en" placeholder="Enter category name EN">
                            @error('prod_name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ProductDescriptionEN">Description EN
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="prod_description_en" placeholder="Enter description EN">
                            @error('prod_description_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ProductNameUA">Назва продукту UA
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="prod_name_ua" placeholder="Введіть назву продукту">
                            @error('prod_name_ua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ProductDescriptionUA">Опис продукту UA
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="prod_description_ua" placeholder="Додайте опис продукту">
                            @error('prod_description_ua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ProductNameUA">Price
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" name="price" placeholder="Enter price">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ProductImage">File input</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="prod_image">
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
                        <button type="submit" class="btn btn-success">Add product</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            {{-- column --}}
            </div>
        </div>
    </section>

@endsection