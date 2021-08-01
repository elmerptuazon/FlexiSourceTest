<?php

namespace App\Services\Importer;

use Illuminate\Support\Facades\Http;
use  App\Models\Customer;

class ImportService implements IImportService
{
    private string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.random_user.url');
    }

    public function getData(string $nationality='au', string $result_limit='100') {
        $response = Http::get($this->baseUrl . "?nat=$nationality&results=$result_limit");
        $body = $response->json()["results"];
        
        for($i=0; $i<=(sizeof($body)-1); $i++) {
            $this->updateOrCreate($body[$i]);
        }

        return response()->json(['message' => 'Customers Registered'], 201);
    }

    private function updateOrCreate(array $data) {
        return Customer::updateOrCreate(
            ['email' => $data['email']],
            [
                'first_name' =>$data['name']['first'],
                'last_name' =>$data['name']['last'],
                'gender' =>$data['gender'],
                'country' =>$data['location']['country'],
                'city' =>$data['location']['city'],
                'username' =>$data['login']['username'],
                'password' =>md5($data['login']['password']),
                'phone' =>$data['phone'],
            ]
        );
    }

    
}
