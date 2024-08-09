<?php

use App\Models\Invoice;

Invoice::with('customer')->limit(4)->get();