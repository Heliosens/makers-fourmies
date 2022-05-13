<?php


class Art_tech
{
    private int $art_fk;
    private int $tech_fk;

    /**
     * @return int
     */
    public function getArtFk(): int
    {
        return $this->art_fk;
    }

    /**
     * @param int $art_fk
     * @return Art_tech
     */
    public function setArtFk(int $art_fk): self
    {
        $this->art_fk = $art_fk;
        return $this;
    }

    /**
     * @return int
     */
    public function getTechFk(): int
    {
        return $this->tech_fk;
    }

    /**
     * @param int $tech_fk
     * @return Art_tech
     */
    public function setTechFk(int $tech_fk): self
    {
        $this->tech_fk = $tech_fk;
        return $this;
    }
}