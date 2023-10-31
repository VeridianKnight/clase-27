<?php
class Comentario {
    private $id;
    private $post_id;
    private $content;
    private $author_id;
    private $created_at;

    public function __construct($id, $post_id, $content, $author_id, $created_at) {
        $this->id = $id;
        $this->post_id = $post_id;
        $this->content = $content;
        $this->author_id = $author_id;
        $this->created_at = $created_at;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getPostId() {
        return $this->post_id;
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

    public function setPostId($post_id) {
        $this->post_id = $post_id;
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