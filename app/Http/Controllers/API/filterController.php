<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\FilterService;
use Illuminate\Http\Request;

class filterController extends Controller
{
    public function __construct(protected FilterService $service){}
    public function __invoke(Request $request){

        $data = $this->service->filterData($request->all());
        if ($data['status']) {
            return $this->sendResponse("Данные успешно сохранены в базу данных", 'success');
        }

        // Если есть ошибки — вернуть их
        if (isset($data['errors'])) {
            return $this->sendError('Ошибка валидации', $data['errors']);
        }


        return $this->sendError('Данные отсутствуют');


    }
}
