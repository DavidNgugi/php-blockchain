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

    public function addNewTransaction($from, $to, $amount): Void{
        $transactions[] = new Transaction($from, $to, $amount);
        $this->blockchain->addNewBlocks($transactions);
    }

    public function addManyTransactions($transactions): Void {
        $t = [];
        foreach($transactions as $transaction){
            $t[] = new Transaction($transaction[0], $transaction[1], $transaction[2]);
            // $this->blockchain->addNewBlocks($t);
        }

        $this->blockchain->addNewBlocks($t);
        
    }
}

// We do some real tests here
$blockchain = new TestBlockchain;
$transactions = [
    ['David', 'Dan', 200],
    ['Dan', 'David', 100],
    ['Cynthia', 'David', 50],
    ['Martin', 'David', 100]
];

// Adding single transactions
// $blockchain->addNewTransaction('David', 'Dan', 200);
// $blockchain->addNewTransaction('Dan', 'David', 100);

// Adding batch transactions
$blockchain->addManyTransactions($transactions);
$blockchain->display();