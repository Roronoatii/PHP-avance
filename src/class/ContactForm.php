<?php

class ContactForm extends DbObject
{
	public $id;
	public $fullname;
	public $phone;
	public $email;
	public $message;
	public $created_at;

	public $columns = [$id, $fullname, $phone, $email, $message, $created_at];

	const TABLE_NAME = 'contact_forms';

}

?>