@extends("app")

@section("page")

<form method="post">
    {{ csrf_field() }}
   <div>@lang("password.passwordLength")</div>
    <select name="passwordLength" class="form-control" required>
        @for($i = 8;$i<100; $i++){
            <option value="{{$i}}">{{$i}}</option>
        }
        @endfor
    </select>
    <div>@lang("password.symbols")</div>
    <label><input type="checkbox" name="includeSymbols" class="form-control"/> e.g. '^+%&/(/&%'</label>

    <div>@lang("password.numbers")</div>
    <label><input type="checkbox" name="includeNumbers" class="form-control"/>e.g. 123456</Label>

    <div>@lang("password.lowercase")</div>
    <label><input type="checkbox" name="includeLowerCase" class="form-control" checked/>e.g. qwerty</label>

    <div>@lang("password.uppercase")</div>
    <label><input type="checkbox" name="includeUpperCase" class="form-control" checked/>e.g. QWASD</label>
    <br/>
    @if(isset($generatedPassword))
        @if($generatedPassword == "")
            <div style="font-size:10px;color:red">@lang("password.error")</div>
        @else
        <input type="text" value="{{$generatedPassword}}" style="color:green"/>
        @endif
    @endif
    
    <input type="submit" class="btn btn-success" style="float:left">

</form>

@endsection