<?php
namespace Page;
class Page {
    private $title;
    private $links;

    public function __construct($title, $links) {
        $this->title = $title;
        $this->links = $links;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getLinks() {
        return $this->links;
    }
}
