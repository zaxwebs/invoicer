<?php

use Carbon\Carbon;
use App\Models\Invoice;

// get only date
$now = Carbon::now()->toDateString();

$invoices = Invoice::overdue()->get();