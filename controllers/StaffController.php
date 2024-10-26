<?php

require_once 'core/controller.php';

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
        $data = ['staff' => $this->staffModel->findId($id)];
        $this->view('admin/staff/detail', $data);
    }


    public function create()
    {
        $this->view('admin/staff/create');
    }

    public function store()
    {
        $this->staffModel->create($_POST);
        header('Location: /admin/staff/index');

    }

    public function update($id)
    {
        $data = ['staff' => $this->staffModel->findId($id)];
        $this->view('admin/staff/update', $data);
    }

    public function edit($id)
    {
        $data = ['staffs' => $this->staffModel->update($id, $_POST)];
        $this->view('admin/staff/update', $data);
    }

}
