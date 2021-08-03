<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Product;


use Illuminate\Http\Request;

class ShopController extends Controller
{
    /* ------------------------ API Fuction for Empolyee ------------------------ */
    function CreateEmployee(Request $req){
        $employee = new Employee();
        $employee->fname = $req->input('fname');
        $employee->contact = $req->input('contact');
        $employee->pass = $req->input('pass');
        $employee->uname = $req->input('uname');
        $employee->save();
        return "Create Success";
    }
    function FetchEmployee(){
        return Employee::all();
    }
    function FetchEmployeeById($id){
        return Employee::where('id',$id)->first();
    }
    function PutEmployeeById($id, Request $req){
        $employee = Employee::where('id',$id)->first();
        $employee->fname = $req->input('fname');
        $employee->contact = $req->input('contact');
        $employee->pass = $req->input('pass');
        $employee->uname = $req->input('uname');
        $employee->update();
        return "Update Success";
    }
    function DeleteEmployeeById($id){
        Employee::where('id',$id)->delete();
        return "Delete Success";
    }

    /* ------------------------ API Fuction for Product ------------------------ */
    function CreateProduct(Request $req){
        $product = new Product();
        $product->pname = $req->input('pname');
        $product->quantity = $req->input('quantity');
        $product->price = $req->input('price');
        $product->save();
        return "Create Success";
    }
    function FetchProduct(){
        return Product::all();
    }
    function FetchProductById($id){
        return Product::where('id',$id)->first();
    }
}
