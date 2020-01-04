<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NoteController extends AbstractController
{
	/**
	 * @Route("/note/delete/{noteId}", methods={"POST"}, requirements={"noteId"="\d+"})
	 */
	public function delete($noteId)
	{
		dd($noteId);
		//TODO Delete note with id $noteId
	}
}