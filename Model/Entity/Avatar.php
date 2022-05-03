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
     * @param $id_avat
     * @return Avatar
     */
    public function setIdAvat($id_avat): self
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
     * @return Avatar
     */
    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;
        return $this;
    }
}