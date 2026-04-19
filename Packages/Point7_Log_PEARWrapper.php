<?php
/**
 * Logging shim wrapping Monolog behind the PEAR-style Point7 logger interface.
 * Usage: $logger->log($msg) / $logger->error($msg) / $logger->debug($msg)
 */
class Point7_Log_PEARWrapper
{
    private $file   = '';
    private $format = '%{timestamp} - %{message}';
    private $monolog = null;
    public function configure(string $name, string $value)
    {
        if ($name === 'file')   $this->file   = $value;
        if ($name === 'format') $this->format = $value;
    }

    private function getLogger(): \Monolog\Logger
    {
        if ($this->monolog !== null) {
            return $this->monolog;
        }

        $path = $this->resolveFile();
        $dir  = dirname($path);
        if ($dir && !is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }

        $this->monolog = new \Monolog\Logger('app');
        $handler = new \Monolog\Handler\StreamHandler($path, \Monolog\Level::Debug);
        $handler->setFormatter(new \Monolog\Formatter\LineFormatter("[%datetime%] %message%\n", 'Y-m-d H:i:s'));
        $this->monolog->pushHandler($handler);

        return $this->monolog;
    }

    private function resolveFile(): string
    {
        $file = $this->file;
        $file = str_replace('%{year}',  date('Y'), $file);
        $file = str_replace('%{month}', date('m'),  $file);
        $file = str_replace('{#LOG_PATH#}', defined('LOG_PATH') ? LOG_PATH : sys_get_temp_dir(), $file);
        return $file ?: sys_get_temp_dir() . '/point7.log';
    }

    public function log(string $message, int $level = 200)
    {
        $this->getLogger()->log(\Monolog\Level::from($level), $message);
    }

    public function error(string $message)
    {
        $this->getLogger()->error($message);
    }

    public function info(string $message)
    {
        $this->getLogger()->info($message);
    }

    public function debug(string $message)
    {
        $this->getLogger()->debug($message);
    }

    public function warn(string $message)
    {
        $this->getLogger()->warning($message);
    }
}
