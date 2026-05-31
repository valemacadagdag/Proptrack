<?php

namespace App\Controllers;

use App\Models\PropertyModel;

class Admin extends BaseController
{
    public function dashboard()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('signin'));
        }

        $model = new PropertyModel();
        
        $data = [
            'totalProperties' => $model->countAllResults(),
            'properties'      => $model->findAll()
        ];

        return view('admin/dashboard', $data);
    }

    public function addProperty()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to(base_url('signin'));
        }

        if ($this->request->getMethod() === 'POST') {
            $model = new PropertyModel();
            
            $imageName = null;
            $file = $this->request->getFile('property_image');
            
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $imageName = $file->getRandomName();
                $file->move(FCPATH . 'uploads/', $imageName);
            }

            $data = [
                'title'       => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'price'       => $this->request->getPost('price'),
                'image'       => $imageName
            ];

            $model->save($data);
            return redirect()->to(base_url('admin'));
        }

        return view('properties/create');
    }
}