<?php


class Category
{
    private ?int $id_cat = null;
    private string $category_name;

    /**
     * @return int|null
     */
    public function getIdCat(): ?int
    {
        return $this->id_cat;
    }

    /**
     * @param int|null $id_cat
     * @return Category
     */
    public function setIdCat(?int $id_cat): self
    {
        $this->id_cat = $id_cat;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategoryName(): string
    {
        return $this->category_name;
    }

    /**
     * @param string $category_name
     * @return Category
     */
    public function setCategoryName(string $category_name): self
    {
        $this->category_name = $category_name;
        return $this;
    }
}