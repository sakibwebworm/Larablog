<div class="col-md-8">
    <form enctype="multipart/form-data" method="post" action="/updatepost/{{$post->id}}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="name" placeholder="Name" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" name="body"  cols="30" rows="10">{!! $post->body !!}</textarea>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            @foreach($allCategory as $category)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="category[]"value="{{$category->id}}" @if(in_array($category->id,$post_categories)) checked @endif>
                    <label class="form-check-label" for="inlineCheckbox1">{{$category->name}}</label>
                </div>
            @endforeach
        </div>
        <a href="/categories">Add category</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

