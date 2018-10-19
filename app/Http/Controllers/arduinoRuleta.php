<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use arduino;

class arduinoRuleta extends Controller
{

    /**
     * Pin donde está colocado el servomotor.
     * @var string
     */
    private $pin;
    /**
     * Constructor que abre un puerto.
     * @param string $puerto: nombre del puerto a abrir.
     */
    public function __construct($puerto, $pin) {
        parent::__construct($puerto);
        $this->pin = $pin;
        parent::escribir($this->pin);
    }
    /**
     * Enciende el servomotor.
     */
    public function encender(){
        parent::escribir("101");
    }

    /**
     * Apaga el servomotor.
     */
    public function apagar(){
        parent::escribir("100");
    }
}
