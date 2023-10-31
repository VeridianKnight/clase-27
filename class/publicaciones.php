<?php
class Publicacion {
    private $id;
    private $title;
    private $content;
    private $author_id;
    private $created_at;
    public function __construct($id, $title, $content, $author_id, $created_at) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->author_id = $author_id;
        $this->created_at = $created_at;
    }
    // Getters
    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }
    public function getContent() {
        return $this->content;
    }
    public function getAuthorId() {
        return $this->author_id;
    }
    public function getCreatedAt() {
        return $this->created_at;
    }
    // Setters
    public function setId($id) {
        $this->id = $id;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function setContent($content) {
        $this->content = $content;
    }
    public function setAuthorId($author_id) {
        $this->author_id = $author_id;
    }
    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }
}

?>