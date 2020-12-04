<?php

class Langue
{

	/*****************Attributs***************** */

	private $_idLangue;
	private $_nomLangue;
	private $_codeLangue;
	private $_texteLangue;

	/***************** Accesseurs ***************** */


	public function getIdLangue()
	{
		return $this->_idLangue;
	}

	public function setIdLangue($idLangue)
	{
		$this->_idLangue=$idLangue;
	}

	public function getNomLangue()
	{
		return $this->_NomLangue;
	}

	public function setNomLangue($NomLangue)
	{
		$this->_NomLangue=$NomLangue;
	}

	public function getCodeLangue()
	{
		return $this->_codeLangue;
	}

	public function setCodeLangue($codeLangue)
	{
		$this->_codeLangue=$codeLangue;
	}

	public function getTexteLangue()
	{
		return $this->_TexteLangue;
	}

	public function setTexteLangue($TexteLangue)
	{
		$this->_TexteLangue=$TexteLangue;
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
		return "idLangue : ".$this->getIdLangue()."nomLangue : ".$this->getNomLangue()."CodeLangue : ".$this->getCodeLangue()."TexteLangue : ".$this->getTexteLangue()."\n";
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