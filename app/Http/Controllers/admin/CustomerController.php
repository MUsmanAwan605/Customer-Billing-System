<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers=Customer::orderby('id','DESC')->paginate('10');
        return view('admin.customer.index', compact('customers'));
    }

    public function create(){
        return view('admin.customer.add');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:customer,email',
          'phone' => 'required|numeric|digits:11|unique:customer,phone'
        ]);

        Customer::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
        ]);
        return redirect()->route('admin.customer.index')->with('success','customer created successfully!');
    }

    public function edit(string $id){
        $customer=Customer::find($id);
        return view('admin.customer.edit',compact('customer'));
    }

    public function update(Request $request, string $id){
        $customer=Customer::find($id);
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric',
        ]);

        $customer->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
        ]);
        return redirect()->route('admin.customer.index')->with('success', 'customer updated successfully!');
    }

    public function destroy(string $id){
        $customer=Customer::find($id);
        $customer->delete();
        return redirect()->route('admin.customer.index')->with('success', 'customer updated successfully!');

    }

    public function search(Request $request)
    {


        $searchQuery=$request->input('search');

        $records=Customer::where(function($query) use ($searchQuery) {
        $query->where('phone','LIKE',"%{$searchQuery}%")
        ->orWhere('name','LIKE',"%{$searchQuery}%");
        })->paginate(8);

        return view('admin.customer.view',compact('searchQuery','records'));

    }

}
