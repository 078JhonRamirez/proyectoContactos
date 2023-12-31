<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\grupo;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Hash;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(grupo $grupo)
    {
        $data = grupo::all()->get;
       // dd($data);
        // return view('nuevoContacto', compact('data'));

        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = grupo::all();

        return view('nuevoContacto', ['grupos' => $data]);
    
    }
    public function Registrousuario(){
        return view ('register');


    }
    public function Crearusuario(Request $request)
    {    
        $resultado = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        // if ($resultado->fails()) {
        //     return redirect()
        //              ->back()
        //          ->withErrors($resultado)
        //                 ->withInput();
        // }

        $dataContacto = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))

        ];

        User::create($dataContacto);
        
        return redirect('register');

        // Contacto::create( $dataContacto);
        // return redirect('nuevoContacto');

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $resultado = Validator::make($request->all(),[
            'perfil' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            // 'email' => 'required|email|unique:usuarios,email|max:255',
            // 'direccion' => 'string',
            // 'sexo' => 'String',
            // 'trabajo' => 'string',
            // 'region' => 'required',
            // 'grupo' => 'required',
            // 'descripcion' => 'required'
        ]);

        if ($resultado->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($resultado)
                        ->withInput();
        }

        $dataContacto = [
            'perfil' => $request->get('perfil'),
            'nombre' => $request->get('nombre'),
            'apellido' => $request->get('apellido'),
            'telefono' => $request->get('telefono'),
            'direccion' => $request->get('direccion'),
            'fijo' => $request->get('telefonoFijo'),
            'email' => $request->get('email'),
            'sexo' => $request->get('sexo'),
            'trabajo' => $request->get('trabajo'),
            'region' => $request->get('region'),
            'descripcion' => $request->get('descripcion'),
            'grupo_id' => $request->get('grupo')

        ];

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $rutaFoto = $foto->store('public/images');
            $rutaFoto = str_replace('public', 'storage', $rutaFoto);
        
            $dataContacto['foto'] = $rutaFoto;
        }
        
        Contacto::create($dataContacto);
        
        return redirect('contactos');

        // Contacto::create( $dataContacto);
        // return redirect('nuevoContacto');

    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
