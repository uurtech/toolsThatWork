@extends("app")

@section("page")

<p>
    @lang("request.message")
</p>

<form method="post">
<div>Your E-mail</div>
<input type="email" name="email" class="form-control" placeholder="email"/>
<div>Your Idea/Request</div>
<textarea class="form-control" name="request"></textarea>
<br />
<input type="submit" class="btn btn-success"/>
</form>

@endsection