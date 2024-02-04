<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(Request $request)
    {

        $search =  $request->search;
        
        if(!is_null($search)) {
            $customers = Customer::Search($search)
            ->paginate(25);
        } else {
            $customers = Customer::paginate(25);
        }

        return Inertia::render('Customers/index', [
            'customers' => $customers,
        ]);
    }

    public function create()
    {
        return Inertia::render('Customers/create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'kana' => 'required',
            'tel' => 'required',
            'email' => 'required|email',
            'birthday' => 'nullable|date',
            'firstvisit' => 'nullable|date',
        ]);

        Customer::create([
            'name' => $request->name,
            'kana' => $request->kana,
            'tel' => $request->tel,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'firstvisit' => $request->firstvisit,
        ]);

        return to_route('customers.index')
        ->with([
            'message' => '登録しました。',
            'status' => 'success'
        ]);
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return Inertia::render('Customers/edit', [
            'customer' => $customer,
        ]);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'kana' => 'required',
            'tel' => 'required',
            'email' => 'required|email',
            'birthday' => 'nullable|date',
            'firstvisitt' => 'nullable|date',
        ]);

        $customer->update([
            'name' => $request->name,
            'kana' => $request->kana,
            'tel' => $request->tel,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'firstvisit' => $request->firstvisit,
        ]);

        return to_route('customers.index')
        ->with([
            'message' => '更新しました。',
            'status' => 'success'
        ]);
    }
}
