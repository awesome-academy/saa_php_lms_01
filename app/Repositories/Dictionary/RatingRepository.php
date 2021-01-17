<?php // gkc_hash_code : 01DPWANC6E80S4P925SVA9ACPW ?>
<?php

namespace App\Repositories\Dictionary;
use Illuminate\Support\Facades\DB;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
class RatingRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Rating();
    }
 
    public function create($data){
        $user = Auth::user();
        if($user){

            DB::transaction(function () use($data,$user) {

                $result = $this->model->where([['book_id','=', $data->book_id], ['user_id', '=', $user->id]])->get();
                if ($result) {
                    foreach ($result as $rate) {
                        $rate->delete();
                    }
                }

                $rate = new Rating(array(
                    'rating'=>$data->rating,
                    'user_id'=> $user?$user->id:null,
                    'book_id'=>$data->book_id
                ));
                $rate->save();

                
            });
            return 0;
        }
        return 1;
    }

    public function ratingWithBook($id){
        $user = Auth::user();
        if($user){
            $rating = $this->model->where([['book_id','=',$id], ['user_id','=',$user->id]])->orderBy('created_at', 'desc')->get();
            return $rating;
        }
        return 0;
    }
    
    public function getAvgRating(){
        $book_rate = DB::table('ratings')
                 ->select('book_id', DB::raw('AVG(rating) as rate'))
                 ->groupBy('book_id')
                 ->get();
        return $book_rate;
    }
}
