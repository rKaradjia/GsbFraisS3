<?php 

namespace Gsb\VisiteurBundle\Entity;






class Connection
{
    protected $saisieid;
    protected $saisiemdp;

    public function getSaisieid()
    {
        return $this->saisieid;
    }

    public function setSaisieid($saisieid)
    {
        $this->saisieid = $saisieid;
    }

    public function getSaisiemdp()
    {
        return $this->saisiemdp;
    }

    public function setSaisiemdp(/*\DateTime $dueDate = null*/$saisiemdp)
    {
        $this->saisiemdp = $saisiemdp;
    }
}
?>
