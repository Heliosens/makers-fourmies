<?php


class Matter
{
    private ?int $id_mat = null;
    private string $matter_name;

    /**
     * @return int|null
     */
    public function getIdMat(): ?int
    {
        return $this->id_mat;
    }

    /**
     * @param int|null $id_mat
     * @return Matter
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
     * @return Matter
     */
    public function setMatterName(string $matter_name): self
    {
        $this->matter_name = $matter_name;
        return $this;
    }

}