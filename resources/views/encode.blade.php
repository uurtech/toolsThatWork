@extends("app")

@section("page")
<a href="{{ url('/tool/encode/md5Encode')}}" class="btn btn-info">@lang('encode.md5Encode')</a>
<a href="{{url('/tool/encode/base64Encode')}}" class="btn btn-info">@lang('encode.base64Encode')</a>
<a href="{{url('/tool/encode/urlEncode')}}" class="btn btn-info">@lang("encode.urlEncode")</a>
<a href="{{url('/tool/encode/sha256Encode')}}" class="btn btn-info">@lang("encode.sha256Encode")</a>
<a href="{{url('/tool/encode/sha1Encode')}}" class="btn btn-info">@lang('encode.sha1Encode')</a>
@endsection