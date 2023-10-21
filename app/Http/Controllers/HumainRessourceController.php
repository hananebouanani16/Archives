<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HumanResource;  // Import the HumanResource model
use Illuminate\Support\Facades\File;

class HumainRessourceController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->filter; 
    
        // Start with a query
        $query = HumanResource::query();
    
        // Check if it's an AJAX request
        if ($request->ajax()) {

            $documents = $query->where('type', 'Evenement Familar')->where('filter',$filter)->get();
            return view('rhs.table_rows', compact('documents'));  // assuming the blade file is named 'table.blade.php' in 'resources/views/partials' directory
        }
        $documents=HumanResource::all();
        return view('rhs.index', compact('documents', 'filter'));
    }
    

    public function scan()
    {

        return view('scan');
    }
    public function upload(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'type' => 'required|string|in:congé sans sold,Maternité,congé annuel,Maladi,Evenement Familar,contrat,passation',
            'filter' => 'nullable|string|in:mariage,décét,paternité',
            'creation_date' => 'required|date',
            'pdf_file' => 'required|mimes:pdf|max:4096',

        ]);


        $pdfsPath = public_path('pdfs');
        $subDir = $request->type;
        $fullPath = $pdfsPath . '/' . $subDir;

        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0775, true);
        }

        $title = $request->title;
        $pdfFileName = $title . '.pdf';

        if (File::exists($fullPath . '/' . $pdfFileName)) {
            return response()->json(['message' => 'A PDF with the same title already exists in the ' . $subDir . ' directory. Please choose a different title.'], 409);
        }

        $request->file('pdf_file')->move($fullPath, $pdfFileName);

        $humanResource = new HumanResource([
            'title' => $title,
            'service' => $request->service,
            'type' => $request->type,
            'filter' => $request->filter,
            'creation_date' => $request->creation_date,
            'file_path' => 'pdfs/' . $subDir . '/' . $pdfFileName
        ]);

        $humanResource->save();
        return response()->json(['message' => 'Document uploaded and saved successfully']);
    }
}
