<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UsuariosController extends Controller
{
    public function index() {

        $usuarios = Usuario::get();
        return view('usuarios.list', ['usuarios' => $usuarios]);
    }

    public function create() {
        return view('usuarios.form');
    }

    public function add(Request $request) {
        $usuario = new Usuario;
        $usuario->create($request->all());
        return Redirect::to('/usuarios');
    }

    public function edit($id) {
        $usuario = Usuario::findorfail($id);
        return view('usuarios.form', ['usuario' => $usuario]);
    }

    public function update($id, Request $request) {
        $usuario = Usuario::findorfail($id);
        $usuario->update($request->all());
        /* \Session::flash('msg_update', 'Atualizado com sucesso!'); */
        return Redirect::to('/usuarios');
    }

    public function delete($id) {
        $usuario = Usuario::findorfail($id);
        $usuario->delete();
        return Redirect::to('/usuarios');
    }
}
