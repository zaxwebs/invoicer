<?php

use App\Models\Customer;

Customer::count();

Customer::limit(4)->get();
