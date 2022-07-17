<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        $services =  Service::all();
        return view('backends.services.index', ['services' => $services]);
    }

    public function create()
    {
        return view('backends.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => "required",
            'description' => 'required',
            'image' => 'required',
        ]);

        $file = $request->file('image');
        $fileName = rand() . $file->getClientOriginalName();
        $file->move(public_path('assets/service'), $fileName);

        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $fileName,
        ]);

        return redirect()->back()->with('status', 'Service Created Successfully.');
    }

    public function edit($id)
    {
        $services = Service::find($id);
        return view('backends.services.edit', ['services' => $services]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title'=>"required",
            'description'=>"required",
            'image'=>"required"
        ]);

        $file = $request->file('image');
        $fileName = rand().$file->getClientOriginalName();
        $file->move(public_path('assets/service'), $fileName);

        Service::find($id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$fileName,
        ]);

        return redirect('/services')->with('status', 'Service Updated Successfully');
    }

    public function destory($id){
        Service::destroy($id);
        return redirect()->back()->with('status', 'Service Deleted Successfully');
    }

}
