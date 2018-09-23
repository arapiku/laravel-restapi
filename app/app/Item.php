<?php

namespace App;

use DB;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 * @package App
 *
 */
class Item extends Model
{
    // テーブル名
	protected $table = 'item';
	// 挿入対象カラム
	protected $fillable = ['name', 'description', 'price'];

	/**
	 * 全件取得
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public static function findByAll() {
		return Item::all();
	}

	/**
	 * ID検索
	 * @param $id
	 *
	 * @return mixed
	 */
	public static function findById($id) {
		return Item::find($id);
	}

	/**
	 * 新規作成
	 * @param $input
	 *
	 * @return mixed
	 */
	public static function store($input) {

		return DB::transaction(function() use ($input) {
			$item = (new Item())->fill($input->toArray());

			$item->save();

			return $item;
		});

	}

	/**
	 * 更新
	 * @param $input
	 * @param $id
	 *
	 * @return mixed
	 */
	public static function updateItem($input, $id) {

		return DB::transaction(function() use ($input, $id) {
			$item = Item::findOrFail($id);

			$item->update($input->toArray());

			return $item;
		});

	}

	/**
	 * 削除
	 * @param $id
	 *
	 * @return mixed
	 */
	public static function deleteItem($id) {

		return DB::transaction(function() use ($id) {
			$item = Item::findOrFail($id);

			$item->delete();

			return $item;
		});

	}
}
