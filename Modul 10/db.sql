SELECT id_customer, SUM(total) AS total_penjualan
FROM orders
GROUP BY id_customer;
