<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'website' => 'required',
            'email' => 'required',
        ]);
        //Update Logo
        if($request->logo){
            $file = $request->file('logo'); //Grabs file from form
            $logo = Image::make($file); //Uses Image intervention
            $logo->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
            });//COnstrains aspect ratio with a width of 250px
            $logo->resize(250, null); //Resizes File With Image Intervention
            $jpg = (string) $logo->encode('jpg'); //Converts file to jpg with image intervention
            $filename = uniqid(Auth::user()->id."_").".jpg"; //Unique File name
            Storage::disk('public')->put('/logo/' .$filename, $jpg, 'public');
            $url = Storage::disk('public')->url('/logo/'.$filename);

            $request->logo = $url;

            $company = new Company;
            $company->name = $request->name;
            $company->email = $request->email;
            $company->address = $request->address;
            $company->logo = $url;
            $company->website = $request->website;
            $company->save();
        }else{
            Company::create($request->all());
        }

            return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('show')->with([
            'company' => $company,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'editName' => 'required',
            'editEmail' => 'required|email',
            'editAddress' => 'required',
            'editWebsite' => 'required',
            'editLogo' => 'sometimes|required|image'

        ]);
        $edit = Company::find($company->id);
        $edit->name = $request->editName;
        $edit->email = $request->editEmail;
        $edit->address = $request->editAddress;
        $edit->website = $request->editWebsite;

        //Update Logo
        if($request->editLogo){
            if($edit->logo != ''){
                $unlink = str_replace(config('app.url'), "", $edit->logo);
                unlink(public_path($unlink));
            }
            $file = $request->file('editLogo'); //Grabs file from form
            $logo = Image::make($file); //Uses Image intervention
            $logo->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
            });//COnstrains aspect ratio with a width of 250px
            $logo->resize(250, null); //Resizes File With Image Intervention
            $jpg = (string) $logo->encode('jpg'); //Converts file to jpg with image intervention
            $filename = uniqid(Auth::user()->id."_").".jpg"; //Unique File name
            Storage::disk('public')->put('/logo/' .$filename, $jpg, 'public');
            $url = Storage::disk('public')->url('/logo/'.$filename);
            $edit->logo = $url;
        }

        //Save Edit
        $edit->save();
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('home');
    }
}
