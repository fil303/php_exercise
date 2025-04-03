<?php

class Person
{
    public function __construct(
        public string $name,
        public int $age,
        public string $email,
    ){}

    public function fromArray($a)
    {
        $aa = [
            "name", "age", "email"
        ];
        return new self(...$aa);
    }

    public function fromModal()
    {
        
    }
    
    public function fromApiResponse()
    {

    }
}