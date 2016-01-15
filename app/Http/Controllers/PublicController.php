<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Semantics;
use Comments;
use App\Classes\Dialog\Entity;
use App\Classes\Dialog\Property;
use App\Classes\Dialog\Comment;

class PublicController extends Controller {

    public function __construct() {
	// la méthode de recherche est uniquement disponible en ajax
	$this->middleware('ajax', ['only' => ['anySearchEntity']]);
    }

    /**
     * Montre la page d'index
     * @return type
     */
    public function anyIndex() {
	$entity = new Entity("uRI","namebabar",'type','image');
	$property = new Property("uri", "is child of","babybel","oeuvre",$entity);
	$comment = new Comment("babibel", "babibel@yopmail.com", "I enjoyed it !!!");
//	$ret = Semantics::AddEntity($entity);
//	$ret = Semantics::RemoveEntity($entity);
//	$ret = Semantics::SetEntityProperty($entity,$property);
//	$ret = Semantics::RemoveEntityObjectProperty($entity,$property);
//	$ret = Semantics::RemoveEntityObjectPropertyWithObject($entity,$property);
//	$ret = Semantics::LoadEntityProperties($entity);
//	$ret = Semantics::SearchOurEntitiesFromText("our");
//	$ret = Semantics::SearchAllEntitiesFromText("all");
//	$ret = Comments::AddComment($comment);
//	$ret = Comments::GrantComment($comment);
//	$ret = Comments::RemoveComment($comment);
//	$ret = Comments::LoadComment($entity);
	
//	var_dump($ret);
	return view('welcome');
    }

    /**
     * Affiche une entité
     * @param string $uid
     * @return type
     */
    public function anyEntity($uid) {
	$comments = array(array('Robin', 'très belle oeuvre'),
	    array('Riad', 'wallah elle chill cette tablette'),
	    array('Corentin', 'moi aime pas trop'),
	    array("$uid", "uid de la page"));

	$infos = array(array('Artiste', 'Jacques Louis David'),
	    array('Période', 'Néo-Classicisme'),
	    array('Support', 'Peinture à l\'huile'),
	    array('Lieu', 'Musée du Louvre'));

	$itemName = 'Le sacre de Napoléon';

	$data = array(
	    'comments' => $comments,
	    'infos' => $infos,
	    'itemName' => $itemName
	);
	return view('informations')->with($data);
    }

    /**
     * Renvoie les recherche d'un tableau
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function anySearchEntity(Request $request) {
	if (!$request->has("needle")) {
	    return response()->json([]);
	}
	return response()->json(array(
		    array("label" => "Leonard De Vinci", "category" => "Activite", "id" => "1"),
		    array("label" => "Leonard De Vinci", "category" => "Activite", "id" => "1"),
		    array("label" => "Leonard De Vinci", "category" => "Activite", "id" => "1"),
		    array("label" => "David Bowie", "category" => "Evènement", "id" => "2"),
		    array("label" => "David Bowie", "category" => "Evènement", "id" => "2"),
		    array("label" => "David Bowie", "category" => "Lieu", "id" => "2"),
		    array("label" => "David Bowie", "category" => "Lieu", "id" => "2"),
		    array("label" => "La Joconde", "category" => "Organisation", "id" => "3"),
		    array("label" => "La Joconde", "category" => "Organisation", "id" => "3"),
		    array("label" => "La Joconde", "category" => "Objet", "id" => "3"),
		    array("label" => "La Joconde", "category" => "Objet", "id" => "3"),
		    array("label" => "La Joconde", "category" => "Personne", "id" => "3"),
		    array("label" => "La Joconde", "category" => "Personne", "id" => "3"),
		    array("label" => "La Joconde", "category" => "Oeuvre", "id" => "3"),
		    array("label" => "La Joconde", "category" => "Oeuvre", "id" => "3"),
	));
    }

}
