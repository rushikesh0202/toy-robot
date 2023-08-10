<?php

class ToyRobotSimulator
{
    // Properties to store the robot's position and facing direction
    private $x;
    private $y;
    private $facing;

    // Constructor to initialize the properties
    public function __construct()
    {
        $this->x = null;
        $this->y = null;
        $this->facing = null;
    }

    // Function to parse and execute commands
    public function executeCommands($commands)
    {
        foreach ($commands as $command) {
            $this->executeCommand($command);
        }
    }

    // Function to execute a single command
    private function executeCommand($command)
    {
        $parts = explode(' ', $command);
        $action = $parts[0];

        switch ($action) {
            case 'PLACE':
                $params = explode(',', $parts[1]);
               echo $this->place((int)$params[0], (int)$params[1], $params[2]);
                break;
            case 'MOVE':
                $this->move();
                break;
            case 'LEFT':
                $this->rotateLeft();
                break;
            case 'RIGHT':
                $this->rotateRight();
                break;
            case 'REPORT':
                $this->report();
                break;
            default:
                // Ignore invalid commands
                break;
        }
    }

    // Function to place the robot on the table
    private function place($x, $y, $facing)
    {
        // Check if the placement is within the table constraints
        if ($this->isValidPosition($x, $y) && $this->isValidFacing($facing)) {
            $this->x = $x;
            $this->y = $y;
            $this->facing = $facing;
        }
    }

    // Function to move the robot one unit forward
    private function move()
    {
        // Calculate the new position after moving
        $newX = $this->x;
        $newY = $this->y;

        switch ($this->facing) {
            case 'NORTH':
                $newY++;
                break;
            case 'SOUTH':
                $newY--;
                break;
            case 'EAST':
                $newX++;
                break;
            case 'WEST':
                $newX--;
                break;
        }

        // Check if the new position is within the table constraints
        if ($this->isValidPosition($newX, $newY)) {
            $this->x = $newX;
            $this->y = $newY;
        }
    }

    // Function to rotate the robot 90 degrees to the left
    private function rotateLeft()
    {
        $this->rotate(-1);
    }

    // Function to rotate the robot 90 degrees to the right
    private function rotateRight()
    {
        $this->rotate(1);
    }

    // Function to perform the rotation
    private function rotate($direction)
    {
        $directions = ['NORTH', 'EAST', 'SOUTH', 'WEST'];
        $currentDirectionIndex = array_search($this->facing, $directions);
        $newDirectionIndex = ($currentDirectionIndex + $direction + 4) % 4;
        $this->facing = $directions[$newDirectionIndex];
    }

    // Function to report the current position and facing direction of the robot
    private function report()
    {
        echo $this->x . ',' . $this->y . ',' . $this->facing . PHP_EOL;
    }

    // Function to check if the position is within the table constraints
    private function isValidPosition($x, $y)
    {
        return ($x >= 0 && $x < 5 && $y >= 0 && $y < 5);
    }

    // Function to check if the facing direction is valid
    private function isValidFacing($facing)
    {
        $validFacings = ['NORTH', 'SOUTH', 'EAST', 'WEST'];
        return in_array($facing, $validFacings);
    }
}
