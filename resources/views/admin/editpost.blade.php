<form enctype="multipart/form-data" method="post" action="/updatepost/{{$postWithcategory->id}}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">{{$postWithcategory->title}}</label>
        <input type="text" class="form-control" id="title" name="name" placeholder="Name" value="{{$postWithcategory->title}}">
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea name="body" id="body" name="body" cols="30" rows="10">{!! $postWithcategory->body !!}</textarea>
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        @foreach($allCategory as $category)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$category->name}}">
            <label class="form-check-label" for="inlineCheckbox1">1</label>
        </div>
        @endforeach
     {{--   <select id="category" name="category" class="form-control">
            @foreach($allCategory as $category)
                <option @if($role=='admin') selected value="1" @elseif($role=='editor') selected value="2" @endif>{{$role}}</option>

        </select>--}}
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>