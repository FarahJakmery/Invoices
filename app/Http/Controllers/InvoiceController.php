<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceAttachments;
use App\Models\InvoiceDetails;
use App\Models\Section;
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
        $invoices = Invoice::all();
        return view('invoices.invoices', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::all();
        return view('invoices.add_invoices', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Invoice::create([
            'invoice_number'    => $request->invoice_number,
            'incoice_date'      => $request->incoice_date,
            'due_date'          => $request->due_date,
            'product'           => $request->product,
            'section_id'        => $request->Section,
            'Amount_collection' => $request->Amount_collection,
            'Amount_commission' => $request->Amount_commission,
            'discount'          => $request->discount,
            'value_vat'         => $request->value_vat,
            'rate_vat'          => $request->rate_vat,
            'total'             => $request->total,
            'status'            => 'غير مدفوعة', // The defult value of the status when the Admin create the invoice will be "غير مدفوعة"
            'value_status'      => 2,
            'note'              => $request->note,
        ]);

        $invoice_id = Invoice::latest()->first()->id;
        InvoiceDetails::create([
            'invoice_id'        => $invoice_id,
            'invoice_number'    => $request->invoice_number,
            'product'           => $request->product,
            'Section'           => $request->Section,
            'Status'            => 'غير مدفوعة',
            'Value_Status'      => 2,
            'note'              => $request->note,
            'user'              => (Auth::user()->name),
        ]);

        if ($request->hasFile('pic')) {
            $this->validate(
                $request,
                [
                    'pic' => 'required|mimes:png,jpg,jpeg,pdf|max:10000'
                ],
                [
                    'pic.mimes' => 'خطأ، تم حفظ الفاتورة و لم يتم حفظ المرفق لابد أن يكون المرفق من إحدى الصيغ المطلوبة '
                ]
            );

            $invoice_id = Invoice::latest()->first()->id;
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();
            $invoice_number = $request->invoice_number;

            $attachments = new InvoiceAttachments();
            $attachments->file_name = $file_name;
            $attachments->invoice_number = $invoice_number;
            $attachments->Created_by = Auth::user()->name;
            $attachments->invoice_id = $invoice_id;
            $attachments->save();

            // move pic
            // اسم المرفق سيتم حفظه في الداتابيز و لكن المرفق بحد ذاته سيتم حفظه على السيرفر في المكان الذي سنقوم بتحديده
            $imageName = $request->pic->getClientOriginalName();
            $request->pic->move(public_path('Attachments/' . $invoice_number), $imageName);
        }

        session()->flash('Add', 'تم اضافة الفاتورة بنجاح');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    public function getproducts($id)
    {
        $products = DB::table("products")->where("section_id", $id)->pluck("product_name", "id");
        return json_encode($products);
    }
}
