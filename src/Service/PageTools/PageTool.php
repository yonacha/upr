<?php
/**
 * Created by PhpStorm.
 * User: walko
 * Date: 1/5/2019
 * Time: 23:10
 */
namespace App\Service\PageTools;

class PageTool
{
    /** @var string */
    private $routeName;
    /** @var string */
    private $translation;

    public function __construct(string $routeName, string $translation)
    {
        $this->routeName = $routeName;
        $this->translation = $translation;
    }

    /**
     * @return string
     */
    public function getRouteName(): string
    {
        return $this->routeName;
    }

    /**
     * @param string $routeName
     * @return PageTool
     */
    public function setRouteName(string $routeName): PageTool
    {
        $this->routeName = $routeName;

        return $this;
    }

    /**
     * @return string
     */
    public function getTranslation(): string
    {
        return $this->translation;
    }

    /**
     * @param string $translation
     * @return PageTool
     */
    public function setTranslation(string $translation): PageTool
    {
        $this->translation = $translation;

        return $this;
    }
}