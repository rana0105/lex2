<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Context extends Model
{
    protected $fillable = [
        'esource', 'etitle', 'enote','eterms', 'csource', 'ctitle', 'cnote','cterms', 'status',
    ];

    public function paracontext() {
    	return $this->hasMany('App\Model\CotextParagraph', 'context_id');
    }
}
