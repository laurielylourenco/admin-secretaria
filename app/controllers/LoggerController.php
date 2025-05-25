<?php

class LoggerController
{
    private string $logPasta;

    public function __construct(string $logPasta = __DIR__ . '/../storage/logs')
    {
        $this->logPasta = $logPasta;
        if (!is_dir($this->logPasta)) {
            mkdir($this->logPasta, 0777, true);
        }
    }

    public function logError(string $mensagem, string $arquivo = '', int $linha = 0): void
    {
        $date = date('Y-m-d H:i:s');
        $logFile = $this->logPasta . '/error_' . date('Y-m-d') . '.log';

        $logMessage = "[$date] ERROR: $mensagem";
        if ($arquivo) {
            $logMessage .= " na $arquivo";
        }
        if ($linha) {
            $logMessage .= " on line $linha";
        }
        $logMessage .= PHP_EOL;

        file_put_contents($logFile, $logMessage, FILE_APPEND);
    }
}
