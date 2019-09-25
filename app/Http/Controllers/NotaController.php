<?php

namespace App\Http\Controllers;

use app\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return Nota::where('user_id', auth()->id())->get();
    }

    public function store(Request $request)
    {
        $nota = new Nota();
        $nota->descrip = $request->descrip;
        $nota->user_id = auth()->id();
        $nota->save();

    }

    public function update(Request $request, $id)
    {
        $nota = Nota::find($id);
        $nota->descrip = $request->descrip;
        $nota->save();
    }

    public function destroy($id)
    {
        $nota = Nota::find($id);
        $nota->delete();
    }
}
