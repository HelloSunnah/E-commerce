<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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



    /**
     * --------------------------------------------------------
     *  handle the coming data through app
     * --------------------------------------------------------
     * 
     * @contributor Shahria Sunnah   <sunnahshahria@gmail.com>
     * @last_modified october 08, 2023
     */

    public function Product_store(Request $request)
    {
        {
            $validator = Validator::make($request->all(), [
                "order_id" => "required|exists:users,id",
                "product_id" => "required",
                "payment_method" => "required"
            ]);
    
            if($validator->fails())
            {
                return $this->sendError("Validation Error.", $validator->errors()->toArray(), 403);
            }
    
            try
            {
                $inputs = [
                    "order_id"  =>  $request->order_id,
                    "product_id"  => $request->product_id,
                    "payment_method"  => $request->payment_method,
                ];
    
             
    
                g::create($inputs);
    
                return $this->sendSuccess("created successfully");
            }
            catch(\Exception $e)
            {
                return $this->sendError($e->getMessage());
            }
        }
    }
}
