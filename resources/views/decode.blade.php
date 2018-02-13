@extends("app")

@section("page")
<a href="{{url('/tool/decode/base64Decode')}}" class="btn btn-info">@lang('encode.base64Decode')</a>
<a href="{{url('/tool/decode/urlDecode')}}" class="btn btn-info">@lang("encode.urlDecode")</a>
<a href="{{url('/tool/decode/sha256Decode')}}" class="btn btn-info">@lang("encode.sha256Decode")</a>
<a href="{{url('/tool/decode/sha1Decode')}}" class="btn btn-info">@lang('encode.sha1Decode')</a>
@endsection