<?php

class DbObject
{
	protected const TABLE_NAME = '';

	public function getTableName()
	{
		return static::TABLE_NAME;
	}
}