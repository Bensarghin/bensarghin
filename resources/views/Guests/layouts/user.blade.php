    <div class="row">
        <div class="col-md-3 sticky-top">
            <div class="card">
                <div class="card-body text-center profile">
                    <a href="" class="edit-profile"><i class="fas fa-user-edit"></i></a>
                    @if(Auth::user()->profile)
                    <img src="{{asset(Auth::user()->profile)}}" alt="" width="120" height="120">
                    @else
                    <img src="{{asset('uploads/default.jpg')}}" alt="" width="120" height="120">
                    @endif
                    <ul class="list-unstyled">
                        <li>{{Auth::user()->name}} {{Auth::user()->last_name}}</li>
                        <li>Born : {{Auth::user()->date_nais}}</li>
                        <li>Jion at : {{Auth::user()->created_at->format('d  M  Y')}}</li>
                    </ul>
                    <div class="blogs">
                        Blogs : {{Auth::user()->blog->count()}}
                        <a href="{{route('create.blog')}}" class="btn btn-primary">Blog + </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">