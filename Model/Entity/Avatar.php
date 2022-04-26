<?php


class Avatar
{
    private int $id_avat;
    private string $avatar;

    /**
     * @return int
     */
    public function getIdAvat(): int
    {
        return $this->id_avat;
    }

    /**
     * @param int $id_avat
     */
    public function setIdAvat(int $id_avat): self
    {
        $this->id_avat = $id_avat;
        return $this;
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     */
    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;
        return $this;
    }
}