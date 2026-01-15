<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function index()
    {
        $users = (new User)->all();
        return view('users.index', compact('users'));
    }

    public function store()
    {
        $user = new User();
        $user->create([
            'name' => $_POST['name'],
            'email' => $_POST['email']
        ]);
        header("Location: /users");
    }
}
