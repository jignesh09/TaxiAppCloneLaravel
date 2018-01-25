<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Common extends Model
{
    //Listing of all records active and inactive records
    public static function listAllRecords($tableName,$fieldName,$fieldValue){
    	return DB::table($tableName)->where('eStatus','<>','Deleted')->orderBy($fieldName, $fieldValue)->get();
    }

    //Listing of all records without status
    public static function listAllRecordsWithoutStatus($tableName,$fieldName,$fieldValue){
        return DB::table($tableName)->orderBy($fieldName, $fieldValue)->get();
    }
    //insert record
    public static function saveRecord($tablename,$data){
    	return DB::table($tablename)->insert([$data]);
    }

    //Fetch single record
    public static function fetchSingleRecord($tablename,$fieldname,$fieldval){
    	return DB::table($tablename)->where($fieldname,$fieldval)->first();
    }

    //Update single record
    public static function updateRecord($tablename,$fieldname,$fieldval,$data){
    	return DB::table($tablename)->where($fieldname, $fieldval)->update($data);
    }

    //Update multiple record
    public static function updateMultipleRecords($tablename,$fieldname,$fieldval,$data){
    	return DB::table($tablename)->whereIn($fieldname, $fieldval)->update($data);
    }

    //Delete single record
    public static function deleteRecord($tablename,$fieldname,$fieldval)
    {
        return DB::table($tablename)->where($fieldname,$fieldval)->delete();
    }
}
