<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index()
    {
        $customerModel = new CustomerModel();

        $data = [
            'title'     => 'Customer Accounts',
            'customers' => $customerModel->findAll(),
        ];

        return view('customers/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Add New Customer',
        ];

        return view('customers/new', $data);
    }

    public function create()
    {
        $rules = [
            'full_name' => [
                'label' => 'Full Name',
                'rules' => 'required|min_length[2]|max_length[100]',
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|max_length[100]',
            ],
            'phone' => [
                'label' => 'Phone',
                'rules' => 'permit_empty|max_length[20]',
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $customerModel = new CustomerModel();

        $customerModel->insert([
            'full_name'  => $this->request->getPost('full_name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()
            ->to('/customers')
            ->with('success', 'Customer added successfully.');
    }

    public function edit($id)
{
    $customerModel = new CustomerModel();
    $customer = $customerModel->find($id);

    if (! $customer) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            'Customer not found.'
        );
    }

    $data = [
        'title'    => 'Edit Customer',
        'customer' => $customer,
    ];

    return view('customers/edit', $data);
}

public function update($id)
{
    $customerModel = new CustomerModel();
    $customer = $customerModel->find($id);

    if (! $customer) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            'Customer not found.'
        );
    }

    $rules = [
        'full_name' => [
            'label' => 'Full Name',
            'rules' => 'required|min_length[2]|max_length[100]',
        ],
        'email' => [
            'label' => 'Email',
            'rules' => 'required|valid_email|max_length[100]',
        ],
        'phone' => [
            'label' => 'Phone',
            'rules' => 'permit_empty|max_length[20]',
        ],
    ];

    if (! $this->validate($rules)) {
        return redirect()
            ->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }

    $customerModel->update($id, [
        'full_name' => $this->request->getPost('full_name'),
        'email'     => $this->request->getPost('email'),
        'phone'     => $this->request->getPost('phone'),
    ]);

    return redirect()
        ->to('/customers')
        ->with('success', 'Customer updated successfully.');
  }
}