<?php
class GeraSenha{
    /**
    * Função para gerar senhas aleatórias
    *
    * @author    Thiago Belem <contato@thiagobelem.net>
    *
    * @param integer $tamanho Tamanho da senha a ser gerada
    * @param boolean $maiusculas Se terá letras maiúsculas
    * @param boolean $numeros Se terá números
    * @param boolean $simbolos Se terá símbolos
    *
    * @return string A senha gerada
        USANDO A FUNÇÃO
        // Gera uma senha com 10 carecteres: letras (min e mai), números
        $senha = geraSenha(10);
        // gfUgF3e5m7

        // Gera uma senha com 9 carecteres: letras (min e mai)
        $senha = geraSenha(9, true, false);
        // BJnCYupsN


        // Gera uma senha com 6 carecteres: letras minúsculas e números
        $senha = geraSenha(6, false, true);
        // sowz0g

        // Gera uma senha com 15 carecteres de números, letras e símbolos
        $senha = geraSenha(15, true, true, true);
        // fnwX@dGO7P0!iWM
    */
    function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
    {
        $lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '!@#$%*-';
        $retorno = '';
        $caracteres = '';
        $caracteres .= $lmin;
        if ($maiusculas) $caracteres .= $lmai;
        if ($numeros) $caracteres .= $num;
        if ($simbolos) $caracteres .= $simb;
        $len = strlen($caracteres);
        for ($n = 1; $n <= $tamanho; $n++) {
            $rand = mt_rand(1, $len);
            $retorno .= $caracteres[$rand-1];
        }
        return $retorno;
    }
}
