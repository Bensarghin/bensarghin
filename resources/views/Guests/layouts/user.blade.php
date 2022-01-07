    <div class="row">
        <div class="col-md-3">
            <div class="card" id="img">
                <div class="card-body text-center profile">
                    @if(Auth::user()->profile)
                    <img src="{{asset('users/'.Auth::user()->profile)}}" alt="" id="output" width="120" height="120">
                    @else
                    <img src="{{asset('uploads/default.jpg')}}" id="output" alt="" width="120" height="120">
                    @endif
                    <ul class="list-unstyled">
                        <li>{{Auth::user()->name}} {{Auth::user()->last_name}}</li>
                        <li>Born : {{Auth::user()->date_nais}}</li>
                        <li>Jion at : {{Auth::user()->created_at->format('d  M  Y')}}</li>
                    </ul>
                    <div class="blogs">
                        Blogs : {{Auth::user()->blog->count()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
