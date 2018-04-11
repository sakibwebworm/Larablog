<div class="col-md-4 content-right">
    <div class="recent">
        <h3>RECENT POSTS</h3>
        <ul>
            @foreach($recentpost as $postTitle)
                <li><a href="/post/{{$postTitle->id}}">{{$postTitle->title}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="comments">
        <h3>RECENT COMMENTS</h3>
        <ul>
            @foreach($recentComments as $comments)
                <li><a href="#">{{$comments->name}} </a> on <a href="/post/{{$comments->id}}">{{$comments->title}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="clearfix"></div>
    <div class="archives">
        <h3>ARCHIVES</h3>
        <ul>
            @foreach($archieve as $month)
                <li><a href="#">{{$month->month}} ({{$month->count}})</a></a></li>
            @endforeach
        </ul>
    </div>
    <div class="categories">
        <h3>CATEGORIES</h3>
        <ul>
            @foreach($topCategories as $category)
                <li><a href="/category/{{$category}}">{{$category}}</a></li>
                @endforeach
        </ul>
    </div>
    <div class="clearfix"></div>
</div>