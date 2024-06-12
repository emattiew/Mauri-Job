<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public function download($filename)
    {
        // Sanitize the filename to prevent path traversal attacks
        $filename = basename($filename);

        $path = public_path('cvs/' . $filename);

        if (file_exists($path)) {
            return Response::download($path, $filename);
        } else {
            return abort(404, 'File not found');
        }
    }
}