


<form action="/store" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <button type="submit">Convert</button>
</form>
