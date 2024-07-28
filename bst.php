<?php
ini_set('memory_limit', '-1');
class Node{
    public int $value;
    public ?Node $left;
    public ?Node $right;

    public function __construct(int $value){
        $this->value = $value;
    }
}


$array = [5, 10, 25, 26, 30, 40, 42, 45, 88, 90, 91];

function buildBinaryTree(array $ints){
    //$length = count($ints);
    $mid = (count($ints) -1) / 2;

    $mid = is_float($mid)? round($mid) : $mid;
    if($mid < 0) return null;

    $rootNode   = new Node($ints[$mid]);

    $rootNode->left  = buildBinaryTree(array_slice($ints, 0, $mid));
    $rootNode->right = buildBinaryTree(array_slice($ints, $mid + 1));
    return $rootNode;
}

function getValue($mixed){
    //return $mixed;
    echo $mixed;
    echo 'dead';
    die();
}

$root = buildBinaryTree($array);
echo "stack \n";
echo json_encode($root);
echo "\n";


$result = [];
$stack = [];
function travelBinaryTree(Node $tree, &$stack, &$result) {

    if(empty($stack)){
        array_push($result, $tree->value);

        if($tree->right)
        array_push($stack, $tree->right); 
    
        if($tree->left)
        array_push($stack, $tree->left); 
    }else {
        array_push($result, $tree->value);        

        if($tree->right)
        array_push($stack, $tree->right); 
    
        if($tree->left)
        array_push($stack, $tree->left); 
    }

    $nextTree = array_pop($stack);
    
    if($nextTree) travelBinaryTree($nextTree, $stack, $result);
}

travelBinaryTree($root, $stack, $result);
echo "stack \n";
echo json_encode($stack);
echo "\n";
echo "result of travel tree \n";
echo json_encode($result);


$index = -1;
function findValueInBinaryTree(Node $tree, $value, &$stack, &$index) {
    $index++;
    if(empty($stack)){
        if($value == $tree->value) return $index;

        if($tree->right)
        array_push($stack, $tree->right); 
    
        if($tree->left)
        array_push($stack, $tree->left); 
    }else {
        if($value == $tree->value) return $index;        

        if($tree->right)
        array_push($stack, $tree->right); 
    
        if($tree->left)
        array_push($stack, $tree->left); 
    }

    $nextTree = array_pop($stack);
    
    if($nextTree) return findValueInBinaryTree($nextTree,$value, $stack, $index);
}

echo "\n Value found in index: ". findValueInBinaryTree($root, 42, $stack, $index);