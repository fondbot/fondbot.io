<?php

declare(strict_types=1);

namespace App\Services\Documentation\Markdown;

use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\ElementRendererInterface;
use Webuni\CommonMark\TableExtension\TableRenderer as BaseTableRenderer;

class TableRenderer extends BaseTableRenderer
{
    public function render(AbstractBlock $block, ElementRendererInterface $htmlRenderer, $inTightList = false)
    {
        $element = parent::render($block, $htmlRenderer, $inTightList);

        $element->setAttribute('class', 'table is-bordered is-striped');

        return $element;
    }
}