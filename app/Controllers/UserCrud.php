<?php
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;
class UserCrud extends Controller
{
    // show users list
    public function index(){
        $userModel = new UserModel();
        $data['users'] = $userModel->orderBy('id', 'DESC')->paginate(10);
        $data['pager'] = $userModel->pager; // Ensure the pager instance is set
        return view('user_view', $data);
    }
    // add user form
    public function create(){
        return view('add_user');
    }

    public function search()
    {
        // Retrieve search parameters from the GET request
        $name = $this->request->getGet('name');
        $email = $this->request->getGet('email');

        // Initialize pagination
        $model = new UserModel(); // Replace YourModel with the actual model name

        $data['results'] = $model->search($name, $email)->paginate(10); // Adjust the per-page limit as needed
        $data['pager'] = $model->pager; // Ensure the pager instance is set


        // Load the view with search results and pagination data
        return view('search_result', $data);
    }

    // insert data
    public function store() {
        $userModel = new UserModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $userModel->insert($data);
        return $this->response->redirect(site_url('/users-list'));
    }
    // show single user
    public function singleUser($id = null){
        $userModel = new UserModel();
        $data['user_obj'] = $userModel->where('id', $id)->first();
        return view('edit_user', $data);
    }
    // update user data
    public function update(){
        $userModel = new UserModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('/users-list'));
    }

    // delete user
    public function delete($id = null){
        $userModel = new UserModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/users-list'));
    }
}