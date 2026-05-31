<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');

$routes->get('about', function() { return view('about'); });
$routes->get('contact', 'Contact::index');
$routes->post('contact/submit', 'Contact::submit');

$routes->get('properties', 'Properties::index');
$routes->get('catalog', 'Properties::index'); 
$routes->get('property/(:num)', 'Properties::show/$1');
$routes->get('properties/show/(:num)', 'Properties::show/$1');

$routes->post('properties/sendInquiry/(:num)', 'Properties::sendInquiry/$1');

$routes->get('properties/create', 'Properties::create');
$routes->post('properties/store', 'Properties::store');
$routes->get('properties/edit/(:num)', 'Properties::edit/$1');
$routes->post('properties/update/(:num)', 'Properties::update/$1');
$routes->post('properties/delete/(:num)', 'Properties::delete/$1');

$routes->match(['get', 'post'], 'add-property', 'Admin::addProperty');
$routes->get('admin', 'Admin::dashboard');

$routes->get('signin', function() { return view('auth/login'); });
$routes->get('signup', function() { return view('auth/register'); });
$routes->post('signup', function() { return redirect()->to(base_url('signin')); });

$routes->post('signin', function() {
    $session = session();
    $emailInput = request()->getPost('email');
    
    if ($emailInput === 'admin@gmail.com') {
        $session->set(['isLoggedIn' => true, 'username' => 'Admin Account', 'role' => 'admin']);
        return redirect()->to(base_url('admin')); 
    } else {
        $session->set(['isLoggedIn' => true, 'username' => $emailInput ? $emailInput : 'Regular Client', 'role' => 'user']);
        return redirect()->to(base_url('properties')); 
    }
});
$routes->get('logout', function() {
    session()->destroy();
    return redirect()->to(base_url('/'));
});