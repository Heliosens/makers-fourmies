<?php


class Resource
{
    private ?int $id_res = null;
    private string $title;
    private string $description;
    private string $url;
    private string $category;

    /**
     * @return int|null
     */
    public function getIdRes(): ?int
    {
        return $this->id_res;
    }

    /**
     * @param int|null $id_res
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
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category): self
    {
        $this->category = $category;
        return $this;
    }
}