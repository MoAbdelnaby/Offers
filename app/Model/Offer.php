<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
	protected $table = 'offers';
    protected $guarded = [];

     public function department_id()
    {
      // return $this->belongsTo(Department::class);
        return $this->belongsTo('App\Model\Department', 'department_id', 'id');

    }//end fo category
}
