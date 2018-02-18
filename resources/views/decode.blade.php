@extends("app")

@section("page")
<a href="{{url('/tool/decode/base64Decode')}}" class="btn btn-info">@lang('decode.base64Decode')</a>
<a href="{{url('/tool/decode/urlDecode')}}" class="btn btn-info">@lang("decode.urlDecode")</a>
@endsection