<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Dictionary\BookRepository;
use App\Repositories\Dictionary\AuthorRepository;
use App\Repositories\Dictionary\PublisherRepository;
use App\Repositories\Dictionary\CategoryRepository;

class HomeController extends Controller
{
    //
    protected $bookRepository;
    protected $authorRepository;
    protected $publisherRepository;
    protected $cateRepository;

    public function __construct(BookRepository $bookRepository, AuthorRepository $authorRepository, PublisherRepository $publisherRepository, CategoryRepository $cateRepository ){
        $this->bookRepository = $bookRepository;
        $this->authorRepository= $authorRepository;
        $this->publisherRepository=$publisherRepository;
        $this->cateRepository=$cateRepository;
    }

    public function index(){
        $books = $this->bookRepository->getAllWithInfo();
        $authors = $this->authorRepository->all();
        $publishers = $this->publisherRepository->all();
        $categories = $this->cateRepository->all();
        return view('user/home',compact('books', 'authors', 'publishers', 'categories'));
    }
    
    public function show(){
        return view('user/product/detail');
    }

    public function profile(){
        return view('user/profile/profile');
    }
}
