<?php

/*
 * This file is part of the "StenopePHP/Stenope" bundle.
 *
 * @author Thomas Jarrand <thomas.jarrand@gmail.com>
 */

namespace Stenope\Bundle\Processor;

use Stenope\Bundle\Behaviour\ProcessorInterface;
use Stenope\Bundle\Content;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Extract a content title from a HTML property by using the first available h1 tag.
 */
class ExtractTitleFromHtmlContentProcessor implements ProcessorInterface
{
    private string $contentProperty;
    private string $titleProperty;

    public function __construct(string $contentProperty = 'content', string $titleProperty = 'title')
    {
        $this->contentProperty = $contentProperty;
        $this->titleProperty = $titleProperty;
    }

    public function __invoke(array &$data, string $type, Content $content): void
    {
        // Ignore if no content available, or if the title property is already set:
        if (!\is_string($data[$this->contentProperty] ?? null) || isset($data[$this->titleProperty]) || !$data[$this->property] instanceof Crawler) {
            return;
        }

        $crawler = $data[$this->contentProperty];

        // Use the first h1 text as title:
        if (($title = $crawler->filter('h1')->first())->count() > 0) {
            $data[$this->titleProperty] = $title->text();
        }
    }
}
