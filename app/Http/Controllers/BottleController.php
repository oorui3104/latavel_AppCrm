<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\StoreBottleRequest;
use App\Models\Bottle;

class BottleController extends Controller
{
    public function index()
    {
        $bottles = Bottle::all();

        return Inertia::render('Bottles/index', [
            'bottles' => $bottles,
        ]);
    }

    public function store(StoreBottleRequest $request)
    {
        Bottle::create([
            'name' => $request->name, 
            'price' => $request->price,
            ]);

            return to_route('bottles.index')
            ->with([
                'message' => '登録しました。',
                'status' => 'success'
            ]);
    }

    public function destroy($id)
    {
        $bottle = Bottle::findOrFail($id);
        $bottle->delete(); 
        
        return to_route('bottles.index')
        ->with([
            'message' => '削除しました。',
            'status' => 'error'
        ]);
    }

}
