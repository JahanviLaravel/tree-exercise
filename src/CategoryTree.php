<?php

namespace Tree;
use Tree\Category;

class CategoryTree {
    private array $categories;

    public function __construct() {
        $this->categories = [];
    }

    //fuction to add new category(branch) to the category tree
    public function addCategory(string $category, string $parent=null) : void{
        //checking weather the given category already exists
        if (array_key_exists($category, $this->categories)) {
            throw new InvalidArgumentException("Category '$category' already exists.");
        }

        //if the parent is null then adding the category as a root of the branch
        if ($parent === null) {
            $branch = new Category($category);
            $this->categories[$category] = $branch;

        } else {
           //if the parent is specified then checking if the parent exists
            $root = $this->categories[$parent] ?? null;
            if ($root === null) {
                throw new InvalidArgumentException("Parent category '$parent' does not exist.");
            }

            //adding a new branch to the existing root
            $branch = new Category($category, $root);
            $root->addChild($branch);
            $this->categories[$category] = $branch;
            //var_dump($this->categories['A']);
        }
    }
    //function to get the children for the given parent
    public function getChildren(string $parent): array {
        if (!array_key_exists($parent, $this->categories)) {
            throw new InvalidArgumentException("Parent '$parent' does not exist.");
        }

        $category = $this->categories[$parent];
        $children = [];
        foreach ($category->getChildren() as $child) {
            $children[] = $child->getCategoryName();
        }

        return $children;
    }
}
?>
