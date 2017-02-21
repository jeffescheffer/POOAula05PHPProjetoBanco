<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContaBanco
 *
 * @author Jefferson
 */
class ContaBanco {

    //put your code here
    //Atributos
    public $numConta;
    protected $tipo;
    private $dono;
    private $saldo;
    private $status;

    //Métodos
    public function abrirConta($t) {
        $this->setTipo($t);
        $this->setStatus(true);
        if ($t == "CC") {
            $this->setSaldo(50);
        } elseif ($t == "CP") {
            $this->setSaldo(150);
        }
    }

    public function fecharConta() {
        if ($this->getSaldo() > 0) {
            echo '<p>Conta com saldo. Não pode ser fechada</p>';
        } elseif ($this->getSaldo() < 0) {
            echo '<p>Conta com saldo negativo. Não pode ser fechada</p>';
        } else {
            echo '<p>A conta pode ser encerrada</p>';
        }
    }

    public function depositar($v) {
        if ($this->getStatus()) {
            $this->setSaldo($this->getSaldo() + $v);
            echo "<p>Seu saldo atual é " + $this->getSaldo() + "<p>,00</p>";
        } else {
            echo '<p>Conta fechada, impossível depositar</p>';
        }
    }

    public function sacar($s) {
        if ($this->getStatus()) {
            if ($this->getSaldo() >= $s) {
                $this->setSaldo($this->getSaldo() - $s);
                echo '<p>Seu saldo atual é ' . $this->getSaldo() . ',00</p>';
            } else {
                echo '<p>Seu saldo é insuficiente para saque</p>';
            }
        } else {
            echo '<p>Conta fechada, impossível sacar</p>';
        }
    }

    public function pagarMens() {
        if ($this->getStatus()) {
            if ($this->getTipo() == 'CC') {
                $this->setSaldo($this->getSaldo() - 12);
                echo '<p>Foi descontado R$ 12,00 de sua conta corrente pela mensalidade';
                echo '<p>Seu saldo atual é de </p>' + $this->getSaldo() + '<p>,00</p>';
            } elseif ($this->getTipo() == 'CP') {
                $this->setSaldo($this->getSaldo() - 20);
                echo '<p>Foi descontado R$ 20,00 de sua conta corrente pela mensalidade</p)';
                echo '<p>Seu saldo atual é de </p>' + $this->getSaldo() + '<p>,00</p>';
            } else {
                echo '<p>Problemas com a conta, não podemos cobrar a mensalidade</p>';
            }
        }
    }

    //Métodos Especiais
    function __construct() {
        $this->setSaldo(0);
        $this->setStatus(false);
        echo '<p>Conta criada com sucesso!</p>';
    }

    function getNumConta() {
        return $this->numConta;
    }

    function getTipo() {
        return $this->tipo;
    }

function getDono() {
        return $this->dono;
    }

    function getSaldo() {
        return $this->saldo;
    }

    function getStatus() {
        return $this->status;
    }

    function setNumConta($numConta) {
        $this->numConta = $numConta;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setDono($dono) {
        $this->dono = $dono;
    }

    function setSaldo($saldo) {
        $this->saldo = $saldo;
    }

    function setStatus($status) {
        $this->status = $status;
    }

}
