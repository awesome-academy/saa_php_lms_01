<?php // gkc_hash_code : 01DPWANC6E80S4P925SVA9ACPW ?>
<?php

namespace App\Repositories\Dictionary;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;
class UserRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function all(){
        return $this->model::with('role')->paginate(5);
    }

    public function show($id){
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id){
        $result = $this->model->find($id);
        if ($result) {
            $result->update($data);
            return $result;
        }

        return false;
    }

    public function delete($id){
        $result = $this->model->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
    
    public function profile($id){
        // $user = $this->model->with('followers','followings','reactions','reactions.book','reactions.book.reactions')
        //     ->where('id','=',$id)
        //     ->whereHas('reactions', function($query) use ($id){
        //         $query->where('emotion', '=', 'LIKE');
        //     })
        //     ->get();
        $user = $this->model->find($id);
        // $likes = $this->model->with('reactions')->where([['user_id','=',$id]])
        return $user;
    }

    public function getFollowers($id){
        $user = User::find($id);

        $followers = $user->followers()->get();
        return $followers;
    }

    public function getFollowings($id){
        $user = User::find($id);

        $followings = $user->followings()->get();
        return $followings;
    }

    public function getLikedBooks($id){
        $user = User::find($id);

        $likedBooks = $user->reactions()->where('reactions.emotion','=','LIKE')->get();
        return $likedBooks;
    }

    public function follow($data){
        $user = Auth::user();
        if($user){
            DB::transaction(function () use($data,$user) {
                // $result = Follow::where([['follower_id','=', $user->id], ['following_id', '=', $data->following_id]])->get();
          
                // if ($result) {
                //     foreach ($result as $follow) {
                //         $follow->delete();
                //     }
                // }

                $follows = new Follow(array(
                    'follower_id'=> $user->id,
                    'following_id'=>$data->following_id
                ));
                $follows->save();
            });
      
           
            return 1;
        }
        return 0;
    }

    public function unfollow($data){
        $user = Auth::user();
        if($user){
            $result = Follow::where([['following_id','=', $data->following_id], ['follower_id', '=', $user->id]])->get();
            if ($result) {
                foreach($result as $react){
                    $react->delete();
                }
                
                return 0;
            }
        }
        return 1;
    }

    public function checkFollow($id){
        $user = Auth::user();
        if($user){
            $result = Follow::where([['following_id','=', $id], ['follower_id', '=', $user->id]])->get();
            if ($result&& count($result)>0) {
                return 0;
            }
        }
        return 1;
    }
}
