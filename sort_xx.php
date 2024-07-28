<?php


function dd(...$args)
{
    echo "<pre>";
    foreach($args as $arg){
        if(($type = gettype($arg)) == 'array')
            echo json_encode($arg);
        else if($type == 'integer' || $type == 'float' || $type == 'string')
            echo $arg;
        else if($type == 'boolean')
            echo $arg ? "true": "false";
        else
            var_dump($arg);

        echo "\n";
    }
    die();
}

class Node {
    public ?Node $parent = null;
    public ?Node $left = null;
    public ?Node $right = null;
    public int $value;
    public bool $head = false;
    public bool $is_right = false;
    public bool $tail = false;
    public int $exist = 1;
}

class TreeArraySort {
    public ?Node $tree = null;
    public ?Node $headTree = null;
    private int $unSortArrayIndex = 0;
    public int $loop = 0;
    private array $travelStack = [];
    public array $sortArray = [];
    public function __construct(
        private $unSortArray = null
    ){}

    private function buildTree()
    {

        if(count($this->unSortArray) <= $this->unSortArrayIndex) return;

        $newTree = new Node;
        $newTree->value = $this->unSortArray[
            $this->unSortArrayIndex++
        ];

        if($this->tree == null){
            $newTree->head  = true;
            $newTree->tail  = true;
            $this->tree     = $newTree;
            $this->headTree = $this->tree;
            return $this->buildTree();
        }

        return $this->findNewNodeScope($newTree);
    }

    private function findNewNodeScope(Node $newTree)
    {
        if($this->tree->value == $newTree->value) {
            $this->tree->exist++;
            return $this->buildTree();
        }

        if($this->tree->parent && $this->tree->value > $this->tree->parent->value){
            if($this->tree->right && $this->tree->right->value > $newTree->value){
                $newTree->right = $this->tree->right;
                $newTree->is_right = true;
                $this->tree->right->parent = $newTree;
                $this->tree->right = $newTree;
                $this->tree->is_right = true;
                return $this->buildTree();
            }

            $newTree->parent = $this->tree;
            $this->tree->right = $newTree;
            $this->tree->is_right = true;
            return $this->buildTree();
        }

        // if new value is big
        if($this->tree->value < $newTree->value) {
            if($this->tree->parent && $this->tree->right){
                if($this->tree->parent->value < $newTree->value){
                    $this->tree = $this->tree->parent;
                    return $this->findNewNodeScope($newTree);
                }

                if($this->tree->right->value < $newTree->value){
                    $this->tree = $this->tree->right;
                    return $this->findNewNodeScope($newTree);
                }

                $newTree->parent = $this->tree->right;
                $newTree->is_right = true;
                $this->tree->right->right = $newTree;
                return $this->buildTree();
            }
            if($this->tree->parent){
                if(
                    $this->tree->parent->value > $newTree->value &&
                    !$this->tree->right
                ){
                    $newTree->parent = $this->tree;
                    $newTree->is_right = true;
                    $this->tree->right = $newTree;
                    return $this->buildTree();
                }
                $this->tree = $this->tree->parent;
                return $this->findNewNodeScope($newTree);
            }

            // if parent/right node not exist
            $this->tree->tail = false;
            $newTree->tail = true;
            $this->tree->parent = $newTree;

            return $this->buildTree();
        }

        // if new value is small
        if($this->tree->value > $newTree->value) {
            if($this->tree->left){
                if($this->tree->left->value < $newTree->value){
                    // new
                    $newTree->parent = $this->tree;
                    $newTree->left   = $this->tree->left;

                    $this->tree->left->parent = $newTree;
                    $this->tree->left         = $newTree;
                    return $this->buildTree();
                }
                $this->tree = $this->tree->left;
                return $this->findNewNodeScope($newTree);
            }

            // if no left node exist
            $this->tree->head = false;
            $newTree->head = true;
            $this->tree->left = $newTree;
            $this->headTree = $newTree;

            return $this->buildTree();
        }   return;
    }

    private function travelTreeAndBuildArray($next = false)
    {
        $this->loop++;
        if(!empty($this->travelStack)) {
            $this->headTree = array_pop($this->travelStack);
        }

        $this->sortArray[] = $this->headTree->value;
        if($this->headTree->parent && !$this->headTree->is_right){
            array_push($this->travelStack, $this->headTree->parent);
        }
        
        if($this->headTree->right){
            array_push($this->travelStack, $this->headTree->right);
        }
       
        if($this->headTree->left && $this->headTree->is_right){
            array_push($this->travelStack, $this->headTree->left);
        }

        if(empty($this->travelStack)) return;
        return $this->travelTreeAndBuildArray(true);
    }

    public function sort()
    {
        if(!$this->unSortArray){
            echo "no data found"; die();
        }
        
        if(! (count($this->unSortArray) >= 2) ){
            echo "not much data found"; die();
        }
        echo (memory_get_usage() / 1024) / 1024;
        $this->buildTree();
        $this->travelTreeAndBuildArray();
        echo " ";
        echo (memory_get_usage() / 1024) / 1024;
    }
}

$array = [10, 5, 6, 50, 44, 99, 61];
$sortClass = new TreeArraySort($array);
$sortClass->sort();

// dd($sortClass->loop);
dd($sortClass->sortArray);