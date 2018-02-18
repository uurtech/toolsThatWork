@extends("app")
@section("page")

<textarea class="form-control" rows="10" id="yazi" placeholder="@lang('string.paste')"></textarea>
<br/>
<input type="submit" onclick="convert()" class="btn btn-success"/>
@endsection


