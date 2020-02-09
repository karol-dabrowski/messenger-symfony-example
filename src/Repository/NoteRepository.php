<?php

namespace App\Repository;

use App\Entity\Note;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Ramsey\Uuid\Uuid;

class NoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Note::class);
    }

    public function noteWithTitleExists(string $title): bool
    {
    	return !is_null($this->getNoteByTitle($title));
    }

	public function getNoteByTitle(string $title): ?Note
	{
		return $this->findOneBy(['title' => $title]);
	}

	public function findOneById(Uuid $id): ?Note
	{
		return $this->findOneBy(['id' => $id]);
	}
}
