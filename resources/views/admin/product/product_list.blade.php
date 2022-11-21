@extends('layouts.dashboard')

@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Product name</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Rate</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($productsList as $item)
                  <tr>
                    <td>{{ $item->prod_name_en }}</td>
                    <td><img src="/{{ $item->prod_image }}" style="width: 50px; height: 40px"></td>
                    <td>{{ $item->category_id }}
                    </td>
                    <td>{{ $item->prod_description_en }}</td>
                    <td>{{ $item->price }}</td>
                    <td><input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success"></td>
                    <td>{{ $item->prod_rating }}</td>
                    <td>
                      <a href="{{ route('products.show', $item->id) }}" class="btn btn-sm btn-success" title="show">
                          <i class="fas fa-eye"></i></a></a>
                      <a href="{{ route('products.edit', $item->id) }}" class="btn btn-sm btn-info" title="edit">
                          <i class="fas fa-pencil-alt"></i></a>
                      <a href="{{ route('products.destroy', $item->id) }}" class="btn btn-sm btn-danger" title="delete">
                          <i class="fas fa-trash"></i></a></a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection