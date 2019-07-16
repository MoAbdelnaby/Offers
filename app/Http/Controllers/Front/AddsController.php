<?php

namespace App\Http\Controllers\Front;

use App\Front\Add;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Storage;

class AddsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Add $add)
    {   
       // $adds = $add->all();
         $adds = $add->where('user_id', Auth::user()->id)->get();
         return view('style.adds.index', compact('adds'));
        
    }

    public function create()
    {

        return view('style.adds.create', ['title'=>trans('admin.create_offers')]);
    }

 
    public function store(Request $request)
    {
          $data = $this->validate(request(),

        [
            'add_name'=>'required', 
            'user_id'=>'required', 
            'status'=>'required', 
            'description_ar'=>'sometimes|nullable', 
            'price'=>'sometimes|nullable', 
            'stock'=>'sometimes|nullable', 
            'department_id'=>'required|numeric',
            'image'=>'required|'.v_image(),

         
        ], [],[

            'add_name_'=>trans('admin.city_add_name_ar'),
            'department_id'=>trans('admin.department_id'),
            'description_ar'=>trans('admin.description_ar'),
            'price'=>trans('admin.price'),
            'stock'=>trans('admin.stock'),
            'image'=>trans('admin.offer_image'),
         
        ]);

          if(request()->hasFile('image'))
        {
            
            $data['image'] = up()->upload([      // upload method in Upload.php controller
                'file'=>'image',
                'path'=>'userAdds',             //folder
                'upload_type'=>'single',
                'delete_file'=>'', // helper function

            ]);
        }
        
        Add::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect('profile');
    }


    public function edit(Add $add)
    {
         return view('style.adds.edit',compact('add'),['title'=>trans('admin.edit')]);
    }

 
    public function update(Request $request, Add $add)
    {
        
           $data = $this->validate(request(),

        [
            'add_name'=>'required', 
            'user_id'=>'required', 
            'status'=>'required', 
            'description_ar'=>'sometimes|nullable', 
            'price'=>'sometimes|nullable', 
            'stock'=>'sometimes|nullable', 
            'department_id'=>'required|numeric',
            'image'=>'required|'.v_image(),

         
        ], [],[

            'add_name'=>trans('admin.city_add_name_ar'),
            'department_id'=>trans('admin.department_id'),
            'description_ar'=>trans('admin.description_ar'),
            'price'=>trans('admin.price'),
            'stock'=>trans('admin.stock'),
            'image'=>trans('admin.offer_image'),
         
        ]);

          if(request()->hasFile('image'))
        {
            
            $data['image'] = up()->upload([      // upload method in Upload.php controller
                'file'=>'image',
                'path'=>'userAdds',             //folder
                'upload_type'=>'single',
                'delete_file'=>$add->image, // helper function

            ]);
        }
        
        $add->update($data);
        session()->flash('success', trans('admin.record_updated'));
        return redirect('profile');

    }

 
    public function destroy(Add $add)
    {
        Storage::delete($add->image);
        $add->delete();
        session()->flash('success', trans('admin.record_deleted'));
        return redirect('profile');
    }

    public function show($id) {
        $adds = Add::where('id', $id)->get();
        return view('style.adds.show', compact('adds'));
    }
}
