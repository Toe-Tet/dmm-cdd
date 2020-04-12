<?php

namespace App\Http\Controllers;


use App\Notification;
use App\Http\Controllers\Controller;
use App\Toetet\Exceptions\DataUnavailableException;
use Illuminate\Support\Arr;

class BaseController extends Controller
{
    protected function view($view, array $data = []){
        // Notification
//        $count_notifications = Notification::where('read_unread', '=', false)->count();
//        $notifications = Notification::where('read_unread', '=', false)->get();
//        view()->share('count_notifications', $count_notifications);
//        view()->share('notifications', $notifications);

//        view()->share('auth', auth()->user()); // Auth User
//        $data = json_decode(json_encode($data), true); // Prevent Php Object
        // $v = explode('.', $view);
        // $view = Arr::first($v) == 'backend' ? $view : 'backend.'.$view;
        $layout = view('partials.master', $data)->nest('content', $view, $data);

        return $layout;
    }

    public function jsonToArray($object){
        $data = json_decode(json_encode($object), true);
        if(empty($data)){
            throw new DataUnavailableException();
        }
        return $data[0];
    }

    /**
     * @param $data array or object
     * @return mixed
     * @throws DataUnavailableException
     */
    public function checkDataExistsOrThrow($data){
        if(collect($data)->isEmpty()){
            throw new DataUnavailableException();
        }

        return $data;
    }
}
