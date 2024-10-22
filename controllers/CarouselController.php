<?php

require_once 'core/controller.php';
require_once 'models/CarouselModel.php';
require_once 'services/ImageService.php';

class CarouselController extends Controller
{
    private CarouselModel $carouselModel;
    private ImageService $imageService;

    public function __construct()
    {
        $this->carouselModel = $this->model('CarouselModel');
        $this->imageService = $this->service('ImageService');
    }

    //  admin //
    public function index()
    {
        $data = ['carousels' => $this->carouselModel->findAll()];
        $this->view('admin/carousel/index', $data);

    }

    public function detail($id)
    {
        $data = ['carousel' => $this->carouselModel->findId($id)];
        $this->view('admin/carousel/detail', $data);
    }


    public function create()
    {
        $this->view('admin/carousel/create');
    }

    public function store()
    {
        try {
            $data = [
                'name' => trim($_POST['name']),
                'image' => $_FILES['image']['name'], // Handle file upload separately
            ];

            $responseDB = $this->carouselModel->create($data);
            $this->imageService->saveImage($responseDB, $data['image'],"images/carousel/");
            $this->redirect('/admin/carousel');

        } catch (Exception $e) {
            print_r($e->getMessage());
            $this->redirect('/admin/carousel');
        }

    }

    public function update($id)
    {
        $data = ['carousel' => $this->carouselModel->findId($id)];
        $this->view('admin/carousel/update', $data);
    }

    public function edit($id)
    {
        try {
            $data = [
                'name' => trim($_POST['name']),
                'image' => $_FILES['image']['name'], // Handle file upload separately
            ];
            $responseDB = $this->carouselModel->update($id, $data);
            $this->imageService->saveImage($responseDB, $data['image'],"images/carousel/");
            $this->redirect('/admin/carousel');
        } catch (Exception $e) {
            print_r($e->getMessage());
            $this->redirect('/admin/carousel');
        }
    }

}
