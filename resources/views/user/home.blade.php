@extends('user.layout.user')
@section('title', 'Home')

@section('content')
<div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="books-media-gird">
                        <div class="container">
                            <div class="row">
                                <!-- Start: Search Section -->
                                <section class="search-filters">
                                    <div class="container">
                                        <div class="filter-box">
                                            <h3>{{ __('Welcome') }}</h3>
                                            <form method="GET" action="{{ route('user\book\search') }}">
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="title">{{ __('Search by Keyword') }}</label>
                                                        <input class="form-control" placeholder="{{ __('Search by Keyword') }}" id="title" name="title" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" name="author" class="form-control" placeholder="{{ __('Author') }}"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-6">
                                                    <div class="form-group">
                                                        <select name="publisher" id="publisher" class="form-control">
                                                            <option value="">{{ __('Publisher') }}</option>
                                                            @foreach($publishers as $publisher)
                                                                <option value={{$publisher->id}}>{{$publisher->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="submit" value="Search">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </section>
                                <!-- End: Search Section -->
                            </div>
                            <div class="row">
                                <div class="col-md-9 col-md-push-3">
                                    <div class="books-gird">
                                        <ul class ="row">
                                        @foreach($books as $book)
                                        <li class="col-md-4 col-sm-12">
                                                <figure>
                                                    <img  src="{{ asset('storage/uploads/'.$book->thumbnail) }}" alt="{{$book->title}}">
                                                    <figcaption>
                                                        <p><strong>{{$book->title}}</strong></p>
                                                        <p><strong>{{ __('Author') }}:</strong>
                                                        @foreach ($book->bookAuthor as $bookAu)
                                                            {{$bookAu->author->name}}
                                                        @endforeach 
                                                        </p>
                                                    </figcaption>
                                                </figure> 
                                                <div class="book-list-icon blue-icon"></div>
                                                <div class="single-book-box">
                                                    <div class="post-detail">
                                                        <div class="optional-links">
                                                            <ul>
                                                                <li>
                                                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Add TO CART">
                                                                        <i class="fa fa-shopping-cart"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Like">
                                                                        <i class="fa fa-heart"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Mail"><i class="fa fa-envelope"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Search">
                                                                        <i class="fa fa-search"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" target="_blank" data-toggle="blog-tags" data-placement="top" title="Print">
                                                                        <i class="fa fa-print"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <header class="entry-header">
                                                            <h3 class="entry-title"><a href="books-media-detail-v1.html">{{$book->title}}</a></h3>
                                                            <ul>
                                                                <li><strong>{{ __('Author') }}:</strong>
                                                                    @foreach ($book->bookAuthor as $bookAu)
                                                                        {{ $bookAu->author->name }} 
                                                                    @endforeach 
                                                                </li>
                                                                <li><strong>{{__('Publisher')}}:</strong> {{$book->publisher->name}}</li>
                                                            </ul>
                                                        </header>
                                                        <div class="entry-content">
                                                            <p>{{$book->description}}</p>
                                                        </div>
                                                        <footer class="entry-footer">
                                                            <a class="btn btn-primary" href="books-media-detail-v1.html">Read More</a>
                                                        </footer>
                                                    </div>
                                                </div>                                       
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                    <nav class="navigation pagination text-center">
                                        <h2 class="screen-reader-text">Posts navigation</h2>
                                        <div class="nav-links">
                                            <a class="prev page-numbers" href="#."><i class="fa fa-long-arrow-left"></i> {{ __('Previous') }}</a>
                                            <a class="page-numbers" href="#.">1</a>
                                            <span class="page-numbers current">2</span>
                                            <a class="page-numbers" href="#.">3</a>
                                            <a class="page-numbers" href="#.">4</a>
                                            <a class="next page-numbers" href="#.">{{ __('Next') }} <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </nav>
                                </div>
                                <div class="col-md-3 col-md-pull-9">
                                    <aside id="secondary" class="sidebar widget-area" data-accordion-group>
                                        <div class="widget widget_related_search open" data-accordion>
                                            <h4 class="widget-title" data-control>{{ __('RelatedSearch') }}</h4>
                                            <div data-content>
                                                <div data-accordion>
                                                    <h5 class="widget-sub-title" data-control>{{ __('Subject') }}</h5>
                                                    <div class="widget_categories" data-content>
                                                        <ul>
                                                            @foreach($categories as $category)
                                                                <li><a style="cursor:pointer">{{$category->name}}</a></li>
                                                            @endforeach
                                                            <!-- <li><a href="#">Love stories <span>(18)</span></a></li>
                                                            <li><a href="#">Texas <span>(04)</span></a></li>
                                                            <li><a href="#">Rich people <span>(03)</span></a></li>
                                                            <li><a href="#">Humorous stories <span>(02)</span></a></li>
                                                            <li><a href="#">Widows <span>(02)</span></a></li>
                                                            <li><a href="#">Women <span>(11)</span></a></li>
                                                            <li><a href="#">Babysitters <span>(25)</span></a></li>
                                                            <li><a href="#">Law firms <span>(09)</span></a></li> -->
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 32px;" data-accordion>
                                                    <h5 class="widget-sub-title" data-control>{{ __('Author') }}</h5>
                                                    <div class="widget_categories" data-content>
                                                        <ul>
                                                            @foreach($authors as $author)
                                                                <li value={{$author->id}}><a style="cursor:pointer">{{$author->name}}</a></li>
                                                            @endforeach
                                                            <!-- <li><a href="#">Love stories <span>(18)</span></a></li>
                                                            <li><a href="#">Texas <span>(04)</span></a></li>
                                                            <li><a href="#">Rich people <span>(03)</span></a></li>
                                                            <li><a href="#">Humorous stories <span>(02)</span></a></li>
                                                            <li><a href="#">Widows <span>(02)</span></a></li>
                                                            <li><a href="#">Women <span>(11)</span></a></li>
                                                            <li><a href="#">Babysitters <span>(25)</span></a></li>
                                                            <li><a href="#">Law firms <span>(09)</span></a></li> -->
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                               
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
@endsection