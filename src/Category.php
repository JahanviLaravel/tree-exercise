<?php
namespace Tree;
class Category {
    private string $category;
    private ?Category $parentObj;
    private array $children;

    public function __construct(string $category, ?Category $parentObj = null) {
        $this->category = $category;
        $this->parentObj = $parentObj;
        $this->children = [];
    }

    public function getCategoryName(): string {
        return $this->category;
    }

    public function getParent(): ?Category {
        if($this->parentObj === null){
           $this->parentobj = null;
        }
        return $this->parentobj;
    }

    public function addChild(Category $child): void {
        $this->children[] = $child;
    }

    public function getChildren(): array {
        return $this->children;
    }
}
?>
