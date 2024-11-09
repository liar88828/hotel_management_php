<?php


class StaffController extends Controller
{
    private StaffModel $staffModel;
    private ImageService $imageService;

    public function __construct()
    {
        $this->staffModel = $this->model(StaffModel::class);
        $this->imageService = $this->service(ImageService::class);
    }

    //  admin //
    public function index(): void
    {
        $this->layout('admin');
        try {
            $this->view('admin/staff/index', ['staffs' => $this->staffModel->findAll()]);
        } catch (Exception $e) {
            $this->view(
                'admin/staff/index', ['staffs' => [],
                'message' => $e->getMessage()]);
        }
    }

    public function search(): void
    {
        $this->layout('admin');
        try {

            $this->view('admin/staff/index', ['staffs' => $this->staffModel->findAllSearch($_POST['search'])]);
        } catch (Exception $e) {
            $this->view(
                'admin/staff/index', ['staffs' => [],
                'message' => $e->getMessage()]);

        }

    }


    public function detail($id)
    {
        try {
            $data = ['staff' => $this->staffModel->findId($id)];
            $this->layout('admin');
            $this->view('admin/staff/detail', $data);
        } catch (Exception $e) {
            $this->redirect('/admin/staff', ['message' => $e->getMessage()]);
        }
    }


    public function create()
    {
        try {

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $this->layout('admin');
                $this->view('admin/staff/create');
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->store();
            }
        } catch (Exception $e) {
            $this->redirect('/admin/staff', ['message' => $e->getMessage()]);
        }
    }

    public function store()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /** @var StaffBase $data */
            $data = [
                'name' => trim($_POST['name']),
                'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
                'phone' => trim($_POST['phone']),
                'image' => $_FILES['image']['name'], // Handle file upload separately
                'address' => trim($_POST['address']),
                'pin_code' => trim($_POST['pin_code']),
                'date_of_birth' => trim($_POST['date_of_birth']),
                'position' => trim($_POST['position']),
            ];
            $response = $this->staffModel->createMember($data);
            $this->imageService->saveImage($response, $data['image']);
            $this->redirect('/admin/staff');

        }
    }

    public function update($id): void
    {
        try {

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $data = ['staff' => $this->staffModel->findId($id)];
                $this->view('admin/staff/update', $data);
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->edit($id);
            }
        } catch (Exception $e) {
            $this->redirect('/admin/staff', ['message' => $e->getMessage()]);
        }
    }

    public function edit($id): void
    {
        try {
            /** @var StaffBase $data
             * @var StaffBase $dataDB
             * */
            $data = [
                'name' => trim($_POST['name']),
                'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
                'phone' => trim($_POST['phone']),
                'image' => $_FILES['image']['name'], // Handle file upload separately
                'address' => trim($_POST['address']),
                'pin_code' => trim($_POST['pin_code']),
                'date_of_birth' => trim($_POST['date_of_birth']),
                'position' => trim($_POST['position']),
            ];

            $dataDB = $this->staffModel->findId($id);
            $response = $this->staffModel->update($id, $data);
            $this->imageService->saveImage($response, $data['image']);
            $this->imageService->deleteImage($dataDB->image);
            $this->redirect("/admin/staff", ['message' => 'Success Edit Data Staff']);
        } catch (Exception $e) {
            $this->redirect('/admin/staff', ['message' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            $dataDB = $this->staffModel->findId($id);
            $this->staffModel->delete($id);
            $this->imageService->deleteImage($dataDB->image);
            $this->redirect('/admin/staff', ['message' => 'success Delete']);
        } catch (Exception $e) {
            $this->redirect('/admin/staff', ['message' => $e->getMessage()]);
        }
    }
}
