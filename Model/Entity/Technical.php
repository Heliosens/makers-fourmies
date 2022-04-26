<?php


class Technical
{
    private ?int $id_tech =null;
    private string $technical_name;

    /**
     * @return int|null
     */
    public function getIdTech(): ?int
    {
        return $this->id_tech;
    }

    /**
     * @param int|null $id_tech
     */
    public function setIdTech(?int $id_tech): self
    {
        $this->id_tech = $id_tech;
        return $this;
    }

    /**
     * @return string
     */
    public function getTechnicalName(): string
    {
        return $this->technical_name;
    }

    /**
     * @param string $technical_name
     */
    public function setTechnicalName(string $technical_name): self
    {
        $this->technical_name = $technical_name;
        return $this;
    }
}