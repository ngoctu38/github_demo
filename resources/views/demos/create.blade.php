@extends('demos.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New operation</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('operations.index') }}"> Back</a>
            </div>
        </div>
    </div>

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

    <form action="{{ route('demos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="status" class="form-control" placeholder="status">
                </div>
            </div>

            <script>
                function Import()
                {
                    var x = confirm("Bạn có chắc muốn gửi file?");
                    if (x)
                        return true;
                    else
                        return false;
                }
            </script>

            <button onclick=" return Import(); " class="btn btn-primary"   value="true">save</button>
{{--            <div class="col-xs-12 col-sm-12 col-md-12 text-center">--}}
{{--                <button style="background-color: chartreuse" onclick="add()" type="submit" id="app" class="btn btn-primary">app</button>--}}
{{--                <button style="background-color: brown" onclick="remove()" type="submit" id="rem" class="btn btn-primary">remove</button>--}}
{{--                <button style="background-color: darkblue" onclick="save()" type="submit" id="save" class="btn btn-primary">save</button>--}}
{{--                <a class="btn btn-primary" style="background-color: brown" href="{{ route('demos.index') }}"> cancel</a>--}}
{{--            </div>--}}
{{--            <script>--}}
{{--                function add() {--}}

{{--                }--}}
{{--                function remove() {--}}
{{--                }--}}
{{--                function save() {--}}
{{--                }--}}
{{--            </script>--}}


        </div>
    </form>
@endsection
