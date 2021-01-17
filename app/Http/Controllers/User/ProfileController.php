<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Dictionary\UserRepository;
use App\Models\User;

class ProfileController extends Controller
{
    //
    protected $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function index($id){
        $profile = $this->userRepository->profile($id);
        $followers = $this->userRepository->getFollowers($id);
        $followings= $this->userRepository->getFollowings($id);
        $likes = $this->userRepository->getLikedBooks($id);
        $check = $this->userRepository->checkFollow($id);
        return view('user/profile/profile' , compact('profile', 'followers','followings','likes','check'));
    }

    
    public function follow(Request $request){
        if(Auth::user()){
            $follow = $this->userRepository->follow($request);
            if($follow == 1){
                return response()->json([
                    'code'=>0,
                    'message'=>'Thành công',
                    'data'=> 0
                ],200); 
            }
            return response()->json([
                'code'=>1,
                'message'=>'Thất bại',
                'data'=> null
            ],404); 
        }
        return redirect('/login');
    }

    public function unfollow(Request $request){
        $check = $this->userRepository->unfollow($request);
        if($check==0){
            return response()->json([
                'code'=>0,
                'message'=>'Thành công',
                'data'=> 1
            ],200); 
        }
        return response()->json([
            'code'=>1,
            'message'=>'Thất bại',
            'data'=> null
        ],404); 
    }
    
}
