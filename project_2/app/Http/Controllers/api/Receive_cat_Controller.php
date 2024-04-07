<?php

namespace App\Http\Controllers\api;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class Receive_cat_Controller extends Controller
{
    public function receive_project1_data(Request $request)
{
    $curl = curl_init();
    $url = 'http://localhost/viva/it_waybd/project_1/public/api/get_cat';
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);

    if ($response === false) {
        return response()->json(['error' => 'Error: ' . curl_error($curl)], 500);
    }
    $data = json_decode($response, true);
    if ($data === null) {
        // dd($data);
        return response()->json(['error' => 'Error decoding JSON'], 500);
    }
    try {
        // Perform additional validation or processing here
        if (strtotime($data['time']) === time()) {
            $category = Category::updateOrCreate(
                ['name' => $data['cat_name']],
                ['time' => $data['time']]
            );
            return response()->json(['message' => 'Category data received successfully', 'category' => $category], 200);
        } else {
            return response()->json(['error' => 'Time validation failed'], 422);
        }
    } catch (Exception $e) {
        return response()->json(['error' => 'Failed to process category data', 'message' => $e->getMessage()], 500);
    } finally {
        curl_close($curl);
    }
}
}
