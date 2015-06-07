<?php namespace Modules\Agreement\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model {

    protected $table = 'agreements';

    protected $fillable = [
        'client_id',
        'car_id',
        'car_brand_id',
        'car_prototype_id',
        'car_color_id',
        'agreement_status_id',
        'sheet_car',
        'registration_date',
        'delivery_date',
        'cash'
    ];

    public function car() {
        return $this->belongsTo('Modules\Car\Entities\Brand', 'car_id');
    }

    public function brand() {
        return $this->belongsTo('Modules\Car\Entities\Brand', 'car_brand_id');
    }

    public function prototype() {
        return $this->belongsTo('Modules\Car\Entities\Brand', 'car_prototype_id');
    }

    public function color() {
        return $this->belongsTo('Modules\Car\Entities\Brand', 'car_color_id');
    }

    public function agreement_status() {
        return $this->belongsTo('Modules\Agreement\Entities\AgreementStatus', 'agreement_status_id');
    }

}