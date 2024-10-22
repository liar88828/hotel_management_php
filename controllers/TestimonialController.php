<?php

require_once 'core/controller.php';
require_once 'models/TestimonialModel.php';
require_once 'services/ImageService.php';

class TestimonialController extends Controller
{
    private TestimonialModel $testimonialModel;
    private ImageService $imageService;

    public function __construct()
    {
        $this->testimonialModel = $this->model('TestimonialModel');
        $this->imageService = $this->service('ImageService');
    }

    //  admin //
    public function index()
    {
        $data = ['testimonials' => $this->testimonialModel->findAll()];
        $this->view('admin/testimonial/index', $data);

    }

    public function detail($id)
    {
        $data = ['testimonial' => $this->testimonialModel->findId($id)];
        $this->view('admin/testimonial/detail', $data);
    }


    public function create()
    {
        $this->view('admin/testimonial/create');
    }

    public function store()
    {
        try {
            $data = [
                'name' => trim($_POST['name']),
                'image' => $_FILES['image']['name'], // Handle file upload separately
                'text' => trim($_POST['text']),
                'rating' => trim($_POST['rating']),
            ];

            $responseDB = $this->testimonialModel->create($data);
            $this->imageService->saveImage($responseDB, $data['image']);
            $this->redirect('/admin/testimonial');

        } catch (Exception $e) {
            print_r($e->getMessage());
            $this->redirect('/admin/testimonial');
        }

    }

    public function update($id)
    {
        $data = ['testimonial' => $this->testimonialModel->findId($id)];
        $this->view('admin/testimonial/update', $data);
    }

    public function edit($id)
    {
        try {
            $data = [
                'name' => trim($_POST['name']),
                'image' => $_FILES['image']['name'], // Handle file upload separately
                'text' => trim($_POST['text']),
                'rating' => trim($_POST['rating']),
            ];
            $responseDB = $this->testimonialModel->update($id, $data);
            $this->imageService->saveImage($responseDB, $data['image']);
            $this->redirect('/admin/testimonial');
        } catch (Exception $e) {
            print_r($e->getMessage());
            $this->redirect('/admin/testimonial');
        }
    }

}
