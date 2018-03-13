@extends("layouts.app")

@section('title',$share->title)
@section('description',$share->description)
@section('image', url('/share/')."/".$share->file)
@section("content")
<center>
<a href="{{ url('/share/') }}/{{ $share->file }}" target="_blank"><img src="{{ url('/share/') }}/{{ $share->file }}" style="max-width:750px"/></a>
</center>
@endsection