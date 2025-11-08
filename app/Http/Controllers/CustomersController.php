<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

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
        $customers = new Customers();
        $customers->name = $request->input('name');
        $customers->email = $request->input('email');
        $customers->subject = $request->input('subject');
        $customers->message = $request->input('message');
        $customers->save();
        
        if ($request->ajax()) {
        return response('OK', 200)->header('Content-Type', 'text/plain');
    }

    // Fallback for non-AJAX form submissions
    return redirect()->back()->with('success', 'Message sent successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $customers = Customers::all();
        return view('user.Admin', ['customers' => $customers]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customers = Customers::find($id);
        return view('Edit', ['customers' => $customers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $customers = Customers::find($id);
        $customers->name = $request->input('name');
        $customers->email = $request->input('email');
        $customers->subject = $request->input('subject');
        $customers->message = $request->input('message');
        $customers->save();
        return redirect('/Admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customers::find($id);
        $customer->delete();
        return redirect('/Admin');
    }
}
