<?php


class Article
{
    private ?int $id = null;
    private string $title;
    private string $description;
    private ?Type $type = null;
    private State $state;
    private ?array $step =null;
    private User $author;
    private ?array $category = null;
    private ?array $technic = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Article
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
     * @return Article
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
     * @return Article
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return Type|null
     */
    public function getType(): ?Type
    {
        return $this->type;
    }

    /**
     * @param Type|null $type
     * @return Article
     */
    public function setType(?Type $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return State
     */
    public function getState(): State
    {
        return $this->state;
    }

    /**
     * @param State $state
     */
    public function setState(State $state): void
    {
        $this->state = $state;
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * @param User $author
     * @return Article
     */
    public function setAuthor(User $author): self
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getStep(): ?array
    {
        return $this->step;
    }

    /**
     * @param array|null $step
     * @return Article
     */
    public function setStep(?array $step): self
    {
        $this->step = $step;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getCategory(): ?array
    {
        return $this->category;
    }

    /**
     * @param array|null $category
     * @return Article
     */
    public function setCategory(?array $category): self
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getTechnic(): ?array
    {
        return $this->technic;
    }

    /**
     * @param array|null $technic
     * @return Article
     */
    public function setTechnic(?array $technic): self
    {
        $this->technic = $technic;
        return $this;
    }
}