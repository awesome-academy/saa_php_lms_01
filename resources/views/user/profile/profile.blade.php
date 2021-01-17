@extends('user.layout.user')
@section('title', 'Home')

@section('content')
    <div class="profile">
        <div class="container">
        <div class="row header-profile">
            <div class="col-sm-12 col-md-3 user-avatar">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQL_FKKfbaiL4gH6LwGlJRxwG4IBRkYjtqmj6UvlHZqEKDK4ooa"/>
                <p style="margin-top: 20px;font-size: 13px;">{{$profile->description}} </p>
            </div>
            
            <div class="col-sm-12 col-md-9 info-user">
            <input type="hidden" name="following_id" id="input-us-id" value="{{$profile->id}}">
            <input type="hidden" name="_token" id="ip_token" value="{{ csrf_token() }}">
                <div class="user-info">
                    <h2>{{$profile->name}}</h2>
                    @if($profile->id==Auth::id())
                        <span>
                           
                        </span>
                        @else
                        <button class="button-follow">{{ __('Follow') }}
                            @if($check==0)
                                <span class="appear icon-checked "><i class="fas fa-check"></i></span> 
                            @else
                                <span class="icon-checked "></span> 
                            @endif
                           
                                <!-- @foreach($followers as $follower)
                                    @if($follower->follower_id==Auth::id())
                                        <span class="icon-checked appear"><i class="fas fa-check"></i></span> 
                                    @else
                                    @endif
                                @endforeach -->
                                
                        </button>    
                    @endif
                </div>
                <p class="address"><i class="fas fa-map-marker-alt"></i> {{$profile->address}}</p>
                <div class="user-diary">
                    <ul>
                        <li>
                            <a class="followers-tab"><strong>{{count($followers)}}</strong> {{ __('followes') }} </a>
                        </li>
                        <li>
                            <a class="followings-tab"><strong>{{count($followings)}}</strong> {{ __('followings') }}</a>
                        </li>
                        
                        <li>
                            <a class="likes-tab active"><strong>{{count($likes)}}</strong> {{ __('likes') }}</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="row row-bottom">
            <div class="list-liked-book">
                @foreach($likes as $r)
                    <div class="col-sm-12 col-md-4 one-book" style="position:relative;">
                        <a href="{{route('user\book\detail',$r->book->id)}}"  class="background-book">
                 
                            <div class="emotion-of-book">
                                <span>
                                    4 <i class="far fa-thumbs-up"></i>
                                </span>
                                <span>
                                    4 <i class="far fa-thumbs-down"></i>
                                </span>
                            </div>
                        </a>
                        <img style="max-height:293px; height:293px; width:100%; object-fit:contain" src="{{ asset('storage/uploads/'.$r->book->thumbnail) }}"/>
                    </div>
                @endforeach
                
            </div>
            <div class="list-followers disappear" style="width:100%">
            @if(count($followers)>0)
                @foreach($followers as $follower)
                    <div class="col-sm-12 col-md-6 one-followers">
                        <div class="row followers-info">
                            <div class="col-md-3" style="line-height:7">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQL_FKKfbaiL4gH6LwGlJRxwG4IBRkYjtqmj6UvlHZqEKDK4ooa"/>
                            </div>
                            <div class="col-md-9">
                                <p class="user-name"><a href="{{route('user\profile',$follower->follower->id)}}">{{$follower->follower->name}}</a></p>
                                <p class="description-cap"><a>Where are you come from</a></p>
                                <p class="address"><i class="fas fa-map-marker-alt"></i> Hà Nội, Việt Nam</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                <div>
                    {{ __('User has none followers') }}
                </div>
            @endif
            </div>
            <div class="list-following disappear" style="width:100%">
            @if(count($followings)>0)
                @foreach($followings as $following)
                    <div class="col-sm-12 col-md-6 one-followers">
                        <div class="row followers-info">
                            <div class="col-md-3" style="line-height:7">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQL_FKKfbaiL4gH6LwGlJRxwG4IBRkYjtqmj6UvlHZqEKDK4ooa"/>
                            </div>
                            <div class="col-md-9">
                                <p class="user-name"><a href="{{route('user\profile',$following->following->id)}}">{{$following->following->name}}</a></p>
                                <p class="description-cap"><a>{{$following->following->description}}</a></p>
                                <p class="address"><i class="fas fa-map-marker-alt"></i> {{$following->following->address}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                <div>
                    {{ __('User has not followed anyone') }}
                </div>
            @endif
            </div>
        </div>
    </div>
    </div>
    @endsection
