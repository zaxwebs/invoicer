<?php

use App\Models\Invoice;

$invoices = Invoice::paid()->count();