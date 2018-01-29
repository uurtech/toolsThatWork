@extends("app")
@section("page")


<div>
@lang("encode.md5Welcome")
</div>
<form method="post">
{{ csrf_field() }}
<input type="hidden" name="type" value="md5Encode"/>
@if(!empty($raw))
<input type="text" class="form-control" name="encodeString" value="{{$raw}}"/>
@else
<input type="text" class="form-control" name="encodeString" placeholder="String to encode"/>
@endif

<br/><br/>
@if(!empty($data))
<input type="text" class="form-control" value="{{$data}}"/>
<br/><br/>
@endif
<input type="submit" class="btn btn-success"/>
</form>

@endsection