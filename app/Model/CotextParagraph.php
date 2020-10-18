<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CotextParagraph extends Model
{
    protected $fillable = [
        'context_id', 'context_no', 'esource', 'csource', 'eterms', 'cterms', 'eparagraph', 'cparagraph', 'order', 'status',
    ];

    public function paracontext() {
    	return $this->belongsTo('App\Model\Context', 'context_id', 'id');
    }

    public function temrs() {
    	return $this->hasMany('App\Model\AddTermEngChi', 'context_id');
    }

    public function temreng() {
        return $this->hasMany('App\Model\AddTermEng', 'context_id');
    }

    public function termcha() {
    	return $this->hasMany('App\Model\AddTermCha', 'context_id');
    }
}
