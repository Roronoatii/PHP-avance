<?php

class DbObject
{
	private const TABLE_NAME = '';
	private $columns = [];

	public function getCreatedAt()
	{
		$date = new DateTime($this->created_at);
		return $date->format('d/m/Y H:i:s');
	}

	public function getTableName()
	{
		return static::TABLE_NAME;
	}

	public function getColumns()
	{
		// $columns = [];
		// foreach ($this as $key => $value) {
		// 	if ($key != 'id') {
		// 		$columns[] = $key;
		// 	}
		// }
		// return $columns;
		foreach ($this->columns as $key => $value) {
			if ($key != 'id') {
				$columns[] = $key;
			}
		}
	}
}