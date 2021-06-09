@extends('demos.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 7 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('demos.create') }}"> Create New Demo</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>status</th>
        </tr>
        @foreach ($demo as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>
                @if( $product->status == 0)
                    <button type="submit">Publish</button>
                @else
                    <button type="submit">Unpublish</button>
                @endif
                </td>
            </tr>
        @endforeach
    </table>

    {!! $demo->links() !!}

@endsection
