<?php
class Lifo implements Pushable {
    private array $stack = [];

    public function push(mixed $value) {
        array_push($this->stack, $value);
    }

    public function pop(): mixed {
        return array_pop($this->stack);
    }
}

class Fifo implements Pushable {
    private array $queue = [];

    public function push(mixed $value) {
        array_push($this->queue, $value);
    }

    public function pop(): mixed {
        return array_shift($this->queue);
    }
}

// Sjednocení tříd
class LifoFifo implements Pushable {
    private array $items = [];

    public function push(mixed $value) {
        array_push($this->items, $value);
    }

    public function pop(): mixed {
        return array_shift($this->items);
    }
}
