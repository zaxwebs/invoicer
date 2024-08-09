<?php

use App\Models\Invoice;

$invoices = Invoice::with('customer')->limit(4)->get();

$invoices->first()->customer;