<?php

$tree  = null;
$data  = [5, 10, 25, 26, 30, 40, 42, 45, 88, 90, 91];
$result= [
    "index" => [],
    "loop"  => 0,
    "value" => [],
    "stack" => []
];

class Node{
    public ?Node $left;
    public ?Node $right;
    public int $value;

    public function __construct(int $value){
        $this->value = $value;
    }
}


function buildTree (&$result, array $rawTree) 
{
    $total_index = count($rawTree) - 1;
    $mid_index   = round($total_index / 2);

    if(!isset($rawTree[$mid_index])) return null;
    $result["value"][] = $rawTree[$mid_index];

    $tree        = new Node($rawTree[$mid_index]);
    $tree->left  = buildTree($result, array_slice($rawTree, 0, $mid_index));
    $tree->right = buildTree($result, array_slice($rawTree, ++$mid_index));

    return $tree;
}

function travelTree(&$result, Node $tree): void
{
    $result["travel"][] = $tree->value;

    if($tree->right)
    array_push($result['stack'], $tree->right);

    if($tree->left)
    array_push($result['stack'], $tree->left);

    if($current_tree = array_pop($result['stack'])){
        travelTree($result, $current_tree);
    }
}

function findInTree($searchValue, ?Node $tree): ?Node
{
    if(!$tree) return null;
    if($tree->value == $searchValue) return $tree;
    if($tree->value > $searchValue){
        return findInTree($searchValue, $tree->left);
    }
    if($tree->value < $searchValue){
        return findInTree($searchValue, $tree->right);
    }
    return null;
}

$tree   = buildTree ($result, $data);
          travelTree($result, $tree);
echo "<pre>";
echo json_encode($result['travel']);
var_dump(findInTree(40, $tree));
echo "</pre>";