<?php
require_once 'Nodo.php';

class ArbolBinario {
    public $raiz;

    public function construirDesdePreInorden($preorden, $inorden) {
        $this->raiz = $this->construirArbolPreIn($preorden, $inorden);
    }

    private function construirArbolPreIn($pre, $in) {
        if (empty($pre) || empty($in)) return null;

        $raizValor = array_shift($pre);
        $raiz = new Nodo($raizValor);

        $indice = array_search($raizValor, $in);

        $izqIn = array_slice($in, 0, $indice);
        $derIn = array_slice($in, $indice + 1);

        $izqPre = array_slice($pre, 0, count($izqIn));
        $derPre = array_slice($pre, count($izqIn));

        $raiz->izquierda = $this->construirArbolPreIn($izqPre, $izqIn);
        $raiz->derecha = $this->construirArbolPreIn($derPre, $derIn);

        return $raiz;
    }

    public function imprimirArbol($nodo, $nivel = 0) {
        if ($nodo !== null) {
            $this->imprimirArbol($nodo->derecha, $nivel + 1);
            echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $nivel);
            echo "<div class='nodo-arbol'>{$nodo->valor}</div><br>";
            $this->imprimirArbol($nodo->izquierda, $nivel + 1);
        }
    }
}