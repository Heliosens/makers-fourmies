<?php


class Image
{
    private ?int $id_img;
    private string $name;
    private string $title;
    private string $description;
    private int $id_art;

    /**
     * @return int|null
     */
    public function getIdImg(): ?int
    {
        return $this->id_img;
    }

    /**
     * @param int|null $id_img
     * @return Image
     */
    public function setIdImg(?int $id_img): self
    {
        $this->id_img = $id_img;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Image
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Image
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Image
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdArt(): int
    {
        return $this->id_art;
    }

    /**
     * @param int $id_art
     * @return Image
     */
    public function setIdArt(int $id_art): self
    {
        $this->id_art = $id_art;
        return $this;
    }
}