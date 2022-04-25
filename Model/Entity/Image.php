<?php


class Image
{
    private ?int $id_img;
    private string $name;
    private string $title;
    private string $description;
    private Article $article;

    /**
     * @return int|null
     */
    public function getIdImg(): ?int
    {
        return $this->id_img;
    }

    /**
     * @param int|null $id_img
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
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return Article
     */
    public function getArticle(): Article
    {
        return $this->article;
    }

    /**
     * @param Article $article
     */
    public function setArticle(Article $article): self
    {
        $this->article = $article;
        return $this;
    }
}