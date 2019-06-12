<?php

namespace App\Objects;

class Book {
    private $title;
    private $author;
    private $id;

    public function __construct(int $id, string $title, string $author) {
        $this->title = $title;
        $this->id = $id;
        $this->author = $author;
    }

    public function getTitle() {
        return $this->title;        
    }

    public function getId() {
        return $this->id;        
    }

    public function getAuthor() {
        return $this->author;        
    }

    public function setTitle(string $title) {
        $this->title = $title;        
    }

    public function setId(int $id) {
        $this->id = $id;         
    }

    public function setAuthor(string $author) {
        $this->author = $author;
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => $this->author
        ];
    }
}