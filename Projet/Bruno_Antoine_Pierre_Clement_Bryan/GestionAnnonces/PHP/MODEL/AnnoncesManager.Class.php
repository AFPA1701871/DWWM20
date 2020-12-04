<?php

class AnnoncesManager 
{
	public static function add(Annonces $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Annonces (titreAnnonce,lienImg,libelleAnnonce,prixAnnonce,datePublication,statutAnnonce,idUtilisateur,idCategorie) VALUES (:titreAnnonce,:lienImg,:libelleAnnonce,:prixAnnonce,:datePublication,:statutAnnonce,:idUtilisateur,:idCategorie)");
		$q->bindValue(":titreAnnonce", $obj->getTitreAnnonce());
		$q->bindValue(":lienImg", $obj->getLienImg());
		$q->bindValue(":libelleAnnonce", $obj->getLibelleAnnonce());
		$q->bindValue(":prixAnnonce", $obj->getPrixAnnonce());
		$q->bindValue(":datePublication", $obj->getDatePublication());
		$q->bindValue(":statutAnnonce", $obj->getStatutAnnonce());
		$q->bindValue(":idUtilisateur", $obj->getIdUtilisateur());
		$q->bindValue(":idCategorie", $obj->getIdCategorie());
		$q->execute();
	}

	public static function update(Annonces $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Annonces SET idAnnonce=:idAnnonce,titreAnnonce=:titreAnnonce,lienImg=:lienImg,libelleAnnonce=:libelleAnnonce,prixAnnonce=:prixAnnonce,datePublication=:datePublication,statutAnnonce=:statutAnnonce,idUtilisateur=:idUtilisateur,idCategorie=:idCategorie WHERE idAnnonce=:idAnnonce");
		$q->bindValue(":idAnnonce", $obj->getIdAnnonce());
		$q->bindValue(":titreAnnonce", $obj->getTitreAnnonce());
		$q->bindValue(":lienImg", $obj->getLienImg());
		$q->bindValue(":libelleAnnonce", $obj->getLibelleAnnonce());
		$q->bindValue(":prixAnnonce", $obj->getPrixAnnonce());
		$q->bindValue(":datePublication", $obj->getDatePublication());
		$q->bindValue(":statutAnnonce", $obj->getStatutAnnonce());
		$q->bindValue(":idUtilisateur", $obj->getIdUtilisateur());
		$q->bindValue(":idCategorie", $obj->getIdCategorie());
		$q->execute();
	}
	public static function delete(Annonces $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Annonces WHERE idAnnonce=" .$obj->getIdAnnonce());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Annonces WHERE idAnnonce =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Annonces($results);
		}
		else
		{
			return false;
		}
	}
	public static function getList()
	{
 		$db=DbConnect::getDb();
		$liste = [];
		$q = $db->query("SELECT * FROM Annonces");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Annonces($donnees);
			}
		}
		return $liste;
	}

	public static function getByUser($user)
	{
		$db=DbConnect::getDb();	
		$liste = [];
		$q=$db->query("SELECT * FROM Annonces WHERE idUtilisateur =".$user->getIdUtilisateur());
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Annonces($donnees);
			}
		}
		return $liste;
	}

	public static function getByCategorie($categorie)
	{
		$db=DbConnect::getDb();
		$liste = [];
		$q=$db->query("SELECT * FROM Annonces WHERE idCategorie =".$categorie->getIdCategorie());
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Annonces($donnees);
			}
		}
			return $liste;
	}

}