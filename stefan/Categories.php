<?php 

class Categories extends ActiveRecord {
	public $id, $name, $description;
	public static $table = "categories";
	public static $key = "id";
}
