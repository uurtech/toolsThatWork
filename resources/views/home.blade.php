@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form action="share-information" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="text" name="title" placeholder="Title">
                            <input type="text" name="description" placeholder="Description">
                            <input type="file" name="file"/>
                            <input type="submit">
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
