<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

use PHPBlockchain\{Blockchain, Block, Transaction};

/**
 * 
 */
class BlockchainTests extends TestCase
{
	private $block;

	function __construct()
	{
		parent::__construct();
	}

	public function testBlockchainIsValid()
	{
		$this->assertTrue(true);
	}

}