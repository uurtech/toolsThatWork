@extends("app")
@section("page")


<form action="{{ URL::TO('/tool/mxEntryCheck')}}" method="post">
    {{ csrf_field() }}
    <input class="form-control" name="domain" placeholder="@lang('mx.domain')"/>
<br/>
<br/>
<input type="submit" class="btn btn-success"/>
</form>

@if(isset($mx))
{!!$mx!!}
@endif
@endsection


