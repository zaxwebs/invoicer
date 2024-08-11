<?php

namespace App\Enums;

enum InvoiceStatus: string
{
	case ISSUED = 'issued';
	case PAID = 'paid';
	case CANCELLED = 'cancelled';
	case REFUNDED = 'refunded';
	case PARTIALLY_PAID = 'partially_paid';

	public function label(): string
	{
		return match ($this) {
			self::ISSUED => 'Issued',
			self::PAID => 'Paid',
			self::CANCELLED => 'Cancelled',
			self::REFUNDED => 'Refunded',
			self::PARTIALLY_PAID => 'Partially Paid',
		};
	}
}