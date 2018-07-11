<?php

namespace PHPBlockchain;

include('Blockchain.php');
include('Block.php');
include('Transaction.php');

// use PHPBlockchain\{Blockchain, Block, Transaction};

class TestBlockchain {

    public $blockchain;

    public function __construct(){
        $this->blockchain = new Blockchain();
    }
    
    public function display(): Void{
        print_r($this->blockchain->display());
    }

    public function addNewTransactions($from, $to, $amount): Void{
        $transactions[] = new Transaction($from, $to, $amount);
        $this->blockchain->addNewBlock($transactions);
        $this->display();
    }
}

// We do some real tests here
$blockchain = new TestBlockchain;
$blockchain->addNewTransactions('David', 'Dan', 200);
$blockchain->addNewTransactions('Dan', 'David', 100);