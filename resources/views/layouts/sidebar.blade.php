
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body text-center profile">
                    <a href="" class="edit-profile"><i class="fas fa-user-edit"></i></a>
                    <img src="{{asset($users->profile)}}" alt="" width="120" height="120">
                    <ul class="list-unstyled">
                        <li>{{$users->name}} {{$users->last_name}}</li>
                        <li>Born : {{$users->date_nais}}</li>
                        <li>Jion at : {{$users->created_at->format('d  M  Y')}}</li>
                    </ul>
                    <div class="blogs">
                        Blogs : {{$users->blog->count()}}
                        <a href="{{route('blog.create',['user'=>$users->id])}}" class="btn btn-primary">Blog + </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9">