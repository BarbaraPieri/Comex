<?php
namespace Barbaraviana\Comex\classes;

use InvalidArgumentException;



class Estoque
{
    private $produtos = [];

    public function adicionarProduto($produto, $quantidade)
    {
        if (!isset($this->produtos[$produto])) {
            $this->produtos[$produto] = 0;
        }
        
        if ($quantidade > 0) {
            $this->produtos[$produto] += $quantidade;
        } else {
            throw new InvalidArgumentException("A quantidade deve ser um valor positivo.");
        }
    }

    public function removerProduto($produto, $quantidade)
    {
        if (isset($this->produtos[$produto])) {
            if ($quantidade > 0 && $this->produtos[$produto] >= $quantidade) {
                $this->produtos[$produto] -= $quantidade;
            } else {
                throw new InvalidArgumentException("Estoque insuficiente ou quantidade inválida para $produto.");
            }
        } else {
            throw new InvalidArgumentException("Produto não encontrado.");
        }
    }

    public function verificarDisponibilidade($produto)
    {
        if (isset($this->produtos[$produto])) {
            return $this->produtos[$produto];
        }
        return 0; // Produto não encontrado
    }
}
?>