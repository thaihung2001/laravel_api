<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Empty_;
use Throwable;
use App\Http\Resources\CustomerResource;
class EmployeeController extends Controller
{
    //api read 
    public function index(Employee $id=null){
      if($id==null){
         //return Employee::orderBy('FirstName','asc')->get();
         return new CustomerResource(Employee::orderBy('FirstName','asc')->get());
      }else{
        return new CustomerResource($id);
      }
    }
// api create
    public function create(Request $request){
      try{
          //check input validate
              $request->validate([
                'LastName' => 'required',
                'FirstName' => 'required',
                'Email' => 'required',
                'Phone' => 'required'
              ]);
         $employee=new Employee();
         $employee->Lastname=$request->input('LastName');
         $employee->FirstName=$request->input('FirstName');
         $employee->Email=$request->input('Email');
         $employee->Phone=$request->input('Phone');
         $employee->save();
         return 'insert success id: '.$employee->EMP_ID;
      }catch(Throwable $err){
        return $err->getMessage();
      } 
    }

    //api update
    public function update($id,Request $request){
        try{
           $employee= Employee::find($id);
           if($employee){  //check id isset ?
            $employee->Lastname=$request->input('LastName');
            $employee->FirstName=$request->input('FirstName');
            $employee->Email=$request->input('Email');
            $employee->Phone=$request->input('Phone');
            $employee->save(); 
         
            return 'update success id: '. $employee->EMP_ID;
          
           }else{
            return 'id empty';
           }
        }catch(Throwable $err){
          return $err->getMessage();
        }
      }
      //api delete
      public function delete($id){
        try{
            $employee= Employee::find($id);
            if($employee){  //check id issets?
             $employee->delete();
             return 'delete complete id: '. $employee->EMP_ID;
            }else{
             return 'id empty';
            }
         }catch(Throwable $err){
           return $err->getMessage();
         }
      }
}
