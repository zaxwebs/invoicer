<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return Auth::user()->can('create', Customer::class);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:customers',
			'phone' => 'nullable|string|max:15',
			'address' => 'nullable|string|max:255',
			'image' => 'nullable|image|max:2048',
		];
	}
}
