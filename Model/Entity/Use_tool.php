<?php


class Use_tool
{
    private int $art_fk;
    private int $tool_fk;

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
    public function getToolFk(): int
    {
        return $this->tool_fk;
    }

    /**
     * @param int $tool_fk
     */
    public function setToolFk(int $tool_fk): self
    {
        $this->tool_fk = $tool_fk;
        return $this;
    }
}