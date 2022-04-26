<?php


class Matter
{
    private ?int $id_mat = null;
    private string $matter_name;
    private string $origin;

    /**
     * @return int|null
     */
    public function getIdMat(): ?int
    {
        return $this->id_mat;
    }

    /**
     * @param int|null $id_mat
     */
    public function setIdMat(?int $id_mat): self
    {
        $this->id_mat = $id_mat;
        return $this;
    }

    /**
     * @return string
     */
    public function getMatterName(): string
    {
        return $this->matter_name;
    }

    /**
     * @param string $matter_name
     */
    public function setMatterName(string $matter_name): self
    {
        $this->matter_name = $matter_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrigin(): string
    {
        return $this->origin;
    }

    /**
     * @param string $origin
     */
    public function setOrigin(string $origin): self
    {
        $this->origin = $origin;
        return $this;
    }
}