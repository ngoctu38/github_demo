@extends('products.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Operation</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('operations.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $operation->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img src="./public/images/{{ $operation->image }}" alt="">
                <img src="public/images/anh1.jpg" alt="">
            </div>
        </div>
    </div>
@endsection
