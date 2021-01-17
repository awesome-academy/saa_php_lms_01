<?php // gkc_hash_code : 01DPWANC6E80S4P925SVA9ACPW ?>
<?php

namespace App\Repositories\Dictionary;
use Illuminate\Support\Facades\DB;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;
class ReactionRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Reaction();
    }
 
    public function create($data){
        $user = Auth::user();
        if($user){
            DB::transaction(function () use($data,$user) {
                $result = $this->model->where([['book_id','=', $data->book_id], ['user_id', '=', $user->id]])->get();

                if ($result) {
                    foreach ($result as $react) {
                        $react->delete();
                    }
                }

                $reaction = new Reaction(array(
                    'emotion'=>$data->emotion,
                    'user_id'=> $user?$user->id:null,
                    'book_id'=>$data->book_id
                ));
                $reaction->save();
            });
      
           
            return 1;
        }
        return 0;
    }

    public function remove($id){
        $user = Auth::user();
        if($user){
            $result = $this->model->where([['book_id','=', $id], ['user_id', '=', $user->id]])->get();
            if ($result) {
                foreach($result as $react){
                    $react->delete();
                }
                
                return 0;
            }
        }
        return 1;
    }

    /**
     * find reaction of current user with one book
     */
    public function reactWithBook($id){
        $user = Auth::user();
        if($user){
            $like = $this->model->where([['book_id','=', $id], ['user_id', '=', $user->id], ['emotion','=','LIKE']])->get();
            if(count($like)>0){
                return 0;
            }
            $dislike = $this->model->where([['book_id','=', $id], ['user_id', '=', $user->id], ['emotion','=','DISLIKE']])->get();
            if(count($dislike)>0){
                return 1;
            }
            return 2;
        }
        return 3;
    }

    /**
     * return likes of curent book
     */
    public function likes($id){
        // $likes = $this->model->where([['book_id', '=', $id],['emotion','=','LIKE']]);
        $reactions = DB::table('reactions')
        ->select(DB::raw('count(*) as total'))
        ->where([['book_id','=', $id],['emotion','=','LIKE']])
        ->get();
        return $reactions;
    }

    /**
     * return dislikes of curent book
     */
    public function dislikes($id){
        $reactions = DB::table('reactions')
        ->select(DB::raw('count(*) as total'))
        ->where([['book_id','=', $id],['emotion','=','DISLIKE']])
        ->get();
 
        return $reactions;
    }
}
