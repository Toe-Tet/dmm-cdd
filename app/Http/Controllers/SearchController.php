<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Arrive;
use App\Http\Controllers\Backend\BaseController;
use App\Repositories\DataRepo;
use Illuminate\Http\Request;

class SearchController extends BaseController
{
    public function search(){
        $results = null;
        return $this->view('admin.search.index', compact('results'));
    }

    public function postSearch(Request $request){
//        dd(2);
        $request->validate([
            'type' => 'required|string',
            'keyword' => 'required|string'
        ]);

        $data = $request->only(['type', 'keyword']);
        $results = null;
        $keyword = $data['keyword'];
        if($data['type'] == 'order'){
            $order = DataRepo::order();
            $results = $order->model()->where('order_no', 'LIKE',$data['keyword'].'%')
                ->limit(20)->orderBy('created_at', 'desc')->pluck('order_no', 'id');
        } elseif($data['type'] == 'shop'){
            $order = DataRepo::order();
            $results = $order->model()->where('shop_no', 'LIKE',$data['keyword'].'%')
                ->limit(20)->orderBy('created_at', 'desc')->pluck('shop_no', 'id');
        } elseif($data['type'] == 'item'){
            $item = DataRepo::item();
            $results = $item->model()->where('item_no', 'LIKE',$keyword.'%')->with('order')->get();
        } else {
            $tracking = DataRepo::tracking();
            $results = $tracking->model()->where('tracking_no', 'LIKE',$data['keyword'].'%')
                ->limit(20)->pluck('tracking_no', 'id');
        }
        $type = $data['type'];
        $keyword = $data['keyword'];

        return $this->view('admin.search.index', compact('results', 'type', 'keyword'));
    }

    public function order($id){
        $order = DataRepo::order();
        $order = $order->find($id);
        $this->checkDataExistsOrThrow($order);
        return $this->view('admin.search.order', compact('order'));
    }

    public function tracking($id){
        $tracking = DataRepo::tracking();
        $tracking = $tracking->find($id);
        $this->checkDataExistsOrThrow($tracking);
        return $this->view('admin.search.tracking', compact('tracking'));
    }
}
