<?php

namespace App\Services;

use Illuminate\Support\Facades\Redis;

class CartService
{
    protected string $key;
    protected int $ttl = 60 * 60 * 24 * 7; // 7 дней

    public function __construct(int $userId)
    {
        $this->key = "cart:{$userId}";
    }

    /**
     * Получить корзину целиком
     */
    public function get(): array
    {
        $data = Redis::get($this->key);

        return $data
            ? json_decode($data, true)
            : ['items' => []];
    }

    /**
     * Добавить товар в корзину
     */
    public function add(int $productId, int $qty = 1): void
    {
        $cart = $this->get();

        if (isset($cart['items'][$productId])) {
            $cart['items'][$productId]['qty'] += $qty;
        } else {
            $cart['items'][$productId] = ['qty' => $qty];
        }

        $this->save($cart);
    }

    /**
     * Обновить количество
     */
    public function update(int $productId, int $qty): void
    {
        $cart = $this->get();

        if ($qty <= 0) {
            unset($cart['items'][$productId]);
        } else {
            $cart['items'][$productId]['qty'] = $qty;
        }

        $this->save($cart);
    }

    /**
     * Удалить товар
     */
    public function remove(int $productId): void
    {
        $cart = $this->get();
        unset($cart['items'][$productId]);
        $this->save($cart);
    }

    /**
     * Очистить корзину
     */
    public function clear(): void
    {
        Redis::del($this->key);
    }

    /**
     * Сохранить корзину в Redis
     */
    protected function save(array $cart): void
    {
        $cart['updated_at'] = time();

        Redis::setex(
            $this->key,
            $this->ttl,
            json_encode($cart)
        );
    }
}
