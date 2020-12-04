<?php

class UtilisateursManager 
{
	public static function add(Utilisateurs $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("INSERT INTO Utilisateurs (nomUtilisateur,prenomutilisateur,emailUtilisateur,pseudoUtilisateur,mdpUtilisateur,telUtilisateur,idRole) VALUES (:nomUtilisateur,:prenomutilisateur,:emailUtilisateur,:pseudoUtilisateur,:mdpUtilisateur,:telUtilisateur,:idRole)");
		$q->bindValue(":nomUtilisateur", $obj->getNomUtilisateur());
		$q->bindValue(":prenomutilisateur", $obj->getPrenomutilisateur());
		$q->bindValue(":emailUtilisateur", $obj->getEmailUtilisateur());
		$q->bindValue(":pseudoUtilisateur", $obj->getPseudoUtilisateur());
		$q->bindValue(":mdpUtilisateur", $obj->getMdpUtilisateur());
		$q->bindValue(":telUtilisateur", $obj->getTelUtilisateur());
		$q->bindValue(":idRole", $obj->getIdRole());
		$q->execute();
	}

	public static function update(Utilisateurs $obj)
	{
 		$db=DbConnect::getDb();
		$q=$db->prepare("UPDATE Utilisateurs SET idUtilisateur=:idUtilisateur,nomUtilisateur=:nomUtilisateur,prenomutilisateur=:prenomutilisateur,emailUtilisateur=:emailUtilisateur,pseudoUtilisateur=:pseudoUtilisateur,mdpUtilisateur=:mdpUtilisateur,telUtilisateur=:telUtilisateur,idRole=:idRole WHERE idUtilisateur=:idUtilisateur");
		$q->bindValue(":idUtilisateur", $obj->getIdUtilisateur());
		$q->bindValue(":nomUtilisateur", $obj->getNomUtilisateur());
		$q->bindValue(":prenomutilisateur", $obj->getPrenomutilisateur());
		$q->bindValue(":emailUtilisateur", $obj->getEmailUtilisateur());
		$q->bindValue(":pseudoUtilisateur", $obj->getPseudoUtilisateur());
		$q->bindValue(":mdpUtilisateur", $obj->getMdpUtilisateur());
		$q->bindValue(":telUtilisateur", $obj->getTelUtilisateur());
		$q->bindValue(":idRole", $obj->getIdRole());
		$q->execute();
	}
	public static function delete(Utilisateurs $obj)
	{
		$db=DbConnect::getDb();
		$db->exec("DELETE FROM messages WHERE idUtilisateur=" .$obj->getIdUtilisateur());
		$db->exec("DELETE FROM annonces WHERE idUtilisateur=" .$obj->getIdUtilisateur()); 
		$db->exec("DELETE FROM Utilisateurs WHERE idUtilisateur=" .$obj->getIdUtilisateur());
	}
	public static function findById($id)
	{
 		$db=DbConnect::getDb();
		$id = (int) $id;
		$q=$db->query("SELECT * FROM Utilisateurs WHERE idUtilisateur =".$id);
		$results = $q->fetch(PDO::FETCH_ASSOC);
		if($results != false)
		{
			return new Utilisateurs($results);
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
		$q = $db->query("SELECT * FROM Utilisateurs ORDER BY nomUtilisateur");
		while($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			if($donnees != false)
			{
				$liste[] = new Utilisateurs($donnees) ;
			}
		}
		return $liste;
	}

	public static function findByEmail($email)// recherche per pseudo utilisateur
    {
		$db = DbConnect::getDb();
        if (!in_array(";",str_split( $email))) // s'il n'y a pas de ; , je lance la requete
        {
            $q = $db->query("SELECT * FROM utilisateurs WHERE emailUtilisateur ='" . $email . "'");
            $results = $q->fetch(PDO::FETCH_ASSOC);
            if ($results != false)
            {
                return new Utilisateurs($results);
            }
            else
            {
                return false;
            }}
        else
        {
            return false;
        }
    }
}