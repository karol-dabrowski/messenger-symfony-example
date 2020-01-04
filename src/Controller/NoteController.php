<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class NoteController extends AbstractController
{
	/**
	 * @Route("/note/add", methods={"POST"})
	 */
	public function add(Request $request)
	{
		$noteTitle = $request->get("noteTitle");
		$noteDescription = $request->get("noteDescription");
		dd($noteTitle, $noteDescription);
		//TODO Add new note
	}

	/**
	 * @Route("/note/delete/{noteId}", methods={"POST"}, requirements={"noteId"="\d+"})
	 */
	public function delete(int $noteId)
	{
		dd($noteId);
		//TODO Delete note with id $noteId
	}
}