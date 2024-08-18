<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $settings = GeneralSetting::first();
        Log::create([
            'user_id' => Auth::id(),
            'action' => 'Viewed the list of customers.',
        ]);
        return view('dashboard.customers.index', compact('customers','settings'));
    }

    public function create()
    {
        return view('dashboard.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer added successfully.');
    }

    public function show(Customer $customer)
    {
        return view('dashboard.customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        Log::create([
            'user_id' => Auth::id(),
            'action' => 'Opened the form to edit customer: ' . $customer->first_name . ' ' . $customer->last_name,
        ]);
        return view('dashboard.customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string',
        ]);


        $customer->update($request->all());

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'Updated customer: ' . $customer->first_name . ' ' . $customer->last_name,
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        Log::create([
            'user_id' => Auth::id(),
            'action' => 'Deleted customer: ' . $customer->first_name,
        ]);
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }

    public function export($type)
    {
        $customers = Customer::all();

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'First Name');
        $sheet->setCellValue('B1', 'Last Name');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'Phone Number');
        $sheet->setCellValue('E1', 'Address');

        $row = 2;
        foreach ($customers as $customer) {
            $sheet->setCellValue('A' . $row, $customer->first_name);
            $sheet->setCellValue('B' . $row, $customer->last_name);
            $sheet->setCellValue('C' . $row, $customer->email);
            $sheet->setCellValue('D' . $row, $customer->phone_number);
            $sheet->setCellValue('E' . $row, $customer->address);
            $row++;
        }

        $filename = 'customers_' . now()->format('Ymd_His') . '.' . $type;

        if ($type === 'xlsx') {
            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        } elseif ($type === 'csv') {
            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
        } else {
            return redirect()->route('customers.index')->with('error', 'Invalid file type.');
        }

        $writer->save($filename);

        Log::create([
            'user_id' => Auth::id(),
            'action' => 'Exported customers as a ' . strtoupper($type) . ' file.',
        ]);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
