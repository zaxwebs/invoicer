<?php

namespace Tests\Feature;

use Tests\TestCase;
use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Test;

class AlertifyTest extends TestCase
{
	// annotations will be deprecated, use attributes instead.
	#[Test]
	public function it_returns_an_array_with_message_and_type()
	{
		$result = alertify('Test message', 'info');

		$this->assertIsArray($result);
		$this->assertArrayHasKey('message', $result);
		$this->assertArrayHasKey('type', $result);
		$this->assertEquals('Test message', $result['message']);
		$this->assertEquals('info', $result['type']);
	}

	#[Test]
	public function it_defaults_type_to_success()
	{
		$result = alertify('Default type message');

		$this->assertEquals('success', $result['type']);
	}

	#[Test]
	public function it_throws_exception_for_invalid_type()
	{
		$this->expectException(InvalidArgumentException::class);
		$this->expectExceptionMessage('Invalid alert type: x. Allowed types are: success, info, danger, warning');

		alertify('Invalid type message', 'x');
	}

	#[Test]
	public function it_allows_valid_types()
	{
		$types = ['success', 'info', 'danger', 'warning'];

		foreach ($types as $type) {
			$result = alertify('Valid type message', $type);
			$this->assertEquals($type, $result['type']);
		}
	}
}
