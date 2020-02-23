<?php // gkc_hash_code : 01DPWANC6E80S4P925SVA9ACPW ?>
<?php

namespace App\Repositories\Dictionary;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;

class AdminRepository 
{
    protected $model;

    public function __construct()
    {
        $this->model = new Admin();
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

    public function getByCondition($condition)
    {
        if (sizeof($condition)) {
            $query = $this->model
                ->where($condition);
        } else {
            $query = $this->model;
        }

        return $query->with(['role'])
            ->latest()
            ->paginate();
    }

    /**
     * Get list user paginate
     *
     * @param int|null $paginate
     * @param string|null $name
     * @return array
     */
    public function search($name = null, $limit = null)
    {
        $keywork = "%{$name}%";
        $users = $this->model->where('name', 'like', $keywork)
            ->orWhere('username', 'like', $keywork)
            ->paginate($limit);

        return $users;
    }

    public function getBookmarkList($userId, $perPage = 15)
    {
        return $this->model
            ->where('id', $userId)
            ->first()
            ->bookmarks()
            ->with(['user', 'category', 'bannerImage'])
            ->publish()
            ->latest()
            ->paginate($perPage);
    }
}
