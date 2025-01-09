<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public readonly User $user;
    public function __construct() {
        $this->user = new User();
    }
  
    public function index()
    {
        // $users = User::all();
        // return view('users', ['users' => $users]);

        $users = $this->user->all();
        return view('users', ['users' => $users]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'min:6'],
            ],
        );
        
        $created = $this->user->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        if ($created) {
            return redirect()->back()->with('message', 'Cadastrado com Sucesso', 200);
    
        }  return redirect()->back()->with('message', 'Senha deve ter mais 6 caracteres ou email invalido!', 400);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $user)
    {
        return view('user_show', ['user'=> $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user_edit', ['user'=> $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->user->where('id', $id)->update($request->except(['_token', '_method']));
        
        if ($updated) {
            return redirect()->back()->with('message', 'Atualizado com Sucesso', 200);
    
        }  return redirect()->back()->with('message', 'Erro de Atualização', 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso!');
    }
}
