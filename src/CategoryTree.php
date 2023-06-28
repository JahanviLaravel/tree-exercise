<?php

namespace Tree;
use Tree\Category;

class CategoryTree {
    private array $categories;

    public function __construct() {
        $this->categories = [];
    }

    //fuction to add new category to the category tree
    public function addCategory(string $category, string $parent=null) : void{
        //checking weather the given category already exists
        try {
          if(array_key_exists($category, $this->categories)){
              throw new \InvalidArgumentException("Category '$category' already exists");
          }
        }
        catch(\Exception $e) {
              echo $e->getMessage();
        }

        //if the parent is null then adding the category as a root of the branch
        if ($parent === null) {
            $categoryObj = new Category($category);
            $this->categories[$category] = $categoryObj;
        } else {
           //if the parent is specified then checking if the parent  exists
            $parentCat = $this->categories[$parent] ?? null;
            try {
              if ($parentCat === null) {
                  throw new \InvalidArgumentException("Parent category '$parent' does not exist.");
              }
              else {
                //adding a new category to the existing root
                $categoryObj = new Category($category, $parentCat);
                $parentCat->addChild($categoryObj);
                $this->categories[$category] = $categoryObj;
              }
            }catch(\Exception $e) {
                echo 'Message: ' .$e->getMessage();
            }
        }
    }

    //function to get the children for the given path
    public function getChildren(string $parent): array {
          if (!array_key_exists($parent, $this->categories)) {
              throw new \InvalidArgumentException("Parent '$parent' does not exist.");
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
