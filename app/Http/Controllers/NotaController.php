<?php

namespace App\Http\Controllers;

use App\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Nota::where('user_id', auth()->id())->orderBy('updated_at', 'DESC')->get();
    }

    public function store(Request $request)
    {
        //if (!$request)
        
        $nota = new Nota();
        $nota->descrip = $request->descrip;
        $nota->user_id = auth()->id();
        $nota->save();

        return $nota;
    }

    public function update(Request $request, $id)
    {
        $nota = Nota::find($id);
        $nota->descrip = $request->descrip;
        $nota->save();

        return $nota;
    }

    public function destroy($id)
    {
        $nota = Nota::find($id);
        $nota->delete();
    }
}
