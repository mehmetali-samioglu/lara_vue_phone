<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhonebookRequest;
use App\phonebook;
use Illuminate\Http\Request;

class PhonebookController extends Controller
{

    public function index()
    {
        return view('phonebook');
    }

    public function getData(){
        return Phonebook::orderBy('name','DESC')->get();
    }


    public function create()
    {
        //
    }


    public function store(PhonebookRequest $request)
    {//Request idi PhonebookRequest yaptık

        $pb = new Phonebook;

        $pb ->name = $request->name;
        $pb->phone = $request->phone;
        $pb->email=  $request->email;

        $pb->save();
        return $pb;
    }


    public function show(phonebook $phonebook)
    {
       //
    }


    public function edit(phonebook $phonebook)
    {
        //
    }


    public function update(PhonebookRequest $request)
    {
        $pb = Phonebook::find($request->id);

        $pb ->name = $request->name;
        $pb->phone = $request->phone;
        $pb->email=  $request->email;

        $pb->update();
    }


    public function destroy(phonebook $phonebook)
    {
        Phonebook::where('id',$phonebook->id)->delete();
    }
}
