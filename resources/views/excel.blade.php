<form action="excel" method="post">

    {{ csrf_field() }}
    <input type="file" name="file" />
    <input type="submit">
</form>