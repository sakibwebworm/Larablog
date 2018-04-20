<form method="post" action="/updatecategory/{{$category->id}}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Category</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$category->name}}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>