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
    public function index(): void
    {
        try {

            $data = ['testimonials' => $this->testimonialModel->findAll()];
            $this->view('admin/testimonial/index', $data);
        } catch (Exception $e) {
            if ($e instanceof PDOException) {
                $this->redirect('/admin/testimonial', ['message' => $e->getMessage()]);
            }
        }

    }

    public function detail($id): void
    {
        try {
            $data = ['testimonial' => $this->testimonialModel->findId($id)];
            $this->view('admin/testimonial/detail', $data);
        } catch (Exception $e) {
            if ($e instanceof PDOException) {
                $this->redirect('/admin/testimonial', ['message' => $e->getMessage()]);
            }
        }
    }


    public function create(): void
    {
        $this->view('admin/testimonial/create');
    }

    public function store(): void
    {
        try {
            /** @var TestimonialBase $data */
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
//            print_r($e->getMessage());
            if ($e instanceof PDOException) {
                $this->redirect('/admin/testimonial', ['message' => $e->getMessage()]);
            }
            $this->redirect('/admin/testimonial', ['message' => 'Error creating testimonial']);
        }

    }

    public function update(int $id): void
    {
        try {
            $data = ['testimonial' => $this->testimonialModel->findId($id)];
            $this->view('admin/testimonial/update', $data);
        } catch (Exception $e) {
            if ($e instanceof PDOException) {
                $this->redirect("/admin/testimonial/$id", ['message' => $e->getMessage()]);
            }
        }
    }

    public function edit($id): void
    {
        try {
            /** @var TestimonialBase $data */
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
