<?php


class Technique
{
    private ?int $id_tech =null;
    private string $technique;

    /**
     * @return int|null
     */
    public function getIdTech(): ?int
    {
        return $this->id_tech;
    }

    /**
     * @param int|null $id_tech
     * @return Technique
     */
    public function setIdTech(?int $id_tech): self
    {
        $this->id_tech = $id_tech;
        return $this;
    }

    /**
     * @return string
     */
    public function getTechnique(): string
    {
        return $this->technique;
    }

    /**
     * @param string $technique
     * @return Technique
     */
    public function setTechnique(string $technique): self
    {
        $this->technique = $technique;
        return $this;
    }
}