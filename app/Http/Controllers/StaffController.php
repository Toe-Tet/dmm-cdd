<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Repositories\DataRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Backend\BaseController;

class StaffController extends BaseController
{
    protected $staff;

    public function __construct()
    {
        $this->staff = DataRepo::staff();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->view('admin.staffs.index');
    }

    public function staff_data()
    {
        return Datatables::of($this->staff->getAll())
            ->addColumn('action', function ($staff) {
                return view('backend.admin.staffs.action', compact('staff'))->render();
            })
            ->make(true);
    }

    public function cashiers()
    {
        return $this->view('admin.staffs.cashiers');
    }

    public function cashier_data()
    {
        return Datatables::of($this->staff->model()->where('type', 'cashier')->get())
            ->addColumn('action', function ($staff) {
                return view('backend.admin.staffs.action', compact('staff'))->render();
            })
            ->make(true);
    }

    public function gatekeepers()
    {
        return $this->view('admin.staffs.gatekeepers');
    }

    public function gatekeeper_data()
    {
        return Datatables::of($this->staff->model()->where('type', 'gatekeeper')->get())
            ->addColumn('action', function ($staff) {
                return view('backend.admin.staffs.action', compact('staff'))->render();
            })
            ->make(true);
    }

    public function storekeepers()
    {
        return $this->view('admin.staffs.storekeepers');
    }

    public function storekeeper_data()
    {
        return Datatables::of($this->staff->model()->where('type', 'storekeeper')->get())
            ->addColumn('action', function ($staff) {
                return view('backend.admin.staffs.action', compact('staff'))->render();
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view('admin.staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->staff->store($request);
        return redirect()->route('staffs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = $this->staff->find($id);
        $this->checkDataExistsOrThrow($staff);
        return $this->view('admin.staffs.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = $this->staff->find($id);
        $this->checkDataExistsOrThrow($staff);
        return $this->view('admin.staffs.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->staff->update($request, $id);
        return redirect()->route('staffs.index');
    }

    public function active($id)
    {
        success_alert('Staff is activated');
        $this->staff->model()->where('id', $id)->update([
            'active' => 1
        ]);
        return back();
    }

    public function ban($id)
    {
        success_alert('Staff is ban');
        $this->staff->model()->where('id', $id)->update([
            'active' => 0
        ]);
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->staff->destroy($id);
        return redirect()->route('staffs.index');
    }
}
