<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class FundraiserController extends Controller
{

    public function showFundraiserDetails(Request $request, $nonprofitIdentifier, $fundraiserIdentifier)
{
    $publicKey = config('services.everyorg.public_key');
    $baseUrl = 'https://partners.every.org/v0.2';
    
    $fundraiserResponse = Http::get("{$baseUrl}/nonprofit/{$nonprofitIdentifier}/fundraiser/{$fundraiserIdentifier}", [
        'apiKey' => $publicKey,
    ]);
    
    $fundraiser = $fundraiserResponse->successful() ? $fundraiserResponse->json() : null;
    
    $raisedResponse = Http::get("{$baseUrl}/nonprofit/{$nonprofitIdentifier}/fundraiser/{$fundraiserIdentifier}/raised", [
        'apiKey' => $publicKey,
    ]);
    
    $raisedDetails = $raisedResponse->successful() ? $raisedResponse->json() : null;


    $goalAmount = $raisedDetails['goalAmount'] ?? $fundraiser['data']['fundraiser']['goalAmount'] ?? 0;
    $supporters = $raisedDetails['supporters'] ?? 0;
    $raised = $raisedDetails['raised'] ?? 0;
    
    //dd($fundraiser,$raisedDetails);
    return view('fundraisers.show', compact('fundraiser', 'goalAmount', 'supporters','raised'));
}




}
