<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserFormRequest;
use App\Http\Requests\UpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        //$users = User::where('name', 'LIKE', "%{$request->name}%")->get();
        $search = $request->search;
        $users = User::where(function ($query) use ($search) {
            if ($search) {
                $query->where('email', $search);
                $query->orWhere('name', 'LIKE', "%{$search}%");
            }
        })->get();

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

    public function destroy(int $id)
    {
        if (!$user = User::find($id)) {
            return redirect()->route('users.index');
        }

        $user->delete();
        return redirect()->route('users.index');
    }
}
