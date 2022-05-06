<?php


class Article
{
    private ?int $id = null;
    private string $title;
    private string $description;
    private Type $type;
    private array $category;
    private array $technic;
    private array $tool;
    private array $matter;
    private array $resource;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;
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
     * @return Type
     */
    public function getType(): Type
    {
        return $this->type;
    }

    /**
     * @param Type $type
     * @return Article
     */
    public function setType(Type $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return array
     */
    public function getCategory(): array
    {
        return $this->category;
    }

    /**
     * @param array $category
     * @return Article
     */
    public function setCategory(array $category): self
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return array
     */
    public function getTechnic(): array
    {
        return $this->technic;
    }

    /**
     * @param array $technic
     * @return Article
     */
    public function setTechnic(array $technic): self
    {
        $this->technic = $technic;
        return $this;
    }

    /**
     * @return array
     */
    public function getTool(): array
    {
        return $this->tool;
    }

    /**
     * @param array $tool
     * @return Article
     */
    public function setTool(array $tool): self
    {
        $this->tool = $tool;
        return $this;
    }

    /**
     * @return array
     */
    public function getMatter(): array
    {
        return $this->matter;
    }

    /**
     * @param array $matter
     * @return Article
     */
    public function setMatter(array $matter): self
    {
        $this->matter = $matter;
        return $this;
    }

    /**
     * @return array
     */
    public function getResource(): array
    {
        return $this->resource;
    }

    /**
     * @param array $resource
     * @return Article
     */
    public function setResource(array $resource): self
    {
        $this->resource = $resource;
        return $this;
    }

}