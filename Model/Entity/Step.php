<?php


class Step
{
    private ?int $id_step = null;
    private ?string $img_name;
    private string $title;
    private ?string $description;
    private Article $article;

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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Step
     */
    public function setTitle(string $title): self
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
     * @return Article
     */
    public function getArticle(): Article
    {
        return $this->article;
    }

    /**
     * @param Article $article
     * @return Step
     */
    public function setArticle(Article $article): self
    {
        $this->article = $article;
        return $this;
    }
}