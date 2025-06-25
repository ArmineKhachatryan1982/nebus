<?php

namespace App\Http\Controllers\API;

use App\Services\SaleService;
use Illuminate\Http\Request;

class SaleController extends BaseController
{
    public function __construct(protected SaleService $service){}
    /**
 * @OA\Get(
 *     path="/api/sales",
 *     summary="Получение данных о продажах с фильтрами",
 *     tags={"sales"},
 *     @OA\Parameter(
 *         name="dateFrom",
 *         in="query",
 *         description="Дата начала фильтра (YYYY-MM-DD)",
 *         required=false,
 *         @OA\Schema(type="string", format="date")
 *     ),
 *     @OA\Parameter(
 *         name="dateTo",
 *         in="query",
 *         description="Дата окончания фильтра (YYYY-MM-DD)",
 *         required=false,
 *         @OA\Schema(type="string", format="date")
 *     ),
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         description="Номер страницы для пагинации",
 *         required=false,
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Parameter(
 *         name="limit",
 *         in="query",
 *         description="Количество элементов на странице",
 *         required=false,
 *         @OA\Schema(type="integer", example=10)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Успешный ответ"
 *     )
 * )
 */
    public function __invoke(Request $request){

        $data = $this->service->getAllData($request->all());
        if ($data['status']) {
            return $this->sendResponse("Данные успешно сохранены в базу данных", 'success');
        }

       
        if (isset($data['errors'])) {
            return $this->sendError('Ошибка валидации', $data['errors']);
        }


        return $this->sendError('Данные отсутствуют');


    }
}
