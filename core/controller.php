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

    protected function model(string $modelClass)
    {
        $modelPath = "models/" . basename(str_replace("\\", "/", $modelClass)) . ".php";
        if (file_exists($modelPath)) {
            require_once $modelPath;
            return new $modelClass();
        }
        throw new Exception("Model $modelClass not found.");
    }

    protected function service(string $serviceClass)
    {
        $servicePath = "services/" . basename(str_replace("\\", "/", $serviceClass)) . ".php";
        if (file_exists($servicePath)) {
            require_once $servicePath;
            return new $serviceClass();
        }
        throw new Exception("Service $serviceClass not found.");
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