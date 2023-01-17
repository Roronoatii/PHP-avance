<?php

class ContactForm extends DbObject
{
	const TABLE_NAME = 'contact_forms';
	public $id;
	public $fullname;
	public $phone;
	public $email;
	public $message;
	public $created_at;
}

?>