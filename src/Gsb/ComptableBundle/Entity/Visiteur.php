<?php

namespace Gsb\ComptableBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visiteur
 *
 * @ORM\Table(name="visiteur")
 * @ORM\Entity(repositoryClass="Gsb\ComptableBundle\Repository\VisiteurRepository")
 */
class Visiteur
{
    
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=30, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=20, nullable=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=20, nullable=true)
     */
    private $mdp;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=30, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=5, nullable=true)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=30, nullable=true)
     */
    private $ville;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEmbauche", type="date", nullable=true)
     */
    private $dateEmbauche;

    /**
     * @var int
     *
     * @ORM\Column(name="typeAccount", type="integer", nullable=true)
     */
    private $typeAccount;
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Visiteur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Visiteur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Visiteur
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set mdp
     *
     * @param string $mdp
     *
     * @return Visiteur
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get mdp
     *
     * @return string
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Visiteur
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set cp
     *
     * @param string $cp
     *
     * @return Visiteur
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Visiteur
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set dateEmbauche
     *
     * @param \DateTime $dateEmbauche
     *
     * @return Visiteur
     */
    public function setDateEmbauche($dateEmbauche)
    {
        $this->dateEmbauche = $dateEmbauche;

        return $this;
    }

    /**
     * Get dateEmbauche
     *
     * @return \DateTime
     */
    public function getDateEmbauche()
    {
        return $this->dateEmbauche;
    }
    
    
    
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $lignefraisforfait;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $etat;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lignefraisforfait = new \Doctrine\Common\Collections\ArrayCollection();
        $this->etat = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add lignefraisforfait
     *
     * @param \Gsb\ComptableBundle\Entity\Lignefraisforfait $lignefraisforfait
     *
     * @return Visiteur
     */
    public function addLignefraisforfait(\Gsb\ComptableBundle\Entity\Lignefraisforfait $lignefraisforfait)
    {
        $this->lignefraisforfait[] = $lignefraisforfait;

        return $this;
    }

    /**
     * Remove lignefraisforfait
     *
     * @param \Gsb\ComptableBundle\Entity\Lignefraisforfait $lignefraisforfait
     */
    public function removeLignefraisforfait(\Gsb\ComptableBundle\Entity\Lignefraisforfait $lignefraisforfait)
    {
        $this->lignefraisforfait->removeElement($lignefraisforfait);
    }

    /**
     * Get lignefraisforfait
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLignefraisforfait()
    {
        return $this->lignefraisforfait;
    }

    /**
     * Add etat
     *
     * @param \Gsb\ComptableBundle\Entity\Etat $etat
     *
     * @return Visiteur
     */
    public function addEtat(\Gsb\ComptableBundle\Entity\Etat $etat)
    {
        $this->etat[] = $etat;

        return $this;
    }

    /**
     * Remove etat
     *
     * @param \Gsb\ComptableBundle\Entity\Etat $etat
     */
    public function removeEtat(\Gsb\ComptableBundle\Entity\Etat $etat)
    {
        $this->etat->removeElement($etat);
    }

    /**
     * Get etat
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set typeAccount
     *
     * @param integer $typeAccount
     *
     * @return Visiteur
     */
    public function setTypeAccount($typeAccount)
    {
        $this->typeAccount = $typeAccount;

        return $this;
    }

    /**
     * Get typeAccount
     *
     * @return integer
     */
    public function getTypeAccount()
    {
        return $this->typeAccount;
    }
}
