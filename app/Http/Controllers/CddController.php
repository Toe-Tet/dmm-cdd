<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Repositories\DataRepo;
use Illuminate\Http\Request;

class CddController extends BaseController
{
    protected $cdd_repo;

    public function __construct()
    {
        $this->cdd_repo = DataRepo::cdd();
    }

    public function index(Request $request)
    {
        $param = [];
        // $from_date = null;
        // $to_date = null;
        // if($request->from_date && $request->to_date){
        //     $param['from'] = $request->from_date;
        //     $param['to'] = $request->to_date;
        //     $from_date = $request->from_date;
        //     $to_date = $request->to_date;
        // }
        $keyword = null;
        if($keyword = $request->keyword){
            $param['keyword'] = $keyword;
        }
        if($request->page){
            $param['page'] = $request->page;
        }

        $response = $this->cdd_repo->users($param);

        $cdds = $response['data']['data'];

        $paginate = [
            'current_page' => $response['data']['current_page'],
            'total_page' => $response['data']['last_page'],
            'per_page' => $response['data']['per_page'],
            'total' => $response['data']['total'],
            'from' => $response['data']['from'],
            'to' => $response['data']['to']
        ];

        return $this->view('cdd.index', compact('cdds', 'paginate', 'keyword'));
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
