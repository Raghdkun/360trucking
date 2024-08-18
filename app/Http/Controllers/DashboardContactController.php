<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\GeneralSetting;
use App\Models\Carousel;
use App\Exports\ContactsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DashboardContactController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve settings and other data if needed
        $settings = GeneralSetting::first();
        $carousels = Carousel::first();

        // Handle search
        $query = Contact::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        }

        // Retrieve the last 10 contacts, paginated
        $contacts = $query->orderBy('created_at', 'desc')->paginate(10);

        // Pass the contacts and other data to the view
        return view('dashboard.contact', compact('contacts', 'settings', 'carousels'));
    }

    public function exportCsv()
    {
        $contacts = Contact::select('name', 'email', 'subject', 'message', 'created_at')->get();

        $filename = "contacts ".now()->format('d-m-y').".csv";
        $handle = fopen($filename, 'w');
        fputcsv($handle, ['Name', 'Email', 'Subject', 'Message', 'Received At']);

        foreach ($contacts as $contact) {
            fputcsv($handle, $contact->toArray());
        }

        fclose($handle);

        return response()->download($filename)->deleteFileAfterSend(true);
    }
    public function exportExcel()
{
    $contacts = Contact::select('name', 'email', 'subject', 'message', 'created_at')->get();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Name');
    $sheet->setCellValue('B1', 'Email');
    $sheet->setCellValue('C1', 'Subject');
    $sheet->setCellValue('D1', 'Message');
    $sheet->setCellValue('E1', 'Received At');

    $rowNumber = 2;
    foreach ($contacts as $contact) {
        $sheet->setCellValue('A' . $rowNumber, $contact->name);
        $sheet->setCellValue('B' . $rowNumber, $contact->email);
        $sheet->setCellValue('C' . $rowNumber, $contact->subject);
        $sheet->setCellValue('D' . $rowNumber, $contact->message);
        $sheet->setCellValue('E' . $rowNumber, $contact->created_at);
        $rowNumber++;
    }

    $writer = new Xlsx($spreadsheet);
    $fileName = 'contacts.xlsx';
    $writer->save($fileName);
    

    return response()->download($fileName)->deleteFileAfterSend(true);
}
}
//composer require phpoffice/phpspreadsheet
