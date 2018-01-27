@extends("app")
@section("page")


<form method="post">
    {{ csrf_field() }}
    <div>@lang("home.winnerCount")</div>
    <input type="text" name="winner" class="form-control" placeholder="Only Numbers"/>
  
    <div>@lang("home.data")</div>
    <textarea name="data" class="form-control" placeholder="Datas line by line"></textarea>
    <br />
    <input type="submit" class="btn btn-success form-control">
</form>

@if(isset($datas))
    @foreach($datas as $data)
        {{ $data }} <br />
    @endforeach
@endif

@endsection