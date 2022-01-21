<?php

class Conta
{
    private Titular $titular;
    private float $saldo = 0;
    private static $numeroDeContas = 0;
    
    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        $this->saldo = 0;
        
        Conta::$numeroDeContas++;
    }
    
    public function __destruct()
    {
        Conta::$numeroDeContas--;
    }
    
    public function saca (float $valorASacar): void
    {
        if ($valorASacar > $this->saldo){
            echo "Saldo indisponível";
            return;
        }

        $this->saldo -= $valorASacar;   
    }
     
    public function deposita (float $valorADepositar): void
    {
        if ($valorADepositar < 0){
            echo "O valor precisa ser positivo";
            return;
        }
        
        $this->saldo += $valorADepositar;
    }
    
    public function transfere (float $valorATransferir, Conta $contaDestino)
    {
        if ($valorATransferir > $this->saldo){
            echo "Você não tem saldo o suficiente";
            return;
        }
        
        $this->sacar($valorATransferir);
        $contaDestino->depositar($valorATransferir);
    }
    
    public function recuperaSaldo(): float
    {
        return $this->saldo;
    }
    
    public function recuperaNomeTitular(): string
    {
        return $this->titular->recuperaNome();
    }
    
    public function recuperaCpfTitular(): string
    {
        return $this->titular->recuperaCpf();
    }
    
    public static function recuperaNumeroDeContas(): int
    {
        return Conta::$numeroDeContas;
    }
}