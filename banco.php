<?php

require_once 'src/Conta.php';
require_once 'src/Titular.php';
require_once 'src/CPF.php';

$junior = new Titular(new CPF('123.221.231-20'), 'Joao Medeiros');
$primeiraConta = new Conta($junior);
$primeiraConta->deposita(500);
$primeiraConta->saca(300);

echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;

var_dump($primeiraConta) . PHP_EOL; 

$kleimer = new Titular(new CPF('123.213.321-12'), 'Kleimer Medeiros');
echo $segundaConta = new Conta($kleimer);
echo $segundaConta->deposita(10000) . PHP_EOL;
echo $segundaConta->recuperaSaldo() . PHP_EOL;

var_dump($segundaConta) . PHP_EOL;

echo Conta::recuperaNumeroDeContas();
