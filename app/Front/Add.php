<?php

namespace App\Front;

use Illuminate\Database\Eloquent\Model;

class Add extends Model
{
   
   protected $table = 'adds';
   protected $guarded = [];

   public function department_id()
    {
      // return $this->belongsTo(Department::class);
        return $this->belongsTo('App\Model\Department', 'department_id', 'id');

    }//end fo category

    public function user_id()
    {
      // return $this->belongsTo(Department::class);
        return $this->belongsTo('App\User', 'user_id', 'id');

    }//end fo category
}
