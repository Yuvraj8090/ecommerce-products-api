# Laravel E-Commerce Products API

A simple CRUD API for managing products in an e-commerce system.

## Features

- Product management (CRUD operations)
- No authentication middleware (for testing purposes)
- JSON responses
- MySQL database storage

## API Endpoints

### Base URL
`http://localhost:8000/api`

## Products CRUD Operations

### 1. Get All Products
```bash
curl -X GET http://localhost:8000/api/products \
-H "Accept: application/json"
2. Create a Product
bash
curl -X POST http://localhost:8000/api/products \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{
"name": "Premium Headphones",
"description": "Noise-cancelling wireless headphones",
"price": 299.99,
"stock_quantity": 50,
"sku": "HP-001",
"category": "Electronics"
}'
3. Get Single Product
bash
curl -X GET http://localhost:8000/api/products/1 \
-H "Accept: application/json"
4. Update a Product
bash
curl -X PUT http://localhost:8000/api/products/1 \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{
"name": "Updated Headphones",
"price": 249.99
}'
5. Delete a Product
bash
curl -X DELETE http://localhost:8000/api/products/1 \
-H "Accept: application/json"
Additional Product Routes
Get Products by Category
bash
curl -X GET http://localhost:8000/api/products/category/Electronics \
-H "Accept: application/json"
Get Active Products
bash
curl -X GET http://localhost:8000/api/products/active \
-H "Accept: application/json"
Database Schema
Products Table
Field Type Description
id bigint Primary key
name varchar(255) Product name
description text Product description
price decimal(10,2) Product price
stock_quantity int Available quantity
sku varchar(255) Unique product identifier
image_url varchar(255) Product image URL (nullable)
is_active boolean Product status (default: true)
weight decimal(8,2) Product weight (nullable)
dimensions json {length, width, height}
category varchar(255) Product category
tags json Array of tags
created_at timestamp Creation timestamp
updated_at timestamp Last update timestamp
deleted_at timestamp Soft delete timestamp
Installation
Clone the repository:

bash
git clone https://github.com/yourusername/ecommerce-products-api.git
cd ecommerce-products-api
Install dependencies:

bash
composer install
Create and configure .env file:

bash
cp .env.example .env
Generate application key:

bash
php artisan key:generate
Run migrations:

bash
php artisan migrate
Seed database with sample products:

bash
php artisan db:seed
Start development server:

bash
php artisan serve
Testing
You can test the API using:

cURL (examples provided above)

Postman

Any HTTP client

Notes
This is a testing version without authentication middleware. For production use, please implement proper authentication.

License
This project is open-source under the MIT license.

text

This README includes:
1. Clear API endpoint documentation
2. Proper cURL examples for all CRUD operations
3. Database schema information
4. Installation instructions
5. Testing guidance
6. License information
