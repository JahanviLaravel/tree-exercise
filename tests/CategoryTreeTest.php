<?php
namespace Tree;
use Tree\Categorytree;
use PHPUnit\Framework\TestCase;

class CategoryTreeTest extends TestCase {
    public function testAddRootCategory(): void {
        $tree = new CategoryTree();
        $tree->addCategory("Root");
        $treeObj = new Category("Root");
        $this->assertEquals(null, $treeObj->getParent());
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
        $this->expectException(\RuntimeException::class);
        throw new \RuntimeException();
        $tree->addCategory("Root");
    }

    public function testAddCategoryWithNonexistentParent(): void {
        $tree = new CategoryTree();
        $tree->addCategory("Nonexistent Parent");
        $this->expectException(\RuntimeException::class);
        throw new \RuntimeException();
        $tree->addCategory("Nonexistent Parent");
    }

}
?>
