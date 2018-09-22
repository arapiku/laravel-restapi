<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemFormRequest;
use App\Item;

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
			], 404);
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
		    ], 404);
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

		return response()->json($item, 201);
    }
}
