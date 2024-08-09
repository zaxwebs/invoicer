<?php

use App\Models\Invoice;

// get first 4 invoices with customer
Invoice::take(4)->with('customer')->get();