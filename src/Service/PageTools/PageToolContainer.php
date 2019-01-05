<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/5/2019
 * Time: 23:09
 */
namespace App\Service\PageTools;

class PageToolContainer
{
    /** @var array */
    private $tools;

    /**
     * @param PageTool $tool
     */
    public function addTool(PageTool $tool): void
    {
        $this->tools[] = $tool;
    }

    /**
     * @return array
     */
    public function getTools(): array
    {
        return $this->tools;
    }
}