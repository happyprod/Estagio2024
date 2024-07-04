<?php

namespace App\Helpers;

class ValidationHelper
{
    public static function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function validateAbout($texto)
    {
        // Texto original com quebras de linha
        $texto_original = $texto;

        // Substituir \n por <br> e escapar caracteres especiais HTML
        $texto_formatado = nl2br(htmlspecialchars($texto_original));

        // Remover espaços em branco do início e do final da string
        $texto_sem_espacos = trim($texto_formatado);

        // Exibir o texto formatado
        if ($texto_sem_espacos != '') {
            return $texto_formatado;
        } else {
            echo 'Não especificado';
        }
    }

    public static function validateInputs($texto)
    {
        // Texto original com quebras de linha
        $texto_original = $texto;

        // Substituir \n por <br> e escapar caracteres especiais HTML
        $texto_formatado = nl2br(htmlspecialchars($texto_original));

        // Remover espaços em branco do início e do final da string
        $texto_sem_espacos = trim($texto_formatado);

        // Exibir o texto formatado
        if ($texto_sem_espacos != '') {
            return $texto_formatado;
        } else {
            return $texto_sem_espacos;
        }
    }

    function validateNumber($numero) {
        // Expressão regular para validar formato de telefone brasileiro de 9 dígitos
        $regexTelefone = '/^[2-9][0-9]{8}$/';
        
        // Verifica se o telefone corresponde ao formato esperado
        return preg_match($regexTelefone, $numero);
    }
}
