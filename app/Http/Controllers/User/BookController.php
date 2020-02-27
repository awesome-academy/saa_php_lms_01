<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dictionary\BookRepository;
use App\Repositories\Dictionary\AuthorRepository;
use App\Repositories\Dictionary\PublisherRepository;
use App\Repositories\Dictionary\CategoryRepository;
use App\Http\Requests\BookFormRequest;

class BookController extends Controller
{
    //
    protected $repository;
    protected $authorRepository;
    protected $publisherRepository;
    protected $cateRepository;

    public function __construct(BookRepository $repository, AuthorRepository $authorRepository, PublisherRepository $publisherRepository, CategoryRepository $cateRepository ){
        $this->repository = $repository;
        $this->authorRepository= $authorRepository;
        $this->publisherRepository=$publisherRepository;
        $this->cateRepository=$cateRepository;
    }
    
    public function searchBook(Request $request){
        $books = $this->repository->searchBook($request->title, $request->author, $request->publisher);
        $authors = $this->authorRepository->all();
        $publishers = $this->publisherRepository->all();
        $categories = $this->cateRepository->all();
        return view('user/home',compact('books', 'authors', 'publishers', 'categories'));
    }
}
