<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $data = [
            'title' => 'User Accounts',
            'users' => $userModel->findAll(),
        ];

        return view('users/index', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Add New User',
        ];

        return view('users/new', $data);
    }

    public function create()
    {
        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
                'errors' => [
                    'is_unique' => 'That username is already being used.',
                ],
            ],
            'full_name' => [
                'label' => 'Full Name',
                'rules' => 'required|min_length[2]|max_length[100]',
            ],
            'role' => [
                'label' => 'Role',
                'rules' => 'required|max_length[30]',
            ],
        ];

        $avatar = $this->request->getFile('avatar');

        // Validate the avatar only when a file was selected.
        if ($avatar !== null && $avatar->getError() !== \UPLOAD_ERR_NO_FILE) {
            $rules['avatar'] = $this->getAvatarRules();
        }

        if (! $this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userData = [
            'username'  => trim($this->request->getPost('username')),
            'full_name' => trim($this->request->getPost('full_name')),
            'role'      => $this->request->getPost('role'),
        ];

        $avatarName = $this->saveAvatar($avatar);

        if ($avatarName !== null) {
            $userData['avatar'] = $avatarName;
        }

        $userModel = new UserModel();
        $userModel->insert($userData);

        return redirect()
            ->to(site_url('users'))
            ->with('success', 'User added successfully.');
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (! $user) {
            throw PageNotFoundException::forPageNotFound(
                'User not found.'
            );
        }

        $data = [
            'title' => 'Edit User',
            'user'  => $user,
        ];

        return view('users/edit', $data);
    }

    public function update($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (! $user) {
            throw PageNotFoundException::forPageNotFound(
                'User not found.'
            );
        }

        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required|min_length[3]|max_length[50]'
                    . '|is_unique[users.username,id,' . $id . ']',
                'errors' => [
                    'is_unique' => 'That username is already being used.',
                ],
            ],
            'full_name' => [
                'label' => 'Full Name',
                'rules' => 'required|min_length[2]|max_length[100]',
            ],
            'role' => [
                'label' => 'Role',
                'rules' => 'required|max_length[30]',
            ],
        ];

        $avatar = $this->request->getFile('avatar');

        // Validate the avatar only when a new file was selected.
        if ($avatar !== null && $avatar->getError() !== \UPLOAD_ERR_NO_FILE) {
            $rules['avatar'] = $this->getAvatarRules();
        }

        if (! $this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $updateData = [
            'username'  => trim($this->request->getPost('username')),
            'full_name' => trim($this->request->getPost('full_name')),
            'role'      => $this->request->getPost('role'),
        ];

        $avatarName = $this->saveAvatar($avatar);

        if ($avatarName !== null) {
            $updateData['avatar'] = $avatarName;
        }

        $userModel->update($id, $updateData);

        return redirect()
            ->to(site_url('users'))
            ->with('success', 'User updated successfully.');
    }

    private function getAvatarRules(): array
    {
        return [
            'label' => 'Profile Picture',
            'rules' => [
                'is_image[avatar]',
                'mime_in[avatar,image/jpg,image/jpeg,image/png]',
                'max_size[avatar,2048]',
            ],
            'errors' => [
                'is_image' => 'The profile picture must be an image.',
                'mime_in'   => 'Only JPG and PNG images are allowed.',
                'max_size'  => 'The profile picture must not exceed 2 MB.',
            ],
        ];
    }

    private function saveAvatar($avatar): ?string
    {
        if (
            $avatar === null
            || ! $avatar->isValid()
            || $avatar->hasMoved()
        ) {
            return null;
        }

        $uploadPath = FCPATH . 'uploads/avatars/';

        if (! is_dir($uploadPath)) {
            mkdir($uploadPath, 0775, true);
        }

        $newName = $avatar->getRandomName();
        $avatar->move($uploadPath, $newName);

        service('image')
            ->withFile($uploadPath . $newName)
            ->fit(300, 300, 'center')
            ->save($uploadPath . $newName, 85);

        return $newName;
    }
}