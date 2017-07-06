<?php

declare(strict_types=1);

namespace App\Services\Documentation\Markdown;

use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Block\Renderer\HeadingRenderer as BaseHeadingRenderer;
use League\CommonMark\ElementRendererInterface;
use League\CommonMark\HtmlElement;

class HeadingRenderer extends BaseHeadingRenderer
{
    /**
     * @param AbstractBlock $block
     * @param ElementRendererInterface $htmlRenderer
     * @param bool $inTightList
     *
     * @return HtmlElement|string
     */
    public function render(AbstractBlock $block, ElementRendererInterface $htmlRenderer, $inTightList = false)
    {
        $element = parent::render($block, $htmlRenderer);

        switch ($element->getTagName()) {
            case 'h1':
                $element->setAttribute('class', 'title is-spaced');
                break;
            default:
                $element->setAttribute('class', 'subtitle');
                break;
        }

        return $element;
    }
}