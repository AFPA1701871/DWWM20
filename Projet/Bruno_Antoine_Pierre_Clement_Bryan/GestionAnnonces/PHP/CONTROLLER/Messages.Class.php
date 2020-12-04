<?php

class Messages 
{

	/*****************Attributs***************** */

	private $_idMessage;
	private $_libelleMessage;
	private $_contenueMessage;
	private $_idDestinataire;
	private $_idUtilisateur;

	/***************** Accesseurs ***************** */


	public function getIdMessage()
	{
		return $this->_idMessage;
	}

	public function setIdMessage(int $idMessage)
	{
		$this->_idMessage=$idMessage;
	}

	public function getLibelleMessage()
	{
		return $this->_libelleMessage;
	}

	public function setLibelleMessage($libelleMessage)
	{
		$this->_libelleMessage=$libelleMessage;
	}

	public function getContenueMessage()
	{
		return $this->_contenueMessage;
	}

	public function setContenueMessage($contenueMessage)
	{
		$this->_contenueMessage=$contenueMessage;
	}

	public function getIdDestinataire()
	{
		return $this->_idDestinataire;
	}

	public function setIdDestinataire(int $idDestinataire)
	{
		$this->_idDestinataire=$idDestinataire;
	}

	public function getIdUtilisateur()
	{
		return $this->_idUtilisateur;
	}

	public function setIdUtilisateur(int $idUtilisateur)
	{
		$this->_idUtilisateur=$idUtilisateur;
	}

	/*****************Constructeur***************** */

	public function __construct(array $options = [])
	{
 		if (!empty($options)) // empty : renvoi vrai si le tableau est vide
		{
			$this->hydrate($options);
		}
	}
	public function hydrate($data)
	{
 		foreach ($data as $key => $value)
		{
 			$methode = "set".ucfirst($key); //ucfirst met la 1ere lettre en majuscule
			if (is_callable(([$this, $methode]))) // is_callable verifie que la methode existe
			{
				$this->$methode($value);
			}
		}
	}

	/*****************Autres Méthodes***************** */

	/**
	* Transforme l'objet en chaine de caractères
	*
	* @return String
	*/
	public function toString()
	{
		return "IdMessage : ".$this->getIdMessage()."LibelleMessage : ".$this->getLibelleMessage()."ContenueMessage : ".$this->getContenueMessage()."IdDestinataire : ".$this->getIdDestinataire()."IdUtilisateur : ".$this->getIdUtilisateur()."\n";
	}


	
	/* Renvoit Vrai si lobjet en paramètre est égal 
	* à l'objet appelant
	*
	* @param [type] $obj
	* @return bool
	*/
	public function equalsTo($obj)
	{
		return;
	}


	/**
	* Compare l'objet à un autre
	* Renvoi 1 si le 1er est >
	*        0 si ils sont égaux
	*      - 1 si le 1er est <
	*
	* @param [type] $obj1
	* @param [type] $obj2
	* @return Integer
	*/
	public function compareTo($obj)
	{
		return;
	}
}