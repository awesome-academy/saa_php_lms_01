<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dictionary\AdminRepository;
use App\Http\Requests\AdminFormRequest;

class UserController extends Controller
{
    protected $repository;

    public function __construct(AdminRepository $repository){
        $this->repository = $repository;
    }

    public function index(){
        $users = $this->repository->all();
        return view('admin/user/index',compact('users'));
    }

    public function create(){
        return view('admin/user/create');
    }

    public function store(AdminFormRequest $request){
        $data = $request->all();
        // $data->password = Hash
        $this->repository->create($data);
        return redirect()->back()->with('status','Thêm mới thành công');
    }

    public function search(Request $request){
        $users = $this->repository->search($request->keyword,$request->size?$request->size:10 );
        return view('admin/user/index',compact('users'));
    }

    public function edit($id){
        $user = $this->repository->show($id);
        return view('admin/user/edit', compact('user'));
    }

    public function update(Request $request, $id){
        $result = $this->repository->update($request->all(), $id);
        if($result){
            return redirect()->route('admin\user\index');
            //return redirect(action('UserController@edit', $result->id))->with('status', 'The user '.$id.' has been updated!');
        }
        return redirect()->route('admin\user\index');
    }

    public function delete($id){
        $this->repository->delete($id);
        return redirect()->route('admin\user\index');
    }
}
