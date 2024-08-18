<?php

namespace App\Http\Controllers;

use App\Models\AfpDetail;
use App\Models\Customer;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use App\Models\GeneralSetting;

class AfpDetailController extends Controller
{
    public function index()
    {
        $settings = GeneralSetting::first();

        $details = AfpDetail::with('customer')->get();

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'Viewed the list of AFP details.',
        ]);

        return view('dashboard.details.index', compact('details', 'settings'));
    }

    public function create()
    {
        $settings = GeneralSetting::first();

        $customers = Customer::all();

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'Opened the form to create a new AFP detail.',
        ]);

        return view('dashboard.details.create', compact('customers', 'settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'owner_name' => 'required|string|max:255',
            'office_full_address' => 'required|string',
            'yard_full_address' => 'required|string',
            'number_of_trucks' => 'required|integer',
            'number_of_drivers' => 'required|integer',
            'amazon_scorecard_rating' => 'required|string|max:255',
            'dispatch_handling_method' => 'required|in:in house,dispatch service',
            'main_services' => 'required|string',
        ]);

        $afpDetail = AfpDetail::create($request->all());

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'Created a new AFP detail for customer: ' . $afpDetail->customer->first_name . ' ' . $afpDetail->customer->last_name,
        ]);

        return redirect()->route('details.index')->with('success', 'AFP details created successfully.');
    }

    public function edit($id)
    {
        $settings = GeneralSetting::first();
        $detail = AfpDetail::findOrFail($id);
        $customers = Customer::all();

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'Opened the form to edit AFP detail with ID: ' . $id,
        ]);

        return view('dashboard.details.edit', compact('detail', 'customers', 'settings'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'owner_name' => 'required|string|max:255',
            'office_full_address' => 'required|string',
            'yard_full_address' => 'required|string',
            'number_of_trucks' => 'required|integer',
            'number_of_drivers' => 'required|integer',
            'amazon_scorecard_rating' => 'required|string|max:255',
            'dispatch_handling_method' => 'required|in:in house,dispatch service',
            'main_services' => 'required|string',
        ]);

        $detail = AfpDetail::findOrFail($id);
        $detail->update($request->all());

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'Updated AFP detail with ID: ' . $id . ' for customer: ' . $detail->customer->first_name . ' ' . $detail->customer->last_name,
        ]);

        return redirect()->route('details.index')->with('success', 'AFP details updated successfully.');
    }

    public function destroy($id)
    {
        $detail = AfpDetail::findOrFail($id);
        $customerName = $detail->customer->first_name . ' ' . $detail->customer->last_name;
        $detail->delete();

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'Deleted AFP detail with ID: ' . $id . ' for customer: ' . $customerName,
        ]);

        return redirect()->route('details.index')->with('success', 'AFP details deleted successfully.');
    }

    public function export(Request $request, $type)
    {
        $details = AfpDetail::with('customer')->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the headers
        $sheet->setCellValue('A1', 'Customer Name');
        $sheet->setCellValue('B1', 'Owner Name');
        $sheet->setCellValue('C1', 'Office Full Address');
        $sheet->setCellValue('D1', 'Yard Full Address');
        $sheet->setCellValue('E1', 'Number of Trucks');
        $sheet->setCellValue('F1', 'Number of Drivers');
        $sheet->setCellValue('G1', 'Amazon Scorecard Rating');
        $sheet->setCellValue('H1', 'Dispatch Handling Method');
        $sheet->setCellValue('I1', 'Main Services');

        // Populate the rows with data
        $row = 2;
        foreach ($details as $detail) {
            $sheet->setCellValue('A' . $row, $detail->customer->first_name . ' ' . $detail->customer->last_name);
            $sheet->setCellValue('B' . $row, $detail->owner_name);
            $sheet->setCellValue('C' . $row, $detail->office_full_address);
            $sheet->setCellValue('D' . $row, $detail->yard_full_address);
            $sheet->setCellValue('E' . $row, $detail->number_of_trucks);
            $sheet->setCellValue('F' . $row, $detail->number_of_drivers);
            $sheet->setCellValue('G' . $row, $detail->amazon_scorecard_rating);
            $sheet->setCellValue('H' . $row, ucfirst($detail->dispatch_handling_method));
            $sheet->setCellValue('I' . $row, $detail->main_services);
            $row++;
        }

        $fileName = 'afp_details.' . $type;

        if ($type == 'xlsx') {
            $writer = new Xlsx($spreadsheet);
        } elseif ($type == 'csv') {
            $writer = new Csv($spreadsheet);
        } else {
            return redirect()->route('details.index')->with('error', 'Invalid export type.');
        }

        // Save the file to a temp path and return it as a download
        $filePath = storage_path('app/public/' . $fileName);
        $writer->save($filePath);

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'Exported AFP details as a ' . strtoupper($type) . ' file',
        ]);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
