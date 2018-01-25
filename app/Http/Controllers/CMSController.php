<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Common;
use Hash;
use Validator;

class CMSController extends MyController
{
        //  Listing of all CMS
    public function index(){
    	$allCMS = Common::listAllRecordsWithoutStatus('cms','iCMSId','desc');
    	$common['pagename'] = 'cms';
    	$common['allCMS'] = $allCMS;
        $common['title']='CMS';
    	return view('CMS/cms',$common);
    }

    //  Show CMS add page
    public function showAdd(){
        $common['pagename'] = 'cms';
        $common['title']='CMS - Add';
        $common['mode'] = 'add';
        return view('CMS/createUpdateCMS',$common);
    }

    //  Adding CMS detail
    public function postAdd(Request $request){
        $validator = Validator::make(
            array('Title'=>$request->tTitle,'Code'=>$request->tCode),
            array('Title'=>'required','Code'=>'required')
        );
        if($validator->fails()){
            return redirect('/cms/add')->withErrors($validator)->withInput();
        }
        else 
        {
            $addCMSRecord = $request->all();
            unset($addCMSRecord['iCMSId']);
            unset($addCMSRecord['_token']);
            $response = Common::saveRecord('cms',$addCMSRecord);
            $request->session()->flash("message", "Record Added Successfully!");
            return redirect('/cms');
        }
    }

    //  Show single CMS detail in edit page
    public function showEdit($id){
        $singleCMSRecord = Common::fetchSingleRecord('cms','iCMSId',$id);
        if(count($singleCMSRecord)==0)
        {
            $request->session()->flash("message", "Record doesn't exists.");
            return redirect('/cms');
        }
        else
        {
            $common['singleCMSRecord'] = $singleCMSRecord;
            $common['pagename'] = 'cms';
            $common['title']='CMS - Edit';
            $common['mode'] = 'edit';
            return view('CMS/createUpdateCMS',$common);
        }
    }

    //  Update CMS detail
    public function postEdit(Request $request){
        $validator = Validator::make(
            array('Title'=>$request->tTitle,'Code'=>$request->tCode),
            array('Title'=>'required','Code'=>'required')
        );

        $iCMSId = $request->iCMSId;
        if($validator->fails()){
            return redirect('/cms/edit/'.$iCMSId)->withErrors($validator)->withInput();
        }
        else {
            $updateCMSRecord = $request->all();
            unset($updateCMSRecord['iCMSId']);
           	unset($updateCMSRecord['_token']);
            $response = Common::updateRecord('cms','iCMSId',$iCMSId,$updateCMSRecord);
            if($response > 0)
            {
                $request->session()->flash("message", "Record Updated Successfully!");
            }
            return redirect('/cms');
        }
    }

    //  Delete single or multiple CMS detail
    public function actionUpdate(Request $request){
        $status = $request->action;
        $ids = explode(",", $request->ids);
        if($ids[0]=='on')
        {
            unset($ids[0]);
        }
        if($status=='Deleted')
        {
            for ($i=0; $i <count($ids) ; $i++) { 
                $id=$ids[$i];
                $response=Common::deleteRecord('cms','iCMSId',$id);
                $msg = (count($ids)>1) ? 'Records' : 'Record';
                $request->session()->flash("message", "Total ".count($ids)." ".$msg." Deleted Successfully!");
            }
            return redirect('/cms');   
        }
    }
}
