<?php


class StaffController extends Controller
{
    private StaffModel $staffModel;

    public function __construct()
    {
        $this->staffModel = $this->model('StaffModel');
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
        $this->layout('admin');
        $this->view('admin/staff/create');
    }

    public function store()
    {
        $this->staffModel->create($_POST);
        header('Location: /admin/staff/index');

    }

    public function update($id)
    {
        try {

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $data = ['staff' => $this->staffModel->findId($id)];
                $this->layout('admin');
                $this->view('admin/staff/update', $data);
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->edit($id);
            }
        } catch (Exception $e) {

            $this->redirect('admin/staff', ['message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $data = ['staffs' => $this->staffModel->update($id, $_POST)];
        $this->layout('admin');
        $this->view('admin/staff/update', $data);
    }

    public function delete($id)
    {
        try {
            $this->staffModel->delete($id);
            $this->redirect('admin/staff', ['message' => 'success Delete']);
        } catch (Exception $e) {
            $this->redirect('admin/staff', ['message' => $e->getMessage()]);
        }
    }


}
