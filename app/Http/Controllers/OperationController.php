<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operation;
use Illuminate\Support\Facades\File;

class OperationController extends Controller
{
    public function index()
    {
        $documents = Operation::all();
        return view('operations.index', compact('documents'));
    }

    public function scan()
    {

        return view('scan1');
    }
    public function upload(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'type' => 'required|string|in:preuve de livraison,fiche de renseignements,fiche expedition',
            'creation_date' => 'required|date',
            'expiration_date' => 'nullable|date|after_or_equal:creation_date', // Add validation for expiration_date
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

        $humanResource = new Operation([
            'title' => $title,
            'service' => $request->service,
            'type' => $request->type,
            'filter' => $request->filter,
            'creation_date' => $request->creation_date,
            'expiration_date' => $request->expiration_date,  // Include expiration date
            'file_path' => 'pdfs/' . $subDir . '/' . $pdfFileName
        ]);

        $humanResource->save();
        return response()->json(['message' => 'Document uploaded and saved successfully']);
    }
}
