<?php

namespace Gini\View;

class PHTML implements Engine
{
    private $_path;
    private $_vars;

    public function __construct($path, array $vars)
    {
        $this->_path = $path;
        $this->_vars = $vars;
    }

    public function __toString()
    {
        if ($this->_path) {
            ob_start();

            extract($this->_vars);
            include($this->_path);

            $output = ob_get_contents();
            ob_end_clean();
        }

        return $output;
    }

}
