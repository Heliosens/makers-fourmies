<?php


class Tool
{
    private ?int $id_tool = null;
    private string $tool_name;

    /**
     * @return int|null
     */
    public function getIdTool(): ?int
    {
        return $this->id_tool;
    }

    /**
     * @param int|null $id_tool
     */
    public function setIdTool(?int $id_tool): self
    {
        $this->id_tool = $id_tool;
        return $this;
    }

    /**
     * @return string
     */
    public function getToolName(): string
    {
        return $this->tool_name;
    }

    /**
     * @param string $tool_name
     */
    public function setToolName(string $tool_name): self
    {
        $this->tool_name = $tool_name;
        return $this;
    }
}