<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variation;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class API_Controller extends Controller
{
    use HttpResponse;
    /**
     * --------------------------------------------------------
     *  handle the Get Product Api
     * --------------------------------------------------------
     * 
     * @contributor Shahria Sunnah   <sunnahshahria@gmail.com>
     * @last_modified october 08, 2023
     */
    public function GetProduct()
    {
        try {
            $products = Product::with('variations')->get();

            return response()->json([
                'data' => $products,
            ]);

            return response($products);
        } catch (\Exception $e) {

            return $this->sendError($e->getMessage(), [], 500);
        }
    }
}
