<?php namespace Modules\Client\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Country extends Model {

    protected $table = 'countries';

    protected $fillable = ['name'];

    public function client() {
        return $this->hasMany('Modules\Client\Entities\Client');
    }

}