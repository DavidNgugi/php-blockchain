<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

use PHPBlockchain\{Block, Transaction};

class BlockTests extends TestCase
{
	private $block;

	function __construct()
	{
		parent::__construct();
		$this->block = new Block();
	}

	public function testBlockIsValid()
	{
		$this->assertInstanceOf(Block::class, $this->block);
	}

	/**
      * @depends testBlockIsValid
    */
	public function testIndexIsSet()
	{
		$this->assertSame(0, $this->block->index);
	}

	/**
      * @depends testBlockIsValid
    */
	public function testNonceIsSet()
	{
		$this->assertSame(0, $this->block->getNonce());
	}

	/**
      * @depends testBlockIsValid
    */
	public function testTimestampIsNotSet()
	{
		$this->assertAttributeEmpty('timestamp', $this->block);
	}

	/**
      * @depends testBlockIsValid
    */
	public function testTimestampIsSet()
	{
		$this->block->setTimestamp();
		$this->assertAttributeNotEmpty('timestamp', $this->block);
	}

	/**
      * @depends testBlockIsValid
    */
	public function testPreviousHashNotSet()
	{
		$this->assertSame("", $this->block->getPreviousHash());
	}

	/**
      * @depends testBlockIsValid
    */
	public function testCurrentHashNotSet()
	{
		$this->assertSame("", $this->block->getCurrentHash());
	}

	/**
      * @depends testBlockIsValid
    */
	public function testTransactionsEmpty()
	{
		$this->assertEmpty($this->block->getTransactions());
	}

	/**
      * @depends testBlockIsValid
    */
	public function testCanAddTransaction()
	{
		$transaction = new Transaction("David", "Dan", 1000);
		$this->block->addTransaction($transaction);
		$this->assertCount(1, $this->block->getTransactions());
	}


}