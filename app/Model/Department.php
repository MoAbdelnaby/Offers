<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
     protected $table = 'departments';
    protected $fillable = [
    	'dep_name_ar',
		'dep_name_en',
        'icon',
		'description',
		'keyword',
		'parent',
	
		

    ];

public function offers()
    {
        return $this->hasMany(\Offer::class);

    }//end of offers

public function adds()
    {
        return $this->hasMany('App\Front\Add', 'department_id');

    }//end of adds

public function parent()
{
    return $this->belongsTo('App\Model\Department', 'parent');
    // return $this->belongsTo(self::class, 'parent');
}

public function children()
{
    return $this->hasMany('App\Model\Department', 'parent');
    // return $this->hasMany(self::class, 'parent');
}

}