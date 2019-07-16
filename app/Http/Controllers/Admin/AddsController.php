<?php

namespace App\Http\Controllers\Admin;

use App\Front\Add;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class AddsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $adds = Add::where('status', 'pending')->get();
       return view('admin.adds.index', compact('adds'));
    }

     public function show($id)
    {
        $adds = Add::where('id', $id)->get();
        
        return view('admin.adds.show', compact('adds'));

    }

    public function update(Request $request, $id)
    {
       $data = $this->validate(request(),
                [

                    'status' => 'required',
                ],[] ,[

                    'status'=>trans('admin.status'),

                ]);

       Add::where('id', $id)->update($data);
        session()->flash('success', trans('admin.record_updated'));
        return redirect(aurl('adds'));
    }

    public function destroy(Add $add)
    {
        Storage::delete($add->image);
        $add->delete();
        session()->flash('success', trans('admin.record_deleted'));
        return redirect(aurl('adds'));
    }
}
