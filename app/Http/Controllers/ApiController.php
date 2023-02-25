<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\datas;
use Validator;

class ApiController extends Controller
{
    function getData($id)
    {
    	return datas::find($id);
    }
    function Get()
    {
    	$data = datas::all();
    	return $data; 
    }

    function StoreData(Request $req)
    {
    	$data = new datas;
    	$data->name = $req->name;
    	$data->roll_no = $req->roll_no;
    	$data->section = $req->section;
    	$data->save();
    	return ["info"=>"data as been saved"];
    }

    function Update(Request $req,$id)
    {
    	$data = datas::find($id);
    	return $data;
    	//return("edit",compact($data));
    	//value="{{$data->name}}";
    	// $data->name = $req->input('name');
    	// $data->roll_no = $data->input('roll_no');
    	// $data->section = $req->input('section');
      

    	$result = $data->save();

    	if($result)
    	{
    		return ["info"=>"Data has been updated successfully"];
    	}

    	else
    	{
           
           return ["info"=>"Data has not been saved"];
    	}

    }

    function Search($name)
    {
    	return datas::where("name","like","%".$name."%")->get(); // first parameter "name" is used to search in name field and store in $name and like % is used to search for the character. 
    	//return datas::where("roll_no","like","%".$name."%") search for the roll number
    }

    function Delete(Request $req,$id)
    {
    	$data = Datas::find($req->id);
    	$result = $data->delete();

    	if($result)
    	{
    		return ["info"=>"Data has been deleted successfully"];
    	}

    	else
    	{
    		return ["info"=>"Data operation has been failed"];
    	}
    }

    function testData(Request $req)
    {
       $rules = array(
         "roll_no"=>"required|min:2|max:4"
       );

       $validator = Validator::make($req->all(),$rules);

       if($validator->fails())
       {
       	  return response()->json($validator->errors(),401);//for changing status 0k 200 when validation failed.
       }

       else
       {
       	$data = new datas;
    	$data->name = $req->name;
    	$data->roll_no = $req->roll_no;
    	$data->section = $req->section;
    	$result = $data->save();
        
        if($result)
    	{
    		return ["info"=>"Data has been saved successfully"];
    	}

    	else
    	{
    		return ["info"=>"operation has been failed"];
    	}
       }


    }

    function fileUpload(Request $req)
    {
    	$file =$req->file('file')->store('public');
    	return ["file"=>"$file"] ;
    }
}
