<?php


class Type
{
    private ?int $id_type = null;
    private string $type_name;

    /**
     * @return int|null
     */
    public function getIdType(): ?int
    {
        return $this->id_type;
    }

    /**
     * @param int|null $id_type
     */
    public function setIdType(?int $id_type): self
    {
        $this->id_type = $id_type;
        return $this;
    }

    /**
     * @return string
     */
    public function getTypeName(): string
    {
        return $this->type_name;
    }

    /**
     * @param string $type_name
     */
    public function setTypeName(string $type_name): self
    {
        $this->type_name = $type_name;
        return $this;
    }
}