@extends('user.layout.user')
@section('title', 'Home')

@section('content')
<div class="blog-detail-main">
        <div class="container">
            <div class="row">
                <div class="blog-page" style="width:100%">
                    <div class="row header-book">
                        
                        <div class="col-sm-12 col-md-4">
                            <img class="book-thumbnail" src="{{ asset('storage/uploads/'.$book->thumbnail) }}" >
                        </div>
                        
                        <div class="col-sm-12 col-md-4">
                            <h4>{{ $book->title }}</h4>
                            <div class="avg-rating">
                                @foreach($avgRating as $rate)
                                    @if($rate->book_id == $book->id)
                                        {{number_format($rate->rate, 1, '.', '')}}
                                    @endif
                                @endforeach
                                <i class='fa fa-star fa-fw'></i>
                            </div>   
                            <div style="margin-top:40px" class="form-group">
                            <!-- <form> -->
                                <input type="hidden" name="_token" id="ip_token" value="{{ csrf_token() }}">
                                @if($reaction == 0)
                                    <button style="background: #456ead;" class="like-button liked"  data-key="{{$book->id}}">
                                        <i class="far fa-thumbs-up"></i>
                                        <span id="total-like">    
                                            {{$likes[0]->total}}
                                        </span>
                                    </button>
                                    <!-- <span>({{$likes[0]->total}} lượt thích)</span> -->
                                    <button style="background: #456ead;"  class="unlike-button"  data-key="{{$book->id}}">
                                        <i class="far fa-thumbs-down"></i>
                                        <span id="total-dislike">
                                            {{$dislikes[0]->total}}
                                        </span>
                                    </button>
                                @elseif($reaction == 1)
                                        <button style="background: #456ead;" class="like-button"  data-key="{{$book->id}}">
                                            <i class="far fa-thumbs-up"></i>
                                            <span id="total-like">
                                                {{$likes[0]->total}}
                                            </span>
                                        </button>
                                        <!-- <span>({{$likes[0]->total}} lượt thích)</span> -->
                                        <button style="background: #456ead;"  class="unlike-button liked"  data-key="{{$book->id}}">
                                            <i class="far fa-thumbs-down"></i>
                                            <span id="total-dislike">
                                                {{$dislikes[0]->total}}
                                            </span>
                                        </button>
                            
                                @elseif($reaction == 2||$reaction==3)
                                    <button style="background: #456ead;" class="like-button"  data-key="{{$book->id}}">
                                            <i class="far fa-thumbs-up"></i>
                                            <span id="total-like">
                                                {{$likes[0]->total}}
                                            </span>
                                    </button>
                                    <!-- <span>({{$likes[0]->total}} lượt thích)</span> -->
                                    <button style="background: #456ead;"  class="unlike-button"  data-key="{{$book->id}}">
                                            <i class="far fa-thumbs-down"></i>
                                            <span id="total-dislike">
                                                {{$dislikes[0]->total}}
                                            </span>
                                    </button>
                                @endif
                            <!-- <form> -->
                            </div>
                            <div class="about-book-information">
                                <p>{{ __('Author') }}: 
                                    @foreach($book->authors as $author)
                                        <a href="{{route('user\book\search\author',$author->name)}}" class="category-title">
                                            {{$author->name}}
                                        </a>
                                    @endforeach
                                </p>
                                <p>{{__('Category')}}:
                                    @foreach($book->categories as $category)
                                        <a href="{{route('user\book\search\category',$category->name)}}" class="category-title">
                                            {{$category->name}}
                                        </a>
                                    @endforeach
                                </p>
                            </div>
                            <input type="hidden" name="book_id" id="book_id_ip" value="{{$book->id}}">
                            <?php 
                                $rating = isset($rating[0]->rating) ? $rating[0]->rating : 0;
                               
                            ?>
                            <div class='rating-stars'>
                                <ul id='stars'>
                                    <li class="@if($rating >= 1) selected @endif star" title='Poor' data-value='1'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class="@if($rating >= 2) selected @endif star" title='Fair' data-value='2'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='@if($rating >= 3) selected @endif star' title='Good' data-value='3' >
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='@if($rating >= 4) selected @endif star' title='Excellent' data-value='4'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='@if($rating == 5) selected @endif star' title='WOW!!!' data-value='5'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="blog-section">
                        <article>
                            <div class="blog-detail">
                                <div class="post-thumbnail">
                                    <div class="post-date-box">
                                        <div class="post-date">
                                            <a class="date" href="#.">07</a>
                                        </div>
                                        <div class="post-date-month">
                                            <a class="month" href="#.">Mar</a>
                                        </div>
                                    </div>
                                    <figure>
                                        <img alt="blog" src="images/blog/post-detail-img.jpg">
                                    </figure>
                                </div>
                                <div class="post-detail">
                                    <div class="entry-content">
                                        <p>{{$book->content}}</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <div class="comments-area" id="comments">
                            <div class="comment-bg">
                                <h4 class="comments-title">{{ __('Comments') }}</h4>
                                <span class="underline left"></span>
                                <ol class="comment-list">
                                    <li class="comment even thread-even depth-1 parent">
                                        @foreach($book->comments as $comment)
                                        <div class="comment-body">
                                            <div class="comment-author vcard">
                                                <img class="avatar avatar-32 photo avatar-default" src="" alt="Comment Author">
                                                <b class="fn">
                                                    <a href="{{route('user\profile',$comment->user_id)}}"  class="url" rel="external nofollow" >{{$comment->user_id?$comment->user()->first()->name:'Anonymous'}}</a>
                                                </b>					
                                            </div>
                                            <footer class="comment-meta">
                                                <div class="left-arrow"></div>
                                                <div class="comment-metadata">
                                                    <a href="#">
                                                        <time datetime="2016-01-17">
                                                            <b>{{$comment->create_at}}</b>
                                                        </time>
                                                    </a>
                                                </div>
                                                <div class="comment-content">
                                                    <p>
                                                        {{$comment->content}}
                                                    </p>
                                                </div>
                                            </footer>
                                        </div>
                                        @endforeach
                                    </li>
                                </ol>
                            </div>
                            <div class="comment-respond" id="respond">
                                <h4 class="comment-reply-title" id="reply-title">{{ __('Write your comment') }}</h4>
                                <span class="underline left"></span>
                                <form class="comment-form" id="commentform" method="post" action="{{ route('user\book\comment') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                                    <div class="row">
                                        <p style="width:100%" class="comment-form-comment">
                                            <textarea name="comment" id="comment" placeholder="{{ __('Write your comment') }}"></textarea>
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                    <p class="form-submit">
                                        <input value="Submit" class="submit" id="submit" name="submit" type="submit"> 
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function(){
           

            
        })
    </script>
@endsection