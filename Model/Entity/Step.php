<?php


class Step
{
    private ?int $id_step = null;
    private ?string $img_name = null;
    private ?string $title = null;
    private ?string $description = null;
    private ?string $tool = null;
    private ?string $matter = null;
    private int $art_fk;

    /**
     * @return int|null
     */
    public function getIdStep(): ?int
    {
        return $this->id_step;
    }

    /**
     * @param int|null $id_step
     * @return Step
     */
    public function setIdStep(?int $id_step): self
    {
        $this->id_step = $id_step;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getImgName(): ?string
    {
        return $this->img_name;
    }

    /**
     * @param string|null $img_name
     * @return Step
     */
    public function setImgName(?string $img_name): self
    {
        $this->img_name = $img_name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return Step
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return Step
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTool(): ?string
    {
        return $this->tool;
    }

    /**
     * @param string|null $tool
     * @return Step
     */
    public function setTool(?string $tool): self
    {
        $this->tool = $tool;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMatter(): ?string
    {
        return $this->matter;
    }

    /**
     * @param string|null $matter
     * @return Step
     */
    public function setMatter(?string $matter): self
    {
        $this->matter = $matter;
        return $this;
    }

    /**
     * @return int
     */
    public function getArtFk(): int
    {
        return $this->art_fk;
    }

    /**
     * @param int $art_fk
     * @return Step
     */
    public function setArtFk(int $art_fk): self
    {
        $this->art_fk = $art_fk;
        return $this;
    }

}