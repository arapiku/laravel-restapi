<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

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

	public function show($id) {
    	$item = Item::findById($id);

    	if ($item == null) {
    		return response()->json([
			    'message' => 'Item not found',
		    ], 404);
	    }

	    return response()->json($item);
 	}
}
