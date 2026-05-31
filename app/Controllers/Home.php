<?php

namespace App\Controllers;

use App\Models\PropertyModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new PropertyModel();
        
        $data['featured'] = $model->orderBy('price', 'DESC')->findAll(3);
        
        return view('home/index', $data);
    }
}