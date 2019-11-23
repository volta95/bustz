<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Illuminate\Support\Facades\Auth;
class CompaniesController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies = Company::get();
        $i=1;
        return view('admin.companies.index', ['companies'=> $companies,'i'=>$i]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          //show form into view
          return view('companreg');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

            $Company = Company::create([
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'tin' => $request->input('tin'),

            ]);


            if($Company){
                $cookie = \Cookie::make('company_id',  $Company->id,30);
                return redirect()->route('register')->withCookie($cookie)
                ->with('success' , 'Company created successfully');
            }



            return back()->withInput()->with('errors', 'Error creating new Company');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Company $Company)
    {
        //show single Company
        $Company=Company::where('id',$Company->id)->first();
        if(Auth::user()->role_id==1){

        return view('admin.companies.show',['company'=>$Company]);
        }
        elseif(Auth::user()->role_id==2){
            return view('busowner.companies.show',['company'=>$Company]);
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(Auth::user()->role_id==2){
        $Company=Company::where('id',$id)->first();
        return view('busowner.companies.edit',['Company'=>$Company]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(company $company)
    {
        if(Auth::user()->role_id==1){
            $Company=Company::where('id',$company->id)->update([
                'status'=>1
                ]);

                if($Company){
                    return redirect()->route('companies.show',['company'=>$company->id])->with('success',
                    $company->name.'of'. ' confirmed');
                }
            }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $Company)
    {
        //delete Company
        $findCompany=Company::find($Company->id);
        if($findCompany->delete()){
            return redirect()->route('companies.index')->with('success','Company deleted successfully');
        }
        return back()->withInput()->with('error','Company could not deleted');
    }
}
