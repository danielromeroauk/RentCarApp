<?php namespace Modules\Agreement\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model {

    protected $table = 'agreements';

    protected $fillable = [
        'code',
        'client_id',
        'car_id',
        'agreement_status_id',
        'registration_date',
        'delivery_date',
        'cash'
    ];

    public function car() {
        return $this->belongsTo('Modules\Car\Entities\Car', 'car_id');
    }

    public function status() {
        return $this->belongsTo('Modules\Agreement\Entities\AgreementStatus', 'agreement_status_id');
    }

    public function client() {
        return $this->belongsTo('Modules\Client\Entities\Client', 'client_id');
    }

}