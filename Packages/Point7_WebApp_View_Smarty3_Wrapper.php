<?php
/**
 * Thin wrapper around Smarty used directly by module code for inline rendering
 * (primarily for PDF generation).  The main view rendering is handled by
 * Point7_WebApp's dispatcher using the result_map XML.
 */
class Point7_WebApp_View_Smarty3_Wrapper
{
    public string $template_dir = '';
    public string $compile_dir  = '';

    private ?Smarty $smarty = null;

    private function getSmarty(): Smarty
    {
        if ($this->smarty === null) {
            $this->smarty = new Smarty();
            if ($this->template_dir) $this->smarty->setTemplateDir($this->template_dir);
            if ($this->compile_dir) {
                if (!is_dir($this->compile_dir)) @mkdir($this->compile_dir, 0775, true);
                $this->smarty->setCompileDir($this->compile_dir);
            }
        }
        return $this->smarty;
    }

    public function assign(string $var, mixed $value): void
    {
        $this->getSmarty()->assign($var, $value);
    }

    public function render(string $template): string
    {
        return $this->getSmarty()->fetch($template);
    }

    public function display(string $template): void
    {
        $this->getSmarty()->display($template);
    }
}
