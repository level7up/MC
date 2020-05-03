<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Auth;
use App\User;
use App\Admin;
use Notification;

use App\Notifications\MyFirstNotification;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('companies.create',compact('companies'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=> 'required',
            'email'=>'required',
            'website'=>'nullable',
            'image'  => 'dimensions:min_width=100,min_height=100',
        ]);
        
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path= $request->image->move(public_path('images/logos'), $filenameToStore);
        }else{
            $filenameToStore= 'noImage.jpg';
        }
        
        $company = new Company;
        $company->name= $request->input('name');
        $company->email= $request->input('email');
        $company->website= $request->input('website');
        $company->logo= $filenameToStore;
        $company->save();

        $admins = Admin::all();

        foreach ($admins as $admin){
            $details = [
                'To' => $admin->email,

                'greeting' => 'Hello '.$admin->name.'',

                'body' => 'New Company Registerd By name: '. $company->name .'',

                'thanks' => 'Thank you...',

                'actionText' => 'View My Site',

                'actionURL' => url('/'),

            ];



            Notification::send($admin, new MyFirstNotification($details));



        }

        
        $msg = 'New Company Added Successfully';
       
        return redirect()->route('companies')->with('success' , $msg);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name'=> 'required',
            'email'=>'required',
            'website'=>'nullable',
            'logo'  => 'dimensions:min_width=100,min_height=100',
        ]);
        
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path= $request->image->move(public_path('images/logos'), $filenameToStore);
        }
        
        $company = Company::find($id);
        $company->name= $request->input('name');
        $company->email= $request->input('email');
        $company->website= $request->input('website');
        if($request->hasFile('image')){
            $company->logo = $filenameToStore;
        }
        $company->save();

        $msg = 'New Art Added Successfully';
       
        return redirect()->route('companies')->with('success' , $msg);


        // Company::where('id', $id)->update($request->all());
        // return redirect('/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::destroy($id);
        return redirect()->back();


    }
}
