@extends('user.layout.user')
@section('title', 'Home')

@section('content')
<div class="blog-detail-main">
        <div class="container">
            <div class="row">
                <div class="blog-page">
                    <div class="row header-book">
                        
                        <div class="col-sm-12 col-md-4">
                            <img class="book-thumbnail" src="{{ asset('storage/uploads/'.$book->thumbnail) }}" >
                        </div>
                        
                        <div class="col-sm-12 col-md-4">
                            <h4>{{ $book->title }}</h4>
                            <div style="margin-top:40px" class="form-group">
                                <button class="like-button">
                                    <i class="far fa-thumbs-up"></i>
                                    <span>40</span>
                                </button>
                                <button class="unlike-button">
                                    <i class="far fa-thumbs-down"></i>
                                    <span>140</span>
                                </button>
                            </div>
                            <div class="about-book-information">
                                <p>{{ __('Author') }}: 
                                    @foreach($book->authors as $author)
                                        {{$author->name}}
                                    @endforeach
                                </p>
                                <p>{{__('Category')}}:
                                    @foreach($book->categories as $category)
                                    <a class="category-title">
                                        {{$category->name}}
                                    </a>
                                    @endforeach
                                </p>
                            </div>
                            
                            <div class='rating-stars'>
                                <ul id='stars'>
                                    <li class='star' title='Poor' data-value='1'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Fair' data-value='2'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Good' data-value='3'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Excellent' data-value='4'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='WOW!!!' data-value='5'>
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
                                                    <a class="url" rel="external nofollow" href="#">{{$comment->user_id?$comment->user()->first()->name:'Anonymous'}}</a>
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

