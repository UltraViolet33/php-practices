<?php

namespace App\Core;

class Render
{

    private string $viewPath;
    private ?array $args;

    /**
     * __construct
     *
     * @param  string $viewPath
     * @param  ?array $args
     * @return void
     */
    public function __construct(string $viewPath, ?array $args = [])
    {
        $this->viewPath = $viewPath;
        $this->args = $args;
    }


    /**
     * view
     *
     * @return string
     */
    public function view(): string
    {
        ob_start();
        extract($this->args);
        require BASE_VIEW_PATH . $this->viewPath . '.php';
        return ob_get_clean();
    }


    /**
     * make
     *
     * @param  string $viewPath
     * @param  ?array $args
     * @return static
     */
    public static function make(string $viewPath, ?array $args = []): static
    {
        return new static($viewPath, $args);
    }


    /**
     * __toString
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->view();
    }
}
