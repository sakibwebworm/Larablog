<form enctype="multipart/form-data" method="post" action="/addcategory">
    {{ csrf_field() }}
    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>