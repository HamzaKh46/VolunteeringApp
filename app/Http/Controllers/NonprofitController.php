<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class NonprofitController extends Controller
{
    public function search(Request $request)
{
    $query = $request->input('query');
    
    $baseUrl = config('services.everyorg.base_url');
    $authHeader = 'Basic ' . base64_encode(config('services.everyorg.public_key') . ':' . config('services.everyorg.private_key'));

    $response = Http::withHeaders([
        'Authorization' => $authHeader,
        'Content-Type' => 'application/json',
    ])->get("{$baseUrl}/search/{$query}", [ 
    ]);

    if ($response->successful()) {
        $nonprofits = $response->json(); 
    } else {
        $nonprofits = null;
        
    }
    //dd($nonprofits);

    return view('nonprofits.search', compact('nonprofits', 'query'));
}

}
