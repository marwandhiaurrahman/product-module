@extends('adminlte::page')

@section('title', 'Crate Product')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Product</h1>
        </div>
        <div class="col-sm-6">
            <div class="breadcrumb float-sm-right">
                {{-- {{ Breadcrumbs::render('product.create') }} --}}
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create New Product</h3>
                    </div>
                    {!! Form::open(['route' => 'product.store', 'method' => 'POST']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama :</label>
                            {!! Form::text('name', null, ['placeholder' => 'Nama', 'id' => 'name', 'class' => 'form-control' . ($errors->has('keterangan') ? ' is-invalid' : null)]) !!}
                            <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="name">Detail :</label>
                            {!! Form::text('detail', null, ['placeholder' => 'Detail', 'id' => 'detail', 'class' => 'form-control' . ($errors->has('detail') ? ' is-invalid' : null)]) !!}
                            <span class="error invalid-feedback">{{ $errors->first('detail') }}</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
