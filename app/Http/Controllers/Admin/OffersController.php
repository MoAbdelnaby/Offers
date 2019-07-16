<?php

namespace App\Http\Controllers\Admin;

use App\Model\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\OffersDatatable;
use Storage;

class OffersController extends Controller
{

    public function index(OffersDatatable $offer)
    {
       return $offer->render('admin.offers.index', ['title'=>trans('admin.offers')]);
    }

    public function create()
    {
     return view('admin.offers.create', ['title'=>trans('admin.create_offers')]);
    }

   
    public function store(Request $request)
    {
         $data = $this->validate(request(),

        [
            'offer_name_ar'=>'required',
            'offer_name_en'=>'required', 
            'description_ar'=>'sometimes|nullable', 
            'description_en'=>'sometimes|nullable', 
            'price'=>'sometimes|nullable', 
            'stock'=>'sometimes|nullable', 
            'department_id'=>'required|numeric',
            'image'=>'sometimes|nullable|'.v_image(),

         
        ], [],[

            'offer_name_ar'=>trans('admin.city_offer_name_ar'),
            'offer_name_en'=>trans('admin.city_offer_name_en'),
            'country_id'=>trans('admin.country_id'),
            'description_ar'=>trans('admin.description_ar'),
            'description_en'=>trans('admin.description_en'),
            'price'=>trans('admin.price'),
            'stock'=>trans('admin.stock'),
            'image'=>trans('admin.offer_image'),
         
        ]);

          if(request()->hasFile('image'))
        {
            
            $data['image'] = up()->upload([      // upload method in Upload.php controller
                'file'=>'image',
                'path'=>'offers',             //folder
                'upload_type'=>'single',
                'delete_file'=>'', // helper function

            ]);
        }
        

        Offer::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('offers'));
    }

    public function show(Offer $offer)
    {
        //
    }

  
    public function edit(Offer $offer)
    {
        return view('admin.offers.edit',compact('offer'),['title'=>trans('admin.edit')]);
    }

  
    public function update(Request $request, Offer $offer)
    {
          $data = $this->validate(request(),

        [
            'offer_name_ar'=>'required',
            'offer_name_en'=>'required', 
            'description_ar'=>'sometimes|nullable', 
            'description_en'=>'sometimes|nullable', 
            'price'=>'sometimes|nullable', 
            'stock'=>'sometimes|nullable', 
            'department_id'=>'required|numeric',
            'image'=>'sometimes|nullable|'.v_image(),

         
        ], [],[

            'offer_name_ar'=>trans('admin.city_offer_name_ar'),
            'offer_name_en'=>trans('admin.city_offer_name_en'),
            'country_id'=>trans('admin.country_id'),
            'description_ar'=>trans('admin.description_ar'),
            'description_en'=>trans('admin.description_en'),
            'price'=>trans('admin.price'),
            'stock'=>trans('admin.stock'),
            'image'=>trans('admin.offer_image'),
         
        ]);

          if(request()->hasFile('image'))
        {
            
          $data['image'] = up()->upload([      // upload method in Upload.php controller
                'file'=>'image',
                'path'=>'offers',             //folder
                'upload_type'=>'single',
                'delete_file'=>$offer->image, // helper function

            ]);
        }
        

        $offer->update($data);
        session()->flash('success', trans('admin.record_updated'));
        return redirect(aurl('offers'));
    }

  
    public function destroy(Offer $offer)
    {
        Storage::delete($offer->image);
        $offer->delete();
        session()->flash('success', trans('admin.record_deleted'));
        return redirect(aurl('offers'));
    }

    
}
