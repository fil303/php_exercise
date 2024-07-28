<?php

class Node {
    public ?Node $parent;
    public ?Node $left;
    public ?Node $right;
    public int $value;
    public bool $head = false;
    public bool $tail = false;
}

$array = [10, 5, 9]; // , 50, 44, 99, 61, 25, 11, 86
$tree  = null;

function build_tree(int $value, ?Node &$tree)
{
    $newTree = new Node;
    $newTree->value = $value;

    // For The First Node (1st)
    if($tree == null){
        $newTree->head = true;
        $newTree->tail = true;
        $tree = $newTree;
        return;
    }

    // For The Second Node (2nd)
    if($tree->head == true && $tree->tail == true){
        
        if($tree->value > $value){
            $newTree->parent = $tree;
            $newTree->tail   = false;
            $tree->left      = $newTree;
        }else{
            $tree->parent  = $newTree;
            $tree->head    = false;
            $tree->tail    = true;
            $newTree->left = $tree;
        }   return;
    }

    // Other Node
    if(!$searchedNode = searchInTree($value, $tree))
        echo "node not found";
    


    return;
}

function searchInTree(int $value, Node $tree)
{
    // if($tree->head !== true) return null;
    if(
       !(
            $tree->value < $value &&
            $tree->parent->value > $value
        )
    )   return searchInTree($value, $tree->parent);
}

foreach($array as $index => $value) build_tree($value, $tree);


echo "<pre>";
echo json_encode($tree);
// var_dump($tree);
echo "</pre>";