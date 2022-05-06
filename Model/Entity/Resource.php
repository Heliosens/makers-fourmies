<?php


class Resource
{
    private ?int $id_res = null;
    private string $title;
    private string $description;
    private string $url;
    private Category_link $category;

    /**
     * @return int|null
     */
    public function getIdRes(): ?int
    {
        return $this->id_res;
    }

    /**
     * @param int|null $id_res
     * @return Resource
     */
    public function setIdRes(?int $id_res): self
    {
        $this->id_res = $id_res;
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
     * @return Resource
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
     * @return Resource
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Resource
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return Category_link
     */
    public function getCategory(): Category_link
    {
        return $this->category;
    }

    /**
     * @param Category_link $category
     * @return Resource
     */
    public function setCategory(Category_link $category): self
    {
        $this->category = $category;
        return $this;
    }

}