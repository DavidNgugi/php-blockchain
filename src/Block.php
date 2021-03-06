<?php

namespace PHPBlockchain;

use PHPBlockchain\Transaction;

/**
 * A unit of the Blockchain is called a Block represented by this class
 */
class Block
{
    /**
     * Indicates the position of a block in the blockchain
     * 
     * @var int 
    */
    public $index;

    /**
     * Current timestamp when block was created
     *
     * @var int
     */
    private $timestamp;

    /**
     * The previous block's hash
     *
     * @var string
     */
    private $previousHash;

    /**
     * The current new block's hash
     *
     * @var string
     */
    private $currentHash;

    /**
     * Represents a pseudo-random number that can only be used once
     * 
     * @var int
     */
    private $nonce;

    /**
     * A collection of transaxctions associated with a block
     *
     * @var array
     */
    private $transactions;

    public function __construct()
    {
        $this->index = 0;
        $this->previousHash = "";
        $this->currentHash = "";
        $this->nonce = 0;
        $this->transactions = [];
    }

    /**
     * Sets the hash for the previous block
     * 
     * @param string $value
     *  
     * @return void
    */
    public function setPreviousHash($value) : Void
    {
        $this->previousHash = $value;
    }

    /**
     * Gets the previous hash
     *  
     * @return string
    */
    public function getPreviousHash() : String
    {
        return $this->previousHash;
    }

    /**
     * Sets the timestamp of the current block
     * 
     * @return void
    */
    public function setTimestamp() : Void
    {
        $this->timestamp = time();
    }

    /**
     * Gets the timestamp of the block
     *  
     * @return int
    */
    public function getTimestamp() : int
    {
        return $this->timestamp;
    }

     /**
     * Sets the nonce of the current block
     * 
     * @return void
    */
    public function setNonce($value) : Void
    {
        $this->nonce = $value;
    }

    /**
     * Gets the nonce of the block
     *  
     * @return int
    */
    public function getNonce() : int
    {
        return $this->nonce;
    }

    /**
     * Sets the current hash for a new block
     * 
     * @param string $value
     *  
     * @return void
    */
    public function setCurrentHash($value) : Void
    {
        $this->currentHash = $value;
    }

    /**
     * Get the current hash
     *  
     * @return string
    */
    public function getCurrentHash() : String
    {
        return $this->currentHash;
    }

    /**
     * Adds a new transaction to transactions in a block
     * 
     * @param PHPBlockchain\Transaction
     *  
     * @return array
    */
    public function addTransaction(Transaction $transaction) : Array
    {
        $this->transactions[] = $transaction;
        return $this->transactions;
    }

    /**
     * Adds a new transactions to transactions in a block
     * 
     * @param array $transactions
     *  
     * @return array
    */
    public function addTransactions($transactions) : Array
    {
        $transaction = new Transaction;
        foreach($transactions as $t){
            if($t instanceof $transaction){
                $this->transactions[] = $t;
            }
        }
        return $this->transactions;
    }

    /**
     * Gets all transactions in a block
     *  
     * @return array
    */
    public function getTransactions() : Array
    {
        return $this->transactions;
    }

    /**
     * Concantenates the block information
     *  
     * @return string
    */
    public function getContent() : String
    {
        return json_encode($this->transactions).$this->index.$this->previousHash.$this->nonce;
    }
}