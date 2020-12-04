<?php

class MessagesManager 
{
	public static function add(Messages $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Messages (libelleMessage,contenueMessage,idDestinataire,idUtilisateur) VALUES (:libelleMessage,:contenueMessage,:idDestinataire,:idUtilisateur)");
		$q->bindValue(":libelleMessage", $obj->getLibelleMessage());
		$q->bindValue(":contenueMessage", $obj->getContenueMessage());
		$q->bindValue(":idDestinataire", $obj->getIdDestinataire());
		$q->bindValue(":idUtilisateur", $obj->getIdUtilisateur());
		$q->execute();
	}

	public static function update(Messages $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Messages SET idMessage=:idMessage,libelleMessage=:libelleMessage,contenueMessage=:contenueMessage,idDestinataire=:idDestinataire,idUtilisateur=:idUtilisateur WHERE idMessage=:idMessage");
		$q->bindValue(":idMessage", $obj->getIdMessage());
		$q->bindValue(":libelleMessage", $obj->getLibelleMessage());
		$q->bindValue(":contenueMessage", $obj->getContenueMessage());
		$q->bindValue(":idDestinataire", $obj->getIdDestinataire());
		$q->bindValue(":idUtilisateur", $obj->getIdUtilisateur());
		$q->execute();
	}
	public static function delete(Messages $obj)
	{
 		$db=DbConnect::getDb();
		$db->exec("DELETE FROM Messages WHERE idMessage=" .$obj->getIdMessage());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Messages WHERE idMessage =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Messages($results);
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
		$q = $db->query("SELECT * FROM Messages");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Messages($donnees);
			}
		}
		return $liste;
	}

	public static function getByUser($user)
	{
 		$db=DbConnect::getDb();
		$liste = [];
		$q = $db->query("SELECT * FROM Messages WHERE idUtilisateur =".$user->getIdUtilisateur());
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Messages($donnees);
			}
		}
		return $liste;
	}

	public static function getByDestinataire($user)
	{
 		$db=DbConnect::getDb();
		$liste = [];
		$q = $db->query("SELECT * FROM Messages WHERE idDestinataire =".$user->getIdUtilisateur());
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Messages($donnees);
			}
		}
		return $liste;
	}
}