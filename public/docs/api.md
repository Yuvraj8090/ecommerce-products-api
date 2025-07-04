# E-Commerce Products API Documentation

## Base URL
`http://yourdomain.com/api`

## Endpoints

### Get All Products
- **URL**: `/products`
- **Method**: `GET`
- **Response**: Array of product objects

### Get Single Product
- **URL**: `/products/{id}`
- **Method**: `GET`
- **Response**: Single product object

### Create Product
- **URL**: `/products`
- **Method**: `POST`
- **Body**: Product data (JSON)
- **Response**: Created product object

### Update Product
- **URL**: `/products/{id}`
- **Method**: `PUT/PATCH`
- **Body**: Product data to update (JSON)
- **Response**: Updated product object

### Delete Product
- **URL**: `/products/{id}`
- **Method**: `DELETE`
- **Response**: 204 No Content

### Get Products by Category
- **URL**: `/products/category/{category}`
- **Method**: `GET`
- **Response**: Array of product objects in specified category

### Get Active Products
- **URL**: `/products/active`
- **Method**: `GET`
- **Response**: Array of active product objects

## Product Object Structure
```json
{
    "id": 1,
    "name": "Product Name",
    "description": "Product description",
    "price": 99.99,
    "stock_quantity": 50,
    "sku": "UNIQUE-SKU",
    "image_url": "https://example.com/image.jpg",
    "is_active": true,
    "weight": 1.5,
    "dimensions": {
        "length": 10,
        "width": 5,
        "height": 3
    },
    "category": "Electronics",
    "tags": ["tag1", "tag2"],
    "created_at": "2023-01-01T00:00:00.000000Z",
    "updated_at": "2023-01-01T00:00:00.000000Z"
}