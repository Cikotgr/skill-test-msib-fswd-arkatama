<?php

namespace App\Http\Controllers;

use App\Models\Profiles;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input_array = explode(" ",str_replace(array('TAHUN','THN','TH'),"",strtoupper($request->profile)));

        

        $isName = true;
        $isCity = false;

        $arrayName = [];
        $age = 0;
        $arrayCity =[];

        foreach($input_array as $input){
            if(is_numeric($input)){
                $isName = false;
                $age+=(int)$input;
                $isCity = true;
                continue;
                
            }
            if($isName){
                array_push($arrayName,$input); 
            }
            if($isCity){
                array_push($arrayCity,$input); 
            }
        }
        
        $name = implode(' ', $arrayName);
        $city = trim(implode(' ', $arrayCity));
        

        $data = [
            'NAME' => $name,
            'AGE' => $age,
            'CITY' => $city
        ];

        Profiles::create($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
