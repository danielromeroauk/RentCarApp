<?php namespace Modules\Agreement\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgreementRequest extends FormRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'code' => 'required',
            'client_id' => 'required',
            'car_id' => 'required',
            'car_brand_id' => 'required',
            'car_prototype_id' => 'required',
            'car_color_id' => 'required',
            'agreement_status_id' => 'required',
            'sheet_car' => 'required',
            'registration_date' => 'required',
            'delivery_date' => 'required',
            'cash' => 'required'
		];
	}

}
