<form enctype="multipart/form-data" method="post" action="/addpost">
    {{ csrf_field() }}
    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Name" value="{{ old('name') }}">
    </div>
    <div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
        <label for="body">Body</label>
        <textarea name="body" id="body" name="body" cols="30" rows="10">{{ old('body') }}</textarea>
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        @foreach($allCategory as $category)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="category[]"value="{{$category->id}}">
                <label class="form-check-label" for="inlineCheckbox1">{{$category->name}}</label>
            </div>
        @endforeach
    </div>
    <a href="/admin/categories">Add category</a>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>