<?php
namespace Tree;
class Category {
    private string $leaf;
    private ?Category $root;
    private array $children;

    public function __construct(string $category, ?Category $root = null) {
        $this->leaf = $category;
        $this->root = $root;
        $this->children = [];
    }

    public function getCategoryName(): string {
        return $this->leaf;
    }

    public function getParent(): ?Category {
        return $this->root;
    }

    public function addChild(Category $child): void {
        $this->children[] = $child;
    }

    public function getChildren(): array {
        return $this->children;
    }
}
?>
