<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Importer\IImportService;
use  App\Models\Customer;

class CustomerController extends Controller
{

    private IImportService $importService;

    public function __construct(IImportService $importService)
    {
        $this->importService = $importService;
    }

    public function getAll() {

        $data = Customer::selectRaw("CONCAT(first_name, ' ',last_name) as fullname, email, country")->get();

        return response()->json(['customers' => $data, 'message' => 'Success'], 200);
    }

    public function getOne($customer) {
        $data = Customer::selectRaw("CONCAT(first_name, ' ',last_name) as fullname,email,username,gender, country,city,phone")
        ->where('id', '=', $customer)->get();

        return response()->json(['customers' => $data, 'message' => 'Success'], 200);
    }
}
