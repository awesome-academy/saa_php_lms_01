<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dictionary\BookRepository;
use App\Repositories\Dictionary\AuthorRepository;
use App\Repositories\Dictionary\PublisherRepository;
use App\Repositories\Dictionary\CategoryRepository;
use App\Repositories\Dictionary\CommentRepository;
use App\Http\Requests\BookFormRequest;

class BookController extends Controller
{
    //
    protected $repository;
    protected $authorRepository;
    protected $publisherRepository;
    protected $cateRepository;
    protected $commentRepository;

    public function __construct(BookRepository $repository, AuthorRepository $authorRepository, PublisherRepository $publisherRepository, CategoryRepository $cateRepository, CommentRepository $commentRepository ){
        $this->repository = $repository;
        $this->authorRepository= $authorRepository;
        $this->publisherRepository=$publisherRepository;
        $this->cateRepository=$cateRepository;
        $this->commentRepository=$commentRepository;
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
        return view('user/product/detail', compact('book'));
    }

    public function comment(Request $request){
        $this->commentRepository->create($request);
        return redirect()->back()->with('status',trans('Successful'));
    }
}
