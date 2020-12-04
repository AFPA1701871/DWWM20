<?php

class Annonces 
{

	/*****************Attributs***************** */

	private $_idAnnonce;
	private $_titreAnnonce;
	private $_lienImg;
	private $_libelleAnnonce;
	private $_prixAnnonce;
	private $_datePublication;
	private $_statutAnnonce;
	private $_idUtilisateur;
	private $_idCategorie;

	/***************** Accesseurs ***************** */


	public function getIdAnnonce()
	{
		return $this->_idAnnonce;
	}

	public function setIdAnnonce(int $idAnnonce)
	{
		$this->_idAnnonce=$idAnnonce;
	}

	public function getTitreAnnonce()
	{
		return $this->_titreAnnonce;
	}

	public function setTitreAnnonce($titreAnnonce)
	{
		$this->_titreAnnonce=$titreAnnonce;
	}

	public function getLienImg()
	{
		return $this->_lienImg;
	}

	public function setLienImg($lienImg)
	{
		$this->_lienImg=$lienImg;
	}

	public function getLibelleAnnonce()
	{
		return $this->_libelleAnnonce;
	}

	public function setLibelleAnnonce($libelleAnnonce)
	{
		$this->_libelleAnnonce=$libelleAnnonce;
	}

	public function getPrixAnnonce()
	{
		return $this->_prixAnnonce;
	}

	public function setPrixAnnonce(float $prixAnnonce)
	{
		$this->_prixAnnonce=$prixAnnonce;
	}

	public function getDatePublication()
	{
		return $this->_datePublication;
	}

	public function setDatePublication($datePublication)
	{
		$this->_datePublication=$datePublication;
	}

	public function getStatutAnnonce()
	{
		return $this->_statutAnnonce;
	}

	public function setStatutAnnonce(int $statutAnnonce)
	{
		$this->_statutAnnonce=$statutAnnonce;
	}

	public function getIdUtilisateur()
	{
		return $this->_idUtilisateur;
	}

	public function setIdUtilisateur(int $idUtilisateur)
	{
		$this->_idUtilisateur=$idUtilisateur;
	}

	public function getIdCategorie()
	{
		return $this->_idCategorie;
	}

	public function setIdCategorie(int $idCategorie)
	{
		$this->_idCategorie=$idCategorie;
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
		return "IdAnnonce : ".$this->getIdAnnonce()."TitreAnnonce : ".$this->getTitreAnnonce()."LienImg : ".$this->getLienImg()."LibelleAnnonce : ".$this->getLibelleAnnonce()."PrixAnnonce : ".$this->getPrixAnnonce()."DatePublication : ".$this->getDatePublication()."StatutAnnonce : ".$this->getStatutAnnonce()."IdUtilisateur : ".$this->getIdUtilisateur()."IdCategorie : ".$this->getIdCategorie()."\n";
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