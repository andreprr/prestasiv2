<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class FileDownloadControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $filename = "DaciDigi v0.3.apk";
        $file = storage_path('app/cloudfolder/application/'.$filename);

        if (file_exists($file)) {
            // Increment download count, track stats, etc. if needed
            
            // Create the response object
            $response = new BinaryFileResponse($file);

            // Set additional headers
            $response->headers->set('Content-Disposition', 'inline; filename="' . $filename . '"');
            $response->headers->set('Content-Type', 'application/vnd.android.package-archive');

            // Return the response
            return $response;
        }

        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
