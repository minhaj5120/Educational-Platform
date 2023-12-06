<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\User;
use App\Models\AddFeesModel;
use Stripe\Stripe;
use Auth;

class FeesCollectionController extends Controller
{
    public function collect_fees(Request $request)
    {
        $data['header_title'] = "Fees Collection";
        $data['getClass']=ClassModel::getClass();

        if(!empty($request->all())){
            $data['getRecord'] = User::CollectFees();
        }
        return view("admin.fees_collection.collect_fees", $data);

    }
    public function add_fees($student_id)
    {
        $data["getFees"] = AddFeesModel::getFees($student_id);
        $getStudent= User::getSingleClass($student_id);
        $data["getStudent"] = $getStudent;
        $data['header_title'] = "Fees Collection";
        $data["paid_amount"] = AddFeesModel::getPaidAmount($student_id,$getStudent->class_id);
        return view("admin.fees_collection.add_fees", $data);

    }
    public function add_fees_insert($student_id,Request $request)
    {
        $getStudent= User::getSingleClass($student_id);
        $paid_amount= AddFeesModel::getPaidAmount($student_id,$getStudent->class_id);
        
        if(!empty($request->amount)){
            $remaining_amount=$getStudent->amount-$paid_amount;
            if($remaining_amount>=$request->amount){
                $remaining_amount_user=$remaining_amount-$request->amount;
                $getStudent = User::getSingleClass($student_id);
                $payment=new AddFeesModel();
                $payment->student_id = $student_id;
                $payment->class_id = $getStudent->class_id;
                $payment->paid_amount = $request->amount;
                $payment->remaining_amount = $remaining_amount_user;
                $payment->total_amount = $remaining_amount;
                $payment->payment_types = $request->payment_type;
                $payment->remark = $request->remarks;
                $payment->is_paid = 1;
                $payment->created_by = Auth::user()->id;
                $payment->save();
                return redirect()->back()->with("success","Fees Succesfully Added");
            }
            else{
                return redirect()->back()->with("error","Your Amount is not Valid");
            }
        }
        else{
            return redirect()->back()->with("error","Your Amount is Zero");
        }
    }
    //student_side
    public function student_collect_fees(Request $request)
    {
        $student_id = Auth::user()->id;
        $data["getFees"] = AddFeesModel::getFees($student_id);
        $getStudent= User::getSingleClass($student_id);
        $data["getStudent"] = $getStudent;
        $data['header_title'] = "Fees Collection";
        $data["paid_amount"] = AddFeesModel::getPaidAmount($student_id,$getStudent->class_id);
        return view("student.my_fees_collection", $data);

    }
    public function student_collect_fees_payment(Request $request) 
    {
        $student_id = Auth::user()->id;
        $getStudent= User::getSingleClass($student_id);
        $paid_amount= AddFeesModel::getPaidAmount($student_id,$getStudent->class_id);
        if(!empty($request->amount)){
            $remaining_amount=$getStudent->amount-$paid_amount;
            if($remaining_amount>=$request->amount){
                $remaining_amount_user=$remaining_amount-$request->amount;
                $getStudent = User::getSingleClass($student_id);
                $payment=new AddFeesModel();
                $payment->student_id = $student_id;
                $payment->class_id = $getStudent->class_id;
                $payment->paid_amount = $request->amount;
                $payment->remaining_amount = $remaining_amount_user;
                $payment->total_amount = $remaining_amount;
                $payment->payment_types = $request->payment_type;
                $payment->remark = $request->remarks;
                $payment->created_by = Auth::user()->id;
                $payment->save();

                if($request->payment_type=='cash' || $request->payment_type== 'cheque'){

                    $payment->is_paid = 1;
                    $payment->save();
                }
                elseif($request->payment_type=='Stripe'){
                    $setApiKey ='';
                    $setPublicKey ='';


                }
                return redirect()->back()->with("success","Fees Succesfully Added");

            }
            else{
                return redirect()->back()->with("error","Your Amount is not Valid");
            }
        }
        else{
            return redirect()->back()->with("error","Your Amount is Zero");
        }
    }
    
}
