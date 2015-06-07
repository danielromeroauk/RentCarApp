<?php namespace Modules\Agreement\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model {

    protected $table = 'agreements';

    protected $fillable = [
        'code',
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
        return $this->belongsTo('Modules\Car\Entities\Color', 'car_color_id');
    }

    public function status() {
        return $this->belongsTo('Modules\Agreement\Entities\AgreementStatus', 'agreement_status_id');
    }

    public function client() {
        return $this->belongsTo('Modules\Client\Entities\Client', 'client_id');
    }

}