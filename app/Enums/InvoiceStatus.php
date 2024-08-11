<?php

namespace App\Enums;

enum InvoiceStatus: string
{
	case ISSUED = 'issued';
	case PAID = 'paid';
	case PARTIALLY_PAID = 'partially_paid';
	case OVERDUE = 'overdue';
	case CANCELLED = 'cancelled';
	case REFUNDED = 'refunded';

	public function label(): string
	{
		return match ($this) {
			self::ISSUED => 'Issued',
			self::PAID => 'Paid',
			self::PARTIALLY_PAID => 'Partially Paid',
			self::OVERDUE => 'Overdue',
			self::CANCELLED => 'Cancelled',
			self::REFUNDED => 'Refunded',
		};
	}
}