<?php


class Use_matter
{
    private int $art_fk;
    private int $matter_fk;

    /**
     * @return int
     */
    public function getArtFk(): int
    {
        return $this->art_fk;
    }

    /**
     * @param int $art_fk
     */
    public function setArtFk(int $art_fk): self
    {
        $this->art_fk = $art_fk;
        return $this;
    }

    /**
     * @return int
     */
    public function getMatterFk(): int
    {
        return $this->matter_fk;
    }

    /**
     * @param int $matter_fk
     */
    public function setMatterFk(int $matter_fk): self
    {
        $this->matter_fk = $matter_fk;
        return $this;
    }
}