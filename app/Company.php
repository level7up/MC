<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'id', 'name', 'email', 'logo','website'
    ];


    public function employee(){
        return $this->hasMany('App\Employee', 'company_id');
    }
}
