<?php
namespace App\Command;

use Ramsey\Uuid\Uuid;

class DeleteNote
{
	private $id;

	public function __construct(Uuid $noteId)
	{
		$this->id = $noteId;
	}

	public function getId(): Uuid
	{
		return $this->id;
	}
}