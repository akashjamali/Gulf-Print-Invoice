<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class InvoiceController extends Controller
{
    /**
     * List all invoices
     */
    public function index()
    {
        return response()->json(Invoice::orderBy('created_at', 'desc')->get());
    }

    /**
     * Get the next invoice number (Last + 1)
     */
    public function getNextInvoiceNo()
    {
        $lastInvoice = Invoice::orderBy('id', 'desc')->first();
        
        if (!$lastInvoice) {
            return response()->json(['next_no' => '3220']); // Starting number as per example
        }

        $lastNo = intval($lastInvoice->invoice_no);
        return response()->json(['next_no' => strval($lastNo + 1)]);
    }

    /**
     * Generate PDF and Save to Database
     */
    public function generate(Request $request)
    {
        $validated = $request->validate([
            'clientName' => 'required|string',
            'clientAddress' => 'required|string',
            'invoiceNumber' => 'required|string',
            'date' => 'required|string',
            'items' => 'required|array|min:1',
            'currency' => 'required|string',
            'taxRate' => 'required|numeric',
        ]);

        // Calculate totals
        $subtotal = collect($validated['items'])->sum('total');
        $tax = $subtotal * ($validated['taxRate'] / 100);
        $total = $subtotal + $tax;

        // Hardcoded Company Info
        $companyInfo = [
            'name' => 'mygulfprinting',
            'slogan' => 'Branding - Designing - Advertising - Printing',
            'email' => 'mygulfprint@gmail.com',
            'website' => 'www.mygulfprinting.com',
            'address' => 'Naif Road Diera Dubai, UAE',
            'whatsapp' => '+971 56 373 0149',
            'phone_landline' => '042980550',
            'pobox' => '61762',
            'instagram' => '@mygulfprinting',
        ];

        // Save to Database
        try {
            Invoice::create([
                'invoice_no' => $validated['invoiceNumber'],
                'client_name' => $validated['clientName'],
                'client_address' => $validated['clientAddress'],
                'date' => $validated['date'],
                'items' => $validated['items'],
                'subtotal' => $subtotal,
                'tax' => $tax,
                'total' => $total,
                'currency' => $validated['currency'],
            ]);
        } catch (\Exception $e) {
            Log::error("Failed to save invoice: " . $e->getMessage());
        }

        $renderData = array_merge($validated, [
            'company' => $companyInfo,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total,
        ]);

        $pdf = Pdf::loadView('invoice', $renderData);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->download("Invoice-{$validated['invoiceNumber']}.pdf");
    }

    /**
     * Download an existing invoice PDF
     */
    public function download($id)
    {
        $invoice = Invoice::findOrFail($id);
        
        $companyInfo = [
            'name' => 'mygulfprinting',
            'slogan' => 'Branding - Designing - Advertising - Printing',
            'email' => 'mygulfprint@gmail.com',
            'website' => 'www.mygulfprinting.com',
            'address' => 'Naif Road Diera Dubai, UAE',
            'whatsapp' => '+971 56 373 0149',
            'phone_landline' => '042980550',
            'pobox' => '61762',
            'instagram' => '@mygulfprinting',
        ];

        $renderData = [
            'clientName' => $invoice->client_name,
            'clientAddress' => $invoice->client_address,
            'invoiceNumber' => $invoice->invoice_no,
            'date' => $invoice->date,
            'items' => $invoice->items,
            'currency' => $invoice->currency,
            'subtotal' => $invoice->subtotal,
            'tax' => $invoice->tax,
            'total' => $invoice->total,
            'company' => $companyInfo,
        ];

        $pdf = Pdf::loadView('invoice', $renderData);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->download("Invoice-{$invoice->invoice_no}.pdf");
    }
}
