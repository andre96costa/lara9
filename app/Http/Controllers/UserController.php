<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserFormRequest;
use App\Http\Requests\UpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('users.index', compact('users'));
    }

    public function show(int $id)
    {
        //$user = User::where('id', '=', $id)->first();
        if (!$user = User::find($id)) {
            return redirect()->route('users.index');
        }

        return view('users.show', compact('user'));
    }

    /**
     * Call the view to create a new user.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Cadastra novo usuario
     */
    public function store(StoreUserFormRequest $request)
    {
        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        // $user->save();

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('users.index');
    }

    /**
     * Chama a rota que ira realizar a edição
     */
    public function edit(int $id)
    {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index');
        }

        return view('users.edit', compact('user'));
    }

    public function update(int $id, UpdateUserFormRequest $request)
    {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index');
        }

        $data = $request->only(['name', 'email']);
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);
        return redirect()->route('users.index');
    }
}
