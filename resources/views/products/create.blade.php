@extends('products.layout')

@section('content')
{{--    <div class="row">--}}
{{--        <div class="col-lg-12 margin-tb">--}}
{{--            <div class="pull-left">--}}
{{--                <h2>Add New Product</h2>--}}
{{--            </div>--}}
{{--            <div class="pull-right">--}}
{{--                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.importExcel') }}" method="POST" >
        @csrf
        <input type="file" name="file" accept=".txt" >
        <input type="submit" value="import" name="import" class="btn btn-warning">
        </form>
    <form action="{{ route('products.export') }}" method="POST" >
        @csrf
        <input type="submit" value="export" name="export" class="success">
        </form>
@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger error">
        <strong>Whoops! Something went wrong!</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
@endsection
