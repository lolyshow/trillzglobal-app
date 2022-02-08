<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

    interface Shape {
    
        function draw(): void{

        }
    }


    class Circle implements Shape
    {
        public function draw(): void
        {
            
        }
    }

    class Square implements Shape
    {
        public function draw(): void
        {
            
        }
    }

    class Rectangle implements Shape
    {
        public function draw(): void
        {
            
        }
    }


    class FactoryPatternDemo implements Shape
    {
        public function main(): void
        {
            
        }
    }


    class ShapeFactory implements Shape
    {
        public function getShape(): Shape
        {
            
        }
    }


