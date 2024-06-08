<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function download($filename)
    {
        $path = public_path('cv/' . $filename);

        if (file_exists($path)) {
            return Response::download($path, $filename);
        } else {
            abort(404, 'File not found');
        }
    }
}
