<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function add_customer_form()
    {  
      if( \View::exists('customer.create') ){

        return view('customer.create');

      }
    }

    public function submit_customer_data(Request $request)//save
    {
      $rules = [
          'name' => 'required|min:6',
          'email' => 'required|email|unique:customers'
      ];

      $errorMessage = [
          'name.required' => 'Enter your :attribute first.'
      ];

      $this->validate($request, $rules, $errorMessage);
      
      Customer::create([
         'name' => $request->name,
         'slug' => \Str::slug($request->name),
         'email' => strtolower($request->email)
      ]);

      $this->meesage('message','Customer created successfully!');
      //return redirect()->back();
      return redirect()->route('customer.list');

    }

    

    public function fetch_all_customer()//list
    {
       $customers = Customer::toBase()->get();
       return view('customer.index',compact('customers'));
    }

    public function edit_customer_form(Customer $customer)//edit
    { 
       return view('customer.edit',compact('customer'));
    }

    public function edit_customer_form_submit(Request $request, Customer $customer)//update
    {
      dd($request->all());
      
      $rules = [
          'name' => 'required|min:6',
          'email' => 'required|email|unique:customers'
      ];

      $errorMessage = [
          'required' => 'Enter your :attribute first.'
      ];

      $this->validate($request, $rules, $errorMessage);

      $customer->update([
                    'name' => $request->name,
                    'email' => strtolower($request->email)
                ]);

      $this->meesage('message','Customer updated successfully!');
      return redirect()->back();
    }

    public function view_single_customer(Customer $customer)
    {
      return view('customer.view',compact('customer'));
    }

    public function delete_customer(Customer $customer)
    {
      $customer->delete();
      $this->meesage('message','Customer deleted successfully!');
      return redirect()->back();
    }

    public function meesage(string $name = null, string $message = null)
    {
        return session()->flash($name,$message);
    }

}