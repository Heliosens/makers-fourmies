<?php


class Category_link
{
    private ?int $id_cat_link = null;
    private string $category_link;

    /**
     * @return int|null
     */
    public function getIdCatLink(): ?int
    {
        return $this->id_cat_link;
    }

    /**
     * @param int|null $id_cat_link
     */
    public function setIdCatLink(?int $id_cat_link): void
    {
        $this->id_cat_link = $id_cat_link;
    }

    /**
     * @return string
     */
    public function getCategoryLink(): string
    {
        return $this->category_link;
    }

    /**
     * @param string $category_link
     */
    public function setCategoryLink(string $category_link): void
    {
        $this->category_link = $category_link;
    }

}