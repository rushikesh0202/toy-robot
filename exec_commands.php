<?php

// Include the ToyRobotSimulator class (assuming both files are in the same directory)
require_once 'ToyRobotSimulator.php';

// Create an instance of the ToyRobotSimulator
$robotSimulator = new ToyRobotSimulator();

// Example Input a)
$commandsA = [
    'PLACE 0,0,NORTH',
    'MOVE',
    'REPORT',
];
echo "Example Input a):\n";
$robotSimulator->executeCommands($commandsA);

// Example Input b)
$commandsB = [
    'PLACE 0,0,NORTH',
    'LEFT',
    'REPORT',
];
echo "Example Input b):\n";
$robotSimulator->executeCommands($commandsB);

// Example Input c)
$commandsC = [
    'PLACE 1,2,EAST',
    'MOVE',
    'MOVE',
    'LEFT',
    'MOVE',
    'REPORT',
];
echo "Example Input c):\n";
$robotSimulator->executeCommands($commandsC);
