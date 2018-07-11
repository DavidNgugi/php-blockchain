<?php

namespace PHPBlockchain;

/**
 * Represents a transaction (transfer of something) on the blockchain. 
 */
class Transaction
{
	/**
     * The sender
     * 
     * @var string
    */
	private $from;

	/**
     * The recepient
     * 
     * @var string 
    */
	private $to;

	/**
     * The amount of course :)
     * 
     * @var int 
    */
	private $amount;

	/**
	 * Sets transaction details
	 * 
	 * @param string $from
	 * @param string $to
	 * @param int $amount
	 *  
     * @return void
    */
	public function __construct($from, $to, $amount)
	{
		$this->from = $from;
		$this->to = $to;
		$this->amount = $amount;
	}

	/**
	 * Gets the from address of who intiated the transaction
	 *  
     * @return string
    */
	public function getFrom() : String
	{
		return $this->from;
	}

	/**
	 * Gets the from address of the recepient ofinti the transaction
	 *  
     * @return string
    */
	public function getTo() : String
	{
		return $this->to;
	}

	/**
	 * Gets the amount being transacted
	 *  
     * @return int
    */
	public function getAmount() : int
	{
		return (int) $this->amount;
	}
}