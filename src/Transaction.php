<?php

namespace PHPBlockchain;

/**
 * Represents a transaction (transfer of something) on the blockchain. 
 */
class Transaction
{
	
	private $from;
	private $to;
	private $amount;

	function __construct($from, $to, $amount)
	{
		$this->from = $from;
		$this->to = $to;
		$this->amount = $amount;
	}

	public function getFrom() : String
	{
		return $this->from;
	}

	public function getTo() : String
	{
		return $this->to;
	}

	public function getAmount() : int
	{
		return $this->amount;
	}
}