<?php

namespace App;

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
}
