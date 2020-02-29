<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dictionary\BookRepository;
use App\Repositories\Dictionary\ReactionRepository;
use Illuminate\Support\Facades\Auth;
class ReactionController extends Controller
{
    //
    protected $repository;
    protected $bookRepository;

    public function __construct(ReactionRepository $repository, BookRepository $bookRepository){
        $this->repository = $repository;
        $this->bookRepository= $bookRepository;
    }
    
    public function create(Request $request){
        if(Auth::user()){
            $reaction = $this->repository->create($request);
            if($reaction == 1){
                return response()->json([
                    'code'=>0,
                    'message'=>'Thành công',
                    'data'=> $request->emotion
                ],200); 
            }
            return response()->json([
                'code'=>1,
                'message'=>'Thất bại',
                'data'=> $request->emotion
            ],404); 
        }
        return redirect('/login');
    }

    public function remove(Request $request){
        $check = $this->repository->remove($request->book_id);
        if($check==0){
            return response()->json([
                'code'=>0,
                'message'=>'Thành công',
                'data'=> $request->emotion
            ],200); 
        }
        return response()->json([
            'code'=>1,
            'message'=>'Thất bại',
            'data'=> $request->emotion
        ],404); 
    }
}
