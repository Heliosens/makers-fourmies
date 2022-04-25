<?php


class Own_category
{
    private int $art_fk;
    private int $cat_fk;

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
    public function getCatFk(): int
    {
        return $this->cat_fk;
    }

    /**
     * @param int $cat_fk
     */
    public function setCatFk(int $cat_fk): self
    {
        $this->cat_fk = $cat_fk;
        return $this;
    }
}