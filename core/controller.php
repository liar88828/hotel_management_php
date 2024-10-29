<?php


class Controller
{
    protected $layout = 'main';

    protected function view($view, $data = [])
    {
        // Start output buffering
        ob_start();

        // Extract data for the view
        extract($data);

        // Include the actual view file
        require_once "views/pages/$view.php";

        // Get the content
        $content = ob_get_clean();

        // If layout is set to false, return content directly
        if ($this->layout === false) {
            echo $content;
            return;
        }

        // Load the layout with the content
        extract(['content' => $content] + $data);
        require_once "views/layouts/{$this->layout}.php";
    }

    protected function model($model)
    {
        require_once "models/$model.php";
        return new $model();
    }

    protected function service($service)
    {
        require_once "services/$service.php";
        return new $service();
    }

    protected function redirect(string $location, array $data = []): void
    {
        if (!empty($data)) {
            $_SESSION['redirect_data'] = $data;
        }
        header("Location: $location");
    }

    // New method to disable layout for specific actions
    protected function disableLayout()
    {
        $this->layout = false;
    }

    // New method to change layout
    protected function layout($layout)
    {
        $this->layout = $layout;
    }
}