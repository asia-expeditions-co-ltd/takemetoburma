<div class="bg-white" id="relate-post">
    <div class="dateTime">
        <i class="fa fa-calendar"></i> <span>Relates Post</span>
    </div>
    @foreach(\App\ourNew::orderBy('id', 'DESC')->take(2)->get() as $new)
    <div class="img">
        <div class="card" >
            <a href="{{route('singleActivity', ['slug' => $new->slug])}}"><img src="/photos/share/{{$new->picture}}" class="img-responsive"></a>
            <div class="col-md-12">
                <a href="{{route('singleActivity', ['slug' => $new->slug])}}"><h4 class="card-title">{{$new->tittle}}</h4></a>
                <p class="card-text">{!! str_limit(strip_tags($new->description,90))!!}</p>
                <div class="cleafix"></div>
            </div>                            
        </div>
    </div>
    @endforeach          
    <div class="clearfix"></div>
</div>