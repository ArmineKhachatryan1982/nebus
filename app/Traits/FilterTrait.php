<?php
namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait FilterTrait
{

    public function filter(array $data,$route_name){

        $host = config('services.wb.host');
        $key = config('services.wb.key');

        $params = [
            'dateFrom' => $data['dateFrom'] ?? null,
            'dateTo'   => $data['dateTo'] ?? null,
            'page'     => $data['page'] ?? null,
            'limit'    => $data['limit'] ?? null,
            'key'      => $key,
        ];
        $params = array_filter($params, fn($v) => !is_null($v));

        $response = Http::get("$host/api/$route_name", $params);

        return $response->json();

    }

}
