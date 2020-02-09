<?php
namespace App\Command;

use Ramsey\Uuid\Uuid;

class AddNote
{
	private $id;
	private $title;
	private $description;

	public function __construct(Uuid $noteId, string $noteTitle, string $noteDescription)
	{
		$this->id = $noteId;
		$this->title = $noteTitle;
		$this->description = $noteDescription;
	}

	public function getId(): Uuid
	{
		return $this->id;
	}

	public function getTitle(): string
	{
		return $this->title;
	}

	public function getDescription(): string
	{
		return $this->description;
	}
}