@extends('adminlte::page')

@section('title', 'Product')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Product</h1>
        </div>
        <div class="col-sm-6">
            <div class="breadcrumb float-sm-right">
                {{-- {{ Breadcrumbs::render('roles') }} --}}
            </div>
        </div>
    </div>
@stop

@section('content')
    {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Product</h3>
                        <div class="card-tools">
                            {{-- @can('product-setup') --}}
                            <a href="{{ route('product.create') }}" class="btn btn-sm btn-success">Tambah Product</a>
                            {{-- @endcan --}}
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="DataTable" class="table table-bordered table-striped dataTable dtr-inline"
                                        role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Keterangan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->detail }}</td>
                                                    <td>
                                                        {{-- @can('product-setup') --}}
                                                        <a class="btn btn-xs btn-success"
                                                            href="{{ route('product.show', $product) }}">Show</a>
                                                        <a class="btn btn-xs btn-primary"
                                                            href="{{ route('product.edit', $product) }}">Edit</a>
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['product.destroy', $product], 'style' => 'display:inline']) !!}
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                        {{-- @endcan --}}
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
        <!-- /.row -->
    </div>
@endsection

@section('js')
    <script>
        // $(function() {
        var table = $("#DataTable").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print', 'copy'
            ]
        });
        table.buttons().container()
            .appendTo($('.col-sm-12:eq(0)', table.table().container()));
    </script>
@endsection
