<?php
namespace Tree;
use Tree\Categorytree;
use PHPUnit\Framework\TestCase;

class CategoryTreeTest extends TestCase {
    public function testAddRootCategory(): void {
        $tree = new CategoryTree();
        $tree->addCategory("Root");
        $this->assertEquals([], $tree->getChildren("Root"));
    }

    public function testAddChildCategory(): void {
        $tree = new CategoryTree();
        $tree->addCategory("Root");
        $tree->addCategory("Leaf", "Root");
        $this->assertEquals(["Leaf"], $tree->getChildren("Root"));
        $this->assertEquals([], $tree->getChildren("Leaf"));
    }

    public function testAddExistingCategory(): void {
        $tree = new CategoryTree();
        $tree->addCategory("Root");
        $this->expectException(InvalidArgumentException::class);
    }

    public function testAddCategoryWithNonexistentParent(): void {
        $tree = new CategoryTree();
        $this->expectException(InvalidArgumentException::class);
        $tree->addCategory("Leaf", "Nonexistent Parent");
    }

    public function testGetChildrenOfNonexistentCategory(): void {
        $tree = new CategoryTree();
        $this->expectException(InvalidArgumentException::class);
        $tree->getChildren("Nonexistent Category");
    }
}
?>
