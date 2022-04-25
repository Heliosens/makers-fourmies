<?php


class Use_resource
{
    private int $art_fk;
    private int $res_fk;

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
    public function getResFk(): int
    {
        return $this->res_fk;
    }

    /**
     * @param int $res_fk
     */
    public function setResFk(int $res_fk): self
    {
        $this->res_fk = $res_fk;
        return $this;
    }
}