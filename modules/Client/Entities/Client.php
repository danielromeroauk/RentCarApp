<?php namespace Modules\Client\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Client extends Model {

    protected $table = 'clients';

    protected $fillable = [
        'firstname',
        'lastname',
        'passport',
        'countries_id'
    ];

    public function country() {
        return $this->belongsTo('Modules\Client\Entities\Country', 'countries_id');
    }

}