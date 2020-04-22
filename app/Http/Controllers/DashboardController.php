<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Repositories\DataRepo;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    protected $cdd_repo;

    public function __construct()
    {
        $this->cdd_repo = DataRepo::cdd();
    }

    public function index()
    {
        $response = $this->cdd_repo->all_data_count();

        $cdds = $response['data'][0];

        return $this->view('dashboard.index', compact('cdds'));
    }
    // public function post(){
    //     $post = Post::all()->first();
    //     return $this->view('admin.posts.post', compact('post'));
    // }

    // public function validation(Request $request){
    //     $rules = [
    //         'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'text' => 'required|string'
    //     ];
    //     return $request->validate($rules);
    // }

    // public function update(Request $request, $id){
    //     $this->validation($request);
    //     $data = $request->only(['text']);
    //     if($request->photo){
    //         $this->delete_photo($id);
    //         $data['photo'] = $this->store_photo($request->photo);
    //     }

    //     Post::where('id', $id)->update($data);
    //     success_alert('Post is updated');
    //     return back();
    // }

    // public function store_photo($photo = null)
    // {
    //     if(!is_null($photo)){
    //         $file = $photo->move(public_path('db/posts'), image_name('posts').'.'.$photo->getClientOriginalExtension() );
    //         return 'db/posts/' . $file->getFilename();
    //     }
    //     return null;
    // }

    // public function delete_photo($id)
    // {
    //     $photo = Post::find($id)->photo;
    //     if($photo){
    //         if(file_exists($photo)){
    //             unlink($photo);
    //         }
    //     }
    // }
}
