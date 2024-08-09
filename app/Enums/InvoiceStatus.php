<?php

namespace App\Enums;

enum InvoiceStatus: string
{
	case ISSUED = 'Issued';
	case PAID = 'Paid';
	case CANCELLED = 'Cancelled';
	case REFUNDED = 'Refunded';
	case PARTIALLY_PAID = 'Partially Paid';
}