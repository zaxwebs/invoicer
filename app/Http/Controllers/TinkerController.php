<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Setting;
use App\Models\Customer;
use Illuminate\Http\Request;

class TinkerController extends Controller
{
	public function index()
	{
		return redirect()->route('customers.edit', Customer::first())->with('alert-from', alertify('Hello from Tinker', 'x'));
	}
}
