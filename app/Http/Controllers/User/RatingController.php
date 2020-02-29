<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dictionary\BookRepository;
use App\Repositories\Dictionary\RatingRepository;
use Illuminate\Support\Facades\Auth;
class RatingController extends Controller
{
    //
    protected $repository;
    protected $bookRepository;

    public function __construct(RatingRepository $repository, BookRepository $bookRepository){
        $this->repository = $repository;
        $this->bookRepository= $bookRepository;
    }
    
    public function rate(Request $request){
        if(Auth::user()){
            $rate = $this->repository->create($request);
            if($rate == 0){
                return response()->json([
                    'code'=>0,
                    'message'=>'Thành công',
                    'data'=> $rate->rating
                ],200); 
            }

            return response()->json([
                'code'=>1,
                'message'=>'Thất bại',
                'data'=> null
            ],404); 
        }
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
