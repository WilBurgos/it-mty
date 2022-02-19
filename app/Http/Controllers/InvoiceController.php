<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Invoice');
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
        // dd( $request->all(), Auth()->user() );
        DB::beginTransaction();
        try {
            $newCompany = new Company;
            // $newCompany->id_user = Auth()->user()->id;
            $newCompany->company_name = $request->company["company_name"];
            $newCompany->name = $request->company["name"];
            $newCompany->website = $request->company["web"];
            $newCompany->address = $request->company["address"];
            $newCompany->city = $request->company["city"];
            $newCompany->country = $request->company["country"];
            $newCompany->phone = $request->company["phone"];
            $newCompany->email = $request->company["email"];
            $newCompany->logo = $request->company["logo"];
            $newCompany->save();

            $newClient = new Client;
            $newClient->company_name = $request->client["company_name"];
            $newClient->name = $request->client['name'];
            $newClient->address = $request->client['address'];
            $newClient->city = $request->client['city'];
            $newClient->country = $request->client['country'];
            $newClient->save();

            $newInvoice = new Invoice;
            $newInvoice->id_user = Auth()->user()->id;
            $newInvoice->id_client = $newClient->id;
            $newInvoice->id_company = $newCompany->id;
            $newInvoice->invoice_no = $request->invoice["no"];
            $newInvoice->invoice_date = $request->invoice["date"];
            $newInvoice->due_date = $request->invoice["due"];
            $newInvoice->notes = $request->invoice["notes"];
            $newInvoice->total = $request->invoice["total"];
            $newInvoice->save();

            DB::commit();

            return response()->json([
                "result" => true,
            ],200);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();

            return response()->json([
                "result" => false,
                "reason" => $th->getMessage()
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
