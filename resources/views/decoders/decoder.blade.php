@extends("app")
@section("page")


<div>
@lang("decode.".$type."Welcome")
</div>
<form method="post">
{{ csrf_field() }}
<input type="hidden" name="type" value="{{$type}}"/>
@if(!empty($raw))
<input type="text" class="form-control" name="decodeString" value="{{$raw}}"/>
@else
<input type="text" class="form-control" name="decodeString" placeholder="String to decode"/>
@endif

<br/><br/>
@if(!empty($data))
<input type="text" class="form-control" value="{{$data}}"/>
<br/><br/>
@endif
<input type="submit" class="btn btn-success"/>
</form>

@endsection