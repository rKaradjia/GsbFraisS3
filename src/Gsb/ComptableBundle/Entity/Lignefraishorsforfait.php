<?php

namespace Gsb\ComptableBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lignefraishorsforfait
 *
 * @ORM\Table(name="lignefraishorsforfait")
 * @ORM\Entity(repositoryClass="Gsb\ComptableBundle\Repository\LignefraishorsforfaitRepository")
 */
class Lignefraishorsforfait
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
     * 
     * @ORM\ManyToOne(targetEntity="Gsb\ComptableBundle\Entity\Fichefrais")
     * @ORM\JoinColumn(nullable=false)
     **/
   private $idFicheFrais;

    /**
     * @var string
     *
     * @ORM\Column(name="mois", type="string", length=6)
     */
    private $mois;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=100, nullable=true)
     */
    private $libelle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="montant", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $montant;


    



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set mois
     *
     * @param string $mois
     *
     * @return Lignefraishorsforfait
     */
    public function setMois($mois)
    {
        $this->mois = $mois;

        return $this;
    }

    /**
     * Get mois
     *
     * @return string
     */
    public function getMois()
    {
        return $this->mois;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Lignefraishorsforfait
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Lignefraishorsforfait
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set montant
     *
     * @param string $montant
     *
     * @return Lignefraishorsforfait
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return string
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set idFicheFrais
     *
     * @param \Gsb\ComptableBundle\Entity\FicheFrais $idFicheFrais
     *
     * @return Lignefraishorsforfait
     */
    public function setIdFicheFrais(\Gsb\ComptableBundle\Entity\FicheFrais $idFicheFrais)
    {
        $this->idFicheFrais = $idFicheFrais;

        return $this;
    }

    /**
     * Get idFicheFrais
     *
     * @return \Gsb\ComptableBundle\Entity\FicheFrais
     */
    public function getIdFicheFrais()
    {
        return $this->idFicheFrais;
    }

    /**
     * Set ficheFrais
     *
     * @param \Gsb\ComptableBundle\Entity\FicheFrais $ficheFrais
     *
     * @return Lignefraishorsforfait
     */
    public function setFicheFrais(\Gsb\ComptableBundle\Entity\FicheFrais $ficheFrais)
    {
        $this->FicheFrais = $ficheFrais;

        return $this;
    }

    /**
     * Get ficheFrais
     *
     * @return \Gsb\ComptableBundle\Entity\FicheFrais
     */
    public function getFicheFrais()
    {
        return $this->FicheFrais;
    }
}
