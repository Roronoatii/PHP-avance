<?php

class DbObject
{
	protected const TABLE_NAME = '';
	protected $created_at;

	public function getCreatedAt()
	{
		$date = new DateTime($this->created_at);
		return $date->format('d/m/Y H:i:s');
	}

	public function getTableName()
	{
		return static::TABLE_NAME;
	}
}