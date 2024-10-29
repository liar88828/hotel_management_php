<?php



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
    public function index(): void
    {
        try {

            $this->layout('admin');
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $data = ['carousels' => $this->carouselModel->findAll()];
                $this->view('admin/carousel/index', $data);
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = ['carousels' => $this->carouselModel->search(trim($_POST['search']))];
                $this->view('admin/carousel/index', $data);
            }
        } catch (Exception $e) {
            if ($e instanceof PDOException) {
                print_r($e->getMessage());
                $this->redirect('/admin/carousel/index', ['message' => "Database sibuk"]);
            }
            $this->redirect('/admin/carousel/index', ['message' => $e->getMessage()]);
        }

    }

    public function detail($id): void
    {
        try {
            $this->layout('admin');
            $data = ['carousel' => $this->carouselModel->findId($id)];
            $this->view('admin/carousel/detail', $data);
        } catch (Exception $e) {
            print_r($e->getMessage());
            if ($e instanceof PDOException) {
                $this->redirect('/admin/carousel', ['message' => "Database sibuk"]);

            }
            $this->redirect('/admin/carousel', ['message' => $e->getMessage()]);
        }
    }


    public function create(): void
    {
        try {
            $this->layout('admin');
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $this->view('admin/carousel/create');
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->store();
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
            if ($e instanceof PDOException) {
                $this->redirect('/admin/carousel/create', ['message' => "Database sibuk"]);
            }
            $this->redirect('/admin/carousel/create', ['message' => $e->getMessage()]);
        }
    }

    public function store(): void
    {
        try {
            /** @var CarouselBase $data */
            $data = [
                'name' => trim($_POST['name']),
                'image' => $_FILES['image']['name'], // Handle file upload separately
            ];
            $responseDB = $this->carouselModel->create($data);
            $this->imageService->saveImage($responseDB, $data['image'], "images/carousel/");
            $this->redirect('/admin/carousel');

        } catch (Exception $e) {
            print_r($e->getMessage());
            if ($e instanceof PDOException) {
                $this->redirect('/admin/carousel', ['message' => "Database sibuk"]);
            }
            $this->redirect('/admin/carousel', ['message' => $e->getMessage()]);
        }

    }

    public function update($id): void
    {
        try {
            $this->layout('admin');
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $data = ['carousel' => $this->carouselModel->findId($id)];
                $this->view('admin/carousel/update', $data);
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->edit($id);
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
            if ($e instanceof PDOException) {
                $this->redirect('/admin/carousel', ['message' => "Database sibuk"]);
            }
            $this->redirect('/admin/carousel', ['message' => $e->getMessage()]);
        }
    }

    public function edit($id): void
    {
        try {
            /** @var CarouselBase $data
             * @var CarouselBase $dataDB
             */
            $data = [
                'name' => trim($_POST['name']),
                'image' => $_FILES['image']['name'], // Handle file upload separately
            ];
            $dataDB = $this->carouselModel->findId($id);
            $responseDB = $this->carouselModel->update($id, $data);
            $this->imageService->deleteImage("images/carousel/{$dataDB->image}");
            $this->imageService->saveImage($responseDB, $data['image'], "images/carousel/");
            $this->redirect('/admin/carousel');
        } catch (Exception $e) {
            print_r($e->getMessage());
            if ($e instanceof PDOException) {
                $this->redirect('/admin/carousel', ['message' => "Database sibuk"]);
            }
            $this->redirect('/admin/carousel', ['message' => $e->getMessage()]);
        }
    }


    public function delete($id): void
    {
        try {
            $dataDB = $this->carouselModel->findId($id);
            $this->carouselModel->delete($id);
            $this->imageService->deleteImage("images/carousel/{$dataDB->image}");
            $this->redirect('/admin/carousel');
        } catch (Exception $e) {
            print_r($e->getMessage());
            if ($e instanceof PDOException) {
                $this->redirect('/admin/carousel', ['message' => "Database sibuk"]);
            }
            $this->redirect('/admin/carousel', ['message' => $e->getMessage()]);
        }
    }

}
