<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dictionary\BookRepository;
use App\Repositories\Dictionary\AuthorRepository;
use App\Repositories\Dictionary\PublisherRepository;
use App\Repositories\Dictionary\CategoryRepository;
use App\Repositories\Dictionary\CommentRepository;
use App\Repositories\Dictionary\ReactionRepository;
use App\Repositories\Dictionary\RatingRepository;
use App\Http\Requests\BookFormRequest;

class BookController extends Controller
{
    //
    protected $repository;
    protected $authorRepository;
    protected $publisherRepository;
    protected $cateRepository;
    protected $commentRepository;
    protected $reactionRepository;
    protected $ratingRepository;

    public function __construct(BookRepository $repository, AuthorRepository $authorRepository, PublisherRepository $publisherRepository, CategoryRepository $cateRepository, CommentRepository $commentRepository, ReactionRepository $reactionRepository, RatingRepository $ratingRepository){
        $this->repository = $repository;
        $this->authorRepository= $authorRepository;
        $this->publisherRepository=$publisherRepository;
        $this->cateRepository=$cateRepository;
        $this->commentRepository=$commentRepository;
        $this->reactionRepository=$reactionRepository;
        $this->ratingRepository=$ratingRepository;
    }
    
    public function searchBook(Request $request){
        $books = $this->repository->searchBook($request->title, $request->author, $request->publisher);
        $authors = $this->authorRepository->all();
        $publishers = $this->publisherRepository->all();
        $categories = $this->cateRepository->all();
        return view('user/home',compact('books', 'authors', 'publishers', 'categories'));
    }

    public function detail($id){
        $book = $this->repository->show($id);
        $reaction = $this->reactionRepository->reactWithBook($id);
        $likes = $this->reactionRepository->likes($id);
        $dislikes = $this->reactionRepository->dislikes($id);
        $rating = $this->ratingRepository->ratingWithBook($id);
        $avgRating = $this->ratingRepository->getAvgRating();
        return view('user/product/detail', compact('book','reaction','likes','dislikes','rating','avgRating'));
    }

    public function comment(Request $request){
        $this->commentRepository->create($request);
        return redirect()->back()->with('status',trans('Successful'));
    }

    public function searchByCategory($name){
        $books = $this->repository->searchByCategory($name);
        $authors = $this->authorRepository->all();
        $publishers = $this->publisherRepository->all();
        $categories = $this->cateRepository->all();
        return view('user/home',compact('books', 'authors', 'publishers', 'categories'));
    }

    public function searchByAuthor($name){
        $books = $this->repository->searchByAuthor($name);
        $authors = $this->authorRepository->all();
        $publishers = $this->publisherRepository->all();
        $categories = $this->cateRepository->all();
        return view('user/home',compact('books', 'authors', 'publishers', 'categories'));
    }
}
