<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Common;
use Hash;
use Validator;

class AdminController extends MyController
{
    //  Listing of all administrator
	public function index(){
    	$allAdmin = Common::listAllRecords('admin','iAdminId','desc');
        $common['pagename'] = 'admin';
    	$common['title']='Administrator';
    	$common['allAdmin'] = $allAdmin;
       return view('Admin/admin',$common);
    }

    //  Show administrator add page
    public function showAdd(){
        $common['pagename'] = 'admin';
        $common['mode'] = 'add';
        $common['title']='Administrator - Add';
        return view('Admin/createUpdateAdmin',$common);
    }

    //  Adding administrator detail
    public function postAdd(Request $request){
        $validator = Validator::make(
            array('firstname'=>$request->vFirstName,'lastname'=>$request->vLastName,'email'=>$request->vEmail,'password'=>$request->vPassword,'status'=>$request->eStatus),
            array('firstname'=>'required|max:255','lastname'=>'required|max:255','email'=>'required|email|max:255','email'=>'unique:admin,vEmail','password'=>'required','status'=>'required')
        );

        if($validator->fails()){
            return redirect('/administrator/add')->withErrors($validator)->withInput();
        }
        else {
            $adminDetails['eRole'] = 'Subadmin';
            $adminDetails['vFirstName'] = $request->vFirstName;
            $adminDetails['vLastName'] = $request->vLastName;
            $adminDetails['vEmail'] = $request->vEmail;
            $adminDetails['vPassword'] = $this->encrypt($request->vPassword);
            $adminDetails['eStatus'] = $request->eStatus;
            $adminDetails['dAddedDate'] = date('Y-m-d');
            $adminDetails['vPhoto']='';
            $adminDetails['vOTP']='';
            $adminDetails['iLastLoginId']=0;
            Common::saveRecord('admin',$adminDetails);
            $request->session()->flash("message", "Record Added Successfully!");
            return redirect('/');
        }
    }

    //  Show single administrator detail in edit page
    public function showEdit($id,Request $request){
        $singleAdminRecord = Common::fetchSingleRecord('admin','iAdminId',$id);
        if(count($singleAdminRecord)==0)
        {
            $request->session()->flash("message", "Record doesn't exists.");
            return redirect('/');
        }
        else
        {
            $vPassword = $singleAdminRecord->vPassword;
            $vPassword = $this->decrypt($vPassword);
            $common['vPassword'] = $vPassword;
            $common['singleAdminRecord'] = $singleAdminRecord;
           
            $common['pagename'] = 'admin';
            $common['mode'] = 'edit';
            $common['title']='Administrator - Edit';
            return view('Admin/createUpdateAdmin',$common);
        }
        
    }

     //  Update administrator detail
    public function postEdit(Request $request){
        $validator = Validator::make(
            array('firstname'=>$request->vFirstName,'lastname'=>$request->vLastName,'email'=>$request->vEmail,'status'=>$request->eStatus),
            array('firstname'=>'required|max:255','lastname'=>'required|max:255','email'=>'required|email|max:255|Regex:/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i','email'=>'unique:admin,vEmail','status'=>'required')
        );
        $iAdminId = $request->iAdminId;
        if($validator->fails()){
            return redirect('/administrator/edit/'.$iAdminId)->withErrors($validator)->withInput();
        }
        else {
            $update_admin_arr['vFirstName'] = $request->vFirstName;
            $update_admin_arr['vLastName'] = $request->vLastName;
            if(!empty($request->vPassword)){
                $update_admin_arr['vPassword'] = $this->encrypt($request->vPassword);
            }
            $update_admin_arr['eStatus'] = $request->eStatus;
            $response=Common::updateRecord('admin','iAdminId',$iAdminId,$update_admin_arr);
            if($response>0)
            {
                $request->session()->flash("message", "Record Updated Successfully!");
            }
            return redirect('/');
        }
    }

    //  Update single or multiple administrator status
    public function actionUpdate(Request $request){
        $status = $request->action;
        $update_admin_arr['eStatus'] = $status;
        $ids = explode(",", $request->ids);
        if($ids[0]=='on')
        {
            unset($ids[0]);
        }
        $response = Common::updateMultipleRecords('admin','iAdminId',$ids,$update_admin_arr);
        if($response>0)
        {
            $msg = (count($ids)>1) ? 'Records' : 'Record';
            if($status=='Deleted')
            {
                $request->session()->flash("message", "Total ".count($ids)." ".$msg." Deleted Successfully!");
            }
            else
            {
                $request->session()->flash("message", "Total ".count($ids)." ".$msg." Updated Successfully!");
            }
        }
        return redirect('/');   
    }
}
