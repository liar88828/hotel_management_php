<?php


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
            $this->layout('admin');
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $data = ['testimonials' => $this->testimonialModel->findAll()];
                $this->view('admin/testimonial/index', $data);
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = ['testimonials' => $this->testimonialModel->search(trim($_POST['search']))];
                $this->view('admin/testimonial/index', $data);
            }
        } catch (Exception $e) {
            if ($e instanceof PDOException) {
                $this->view('admin/testimonial/index',
                    [
                        'testimonials' => [],
                        'message' => 'Database Sibuk'
                    ]
                );
            }
            $this->view('admin/testimonial/index',
                [
                    'testimonials' => [],
                    'message' => $e->getMessage()
                ]);
        }

    }

    public function detail($id): void
    {
        try {
            $data = ['testimonial' => $this->testimonialModel->findId($id)];
            $this->layout('admin');
            $this->view('admin/testimonial/detail', $data);
        } catch (Exception $e) {
            if ($e instanceof PDOException) {
                $this->redirect('/admin/testimonial', ['message' => $e->getMessage()]);
            }
        }
    }


    public function create(): void
    {
        try {

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $this->view('admin/testimonial/create');
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->store();
            }
        } catch (Exception $e) {
            if ($e instanceof PDOException) {
                $this->redirect('/admin/testimonial', ['message' => 'Database Sibuk']);
            }
            $this->redirect('/admin/testimonial', ['message' => $e->getMessage()]);

        }
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
            $this->imageService->saveImage($responseDB, $data['image'], 'images/testimonial/');
            $this->redirect('/admin/testimonial');
        } catch (Exception $e) {
            print_r($e->getMessage());
            if ($e instanceof PDOException) {
                $this->redirect('/admin/testimonial', ['message' => $e->getMessage()]);
            }
            $this->redirect('/admin/testimonial', ['message' => 'Error creating testimonial']);
        }

    }

    public function update(int $id): void
    {
        try {
            $this->layout('admin');
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $data = ['testimonial' => $this->testimonialModel->findId($id)];
                $this->view('admin/testimonial/update', $data);
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->edit($id);
            }
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
            $dataDB = $this->testimonialModel->findId($id);
            $responseDB = $this->testimonialModel->update($id, $data);
            $this->imageService->saveImage($responseDB, $data['image'], 'images/testimonial/');
            $this->imageService->deleteImage($dataDB->image, "images/testimonial/");
            $this->redirect('/admin/testimonial');
        } catch (Exception $e) {
            if ($e instanceof PDOException) {
                $this->redirect('/admin/testimonial', ['message' => 'Database Sibuk']);
            }
            $this->redirect('/admin/testimonial', ['message' => $e->getMessage()]);
        }
    }

    public function delete($id): void
    {
        try {
            /** @var TestimonialBase $dataDB */
            $dataDB = $this->testimonialModel->findId($id);
            $this->testimonialModel->delete($id);
            $this->imageService->deleteImage($dataDB->image, "images/testimonial/");
            $this->redirect('/admin/testimonial');
        } catch (Exception $e) {
            print_r($e->getMessage());
//            if ($e instanceof PDOException) {
//                $this->redirect('/admin/testimonial', ['message' => 'Database Sibuk']);
//            }
//            $this->redirect('/admin/testimonial', ['message' => $e->getMessage()]);
        }
    }


}
