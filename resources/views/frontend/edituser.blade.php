<form enctype="multipart/form-data" method="post" action="/updateuser/{{$user->id}}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">{{$user->name}}</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$user->name}}">
    </div>
    <div class="for-group">
        <img src="{{$user->profile->picture}}" alt="" class="img-responsive">
    </div>
    <div class="form-group">
        <label for="name">Picture</label>
        <input type="file" class="form-control" id="picture" name="picture" placeholder="picture" >
    </div>
    <div class="form-group">
        <label for="about">About</label>
        <textarea name="about" id="about" name="about" cols="30" rows="10">{{$user->profile->about}}</textarea>
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select id="role" name="role" class="form-control">
            @foreach($roles as $role)
            <option @if($role=='admin') selected value="1" @elseif($role=='editor') selected value="2" @endif>{{$role}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>