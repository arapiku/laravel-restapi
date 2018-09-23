<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemFormRequest;
use App\Item;
use Symfony\Component\HttpFoundation\Response as StatusCode;

class ItemsController extends Controller
{
	/**
	 * 全件取得
	 * @return \Illuminate\Http\JsonResponse
	 */
    public function index() {
		$all_items = Item::findByAll();

		if ($all_items->isEmpty()) {
			return response()->json([
				'message' => 'Item not found',
			], StatusCode::HTTP_NOT_FOUND);
		}

		return response()->json($all_items);
	}

	/**
	 * ID検索
	 *
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function show($id) {
    	$item = Item::findById($id);

    	if ($item == null) {
    		return response()->json([
			    'message' => 'Item not found',
		    ], StatusCode::HTTP_NOT_FOUND);
	    }

	    return response()->json($item);
 	}

	/**
	 * 新規作成
	 * @param ItemFormRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
 	public function store(ItemFormRequest $request) {
		$item = Item::store($request);

		return response()->json($item, StatusCode::HTTP_CREATED);
    }


	/**
	 * 更新
	 *
	 * @param ItemFormRequest $request
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
    public function update(ItemFormRequest $request, $id) {
		$updateItem = Item::updateItem($request, $id);

		return response()->json($updateItem, StatusCode::HTTP_OK);
    }

	/**
	 * 削除
	 *
	 * @param $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
    public function destroy($id){
    	$item = Item::deleteItem($id);

    	return response()->json($item, StatusCode::HTTP_NO_CONTENT);
    }
}
