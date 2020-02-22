<?php
namespace App\Event;

use Ramsey\Uuid\Uuid;

class NoteCreated
{
	private $noteId;

	public function __construct(Uuid $noteId)
	{
		$this->noteId = $noteId;
	}

	public function getNoteId(): Uuid
	{
		return $this->noteId;
	}
}