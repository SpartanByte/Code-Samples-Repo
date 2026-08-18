<?php

declare(strict_types=1);

class Order {
    private string $productName;
    private float $price;
    private ?int $quantity;
    private ?string $deliveryAddress;
    private ?string $note;

    // Modified constructor to accept the OrderBuilder $builder instance
    public function __construct(OrderBuilder $builder) {
        $this->productName = $builder->getProductName();
        $this->price = $builder->getPrice();
        $this->quantity = $builder->getQuantity();
        $this->deliveryAddress = $builder->getDeliveryAddress();
        $this->note = $builder->getNote();
    }

    public function __toString(): string {
        return sprintf(
            "Order[productName=%s, price=%.2f, quantity=%d, deliveryAddress=%s, note=%s]",
            $this->productName,
            $this->price,
            $this->quantity ?? 0,
            $this->deliveryAddress ?? '',
            $this->note ?? ''
        );
    }
}

// Use OrderBuilder class with fluent setters and default optional values
class OrderBuilder {
    private string $productName = '';
    private float $price = 0.0;
    private ?int $quantity = null;
    private ?string $deliveryAddress = null;
    private ?string $note = null;

    public function setProductName(string $productName): self {
        $this->productName = $productName;
        return $this;
    }

    public function setPrice(float $price): self {
        $this->price = $price;
        return $this;
    }

    public function setQuantity(?int $quantity): self {
        $this->quantity = $quantity;
        return $this;
    }

    public function setDeliveryAddress(?string $deliveryAddress): self {
        $this->deliveryAddress = $deliveryAddress;
        return $this;
    }

    public function setNote(?string $note): self {
        $this->note = $note;
        return $this;
    }

    public function getProductName(): string {
        return $this->productName;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getQuantity(): ?int {
        return $this->quantity;
    }

    public function getDeliveryAddress(): ?string {
        return $this->deliveryAddress;
    }

    public function getNote(): ?string {
        return $this->note;
    }

    public function build(): Order {
        return new Order($this);
    }
}

// main() to instantiate an Order using OrderBuilder
function main(): void {
    $order = (new OrderBuilder())
        ->setProductName("Laptop")
        ->setPrice(999.99)
        ->setQuantity(2)
        ->setDeliveryAddress("123 Main St, Anytown")
        // note is omitted here, keeping it null without needing positional parameters
        ->build();

    echo $order;
}

main();
?>