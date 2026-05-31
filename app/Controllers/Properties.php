<?php

namespace App\Controllers;

use App\Models\PropertyModel;

class Properties extends BaseController
{
    public function index()
    {
        $model = new PropertyModel();
        $search = $this->request->getGet('search');

        $query = $model;
        if ($search) {
            $query = $query->like('title', $search)
                           ->orLike('description', $search);
        }

        $data = [
            'properties' => $query->paginate(5),
            'pager'      => $model->pager,
            'search'     => $search
        ];

        return view('properties/index', $data);
    }

    public function show($id)
    {
        $model = new PropertyModel();
        $data['property'] = $model->find($id);

        if (!$data['property']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('properties/show', $data);
    }

    public function create()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('signin'));
        }
        return view('properties/create');
    }

    public function store()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('signin'));
        }

        // Form Validation
        $rules = [
            'title'          => 'required|min_length[3]',
            'price'          => 'required|numeric',
            'property_image' => 'uploaded[property_image]|is_image[property_image]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new PropertyModel();
        $imageName = null;

        $file = $this->request->getFile('property_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/', $imageName);
        }

        $model->save([
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'image'       => $imageName
        ]);

        return redirect()->to(base_url('properties'))->with('success', 'Property added successfully!');
    }

    public function edit($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('signin'));
        }

        $model = new PropertyModel();
        $data['property'] = $model->find($id);
        return view('properties/edit', $data);
    }

    public function update($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('signin'));
        }

        $model = new PropertyModel();
        $oldProperty = $model->find($id);
        $imageName = $oldProperty['image'];

        $file = $this->request->getFile('property_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/', $imageName);
        }

        $model->update($id, [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'image'       => $imageName
        ]);

        return redirect()->to(base_url('properties'));
    }

    public function delete($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('signin'));
        }

        $model = new PropertyModel();
        $model->delete($id);
        return redirect()->to(base_url('properties'));
    }
    public function sendInquiry($id)
{
    $email = \Config\Services::email();
    $model = new \App\Models\PropertyModel();
    $property = $model->find($id);

    // Get data from the form
    $name    = $this->request->getPost('name');
    $message = $this->request->getPost('message');

    $email->setTo('valemacadagdag@gmail.com'); 
    $email->setFrom('valemacadagdag@gmail.com', 'PropTrack Inquiry');
    $email->setSubject('New Inquiry: ' . $property['title']);
    $email->setMessage("
        <h3>New Inquiry Received</h3>
        <p><strong>Property:</strong> {$property['title']}</p>
        <p><strong>From:</strong> {$name}</p>
        <p><strong>Message:</strong> {$message}</p>
    ");

    if ($email->send()) {
        return redirect()->back()->with('success', 'Inquiry sent successfully!');
    } else {
        return redirect()->back()->with('error', 'Failed to send inquiry.');
    }
}
}
