<?php 
/**
 * @method dd(...$vars) - Função de depuração personalizada para exibir variáveis de forma legível e interromper a execução do script.
 * Exibe as variáveis passadas como argumentos, formatadas para melhor leitura, e inclui informações sobre a origem da chamada (arquivo e linha). Após exibir as informações, a função termina a execução do script.
 * 
 * @param mixed ...$vars - Variáveis a serem depuradas. Pode receber um número indefinido de argumentos.
 */
function dd(...$vars) {
    echo '<pre style="background: #333; color: #fff; padding: 50px; borrder-radius: 5px; font-size: 16px;">';
    echo '<strong>Debug Output:</strong><br><br>';

    foreach ($vars as $var) {
        echo '<pre style="background: #6a6a6a; color: #fff; padding: 10px; borrder-radius: 5px;">';
        var_dump($var);
        echo '</pre><br>';
    }

    /**
     * Adicionando o backtrace para mostrar a origem da chamada do dd
     * Fila de funções executadas pelo PHP.
     */
    $backtrace = debug_backtrace()[0];

    echo '<strong>Called from:</strong><br>';
    echo '<b>File:</b> ' . $backtrace['file'] . '<br>';
    echo '<b>Line:</b> ' . $backtrace['line'] . '<br>';

    echo '</pre>';
    die();
}


