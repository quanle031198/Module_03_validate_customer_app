<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormCustomerRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::all();
        return view('customers.list',compact('customers'));
    }

    public function create(){
        return view('customers.create');
    }

    public function store(FormCustomerRequest $request){
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->dob = $request->input('dob');
        $customer->save();

        // Hiển thị thông báo 
        $success = "Dữ liệu được xác thực thành công";
        return view('customers.create', compact('success'));
    }

    public function edit($id){
        $customer = Customer::findOrFail($id);
        return view('customers.edit',compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->dob = $request->input('dob');
        $customer->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật khách hàng thành công');
        //cap nhat xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa khách hàng thành công');

        //xoa xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }

    
}
