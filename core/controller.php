<?php


class Controller
{
    protected function view($view, $data = [])
    {
        extract($data);
        require_once "views/$view.php";
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

//    protected function viewError($view, $data = [])
//    {
//
//
//    }
}

