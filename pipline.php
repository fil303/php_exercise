<?php

// Step 1: Define a Pipeline class
class Pipeline
{
    private array $stages = [];

    // Add a new stage to the pipeline
    public function pipe(callable $stage): self
    {
        $this->stages[] = $stage;
        return $this;
    }

    // Execute the pipeline with the initial input
    public function process($input)
    {
        $generator = function () use ($input) {
            yield $input;
        };

        foreach ($this->stages as $stage) {
            $generator = $this->createGenerator($generator, $stage);
        }

        foreach ($generator() as $output) {
            return $output; // Return final output
        }
    }

    // Create a new generator for each stage
    private function createGenerator(callable $inputGenerator, callable $stage)
    {
        return function () use ($inputGenerator, $stage) {
            foreach ($inputGenerator() as $value) {
                yield $stage($value);
            }
        };
    }
}

// Step 2: Create a pipeline with dynamic stages
$pipeline = (new Pipeline())
    ->pipe(fn($value) => $value * 2)            // Double the value
    ->pipe(fn($value) => $value + 10)           // Add 10
    ->pipe(fn($value) => $value ** 2)           // Square the value
    ->pipe(function ($value) {                  // Custom function
        if ($value % 2 === 0) {
            return $value / 2;                  // Halve if even
        }
        return $value;
    });

// Step 3: Use Reflection to introspect the pipeline
$reflector = new ReflectionClass($pipeline);
$method = $reflector->getMethod('process');
echo "Method Signature: " . $method->getName() . PHP_EOL;

// Step 4: Process the pipeline
$inputValue = 5;
$result = $pipeline->process($inputValue);

echo "Input: $inputValue" . PHP_EOL;
echo "Output: $result" . PHP_EOL;

