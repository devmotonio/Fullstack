#Teste FullStack

Endpoints da API

Ler todos os produtos

GET http://localhost/api/products
```
{
    "current_page": 1,
    "data": [],
    "first_page_url": "http://localhost/api/products?page=1",
    "from": null,
    "last_page": 1,
    "last_page_url": "http://localhost/api/products?page=1",
    "links": [
        {
            "url": null,
            "label": "&laquo; Previous",
            "active": false
        },
        {
            "url": "http://localhost/api/products?page=1",
            "label": "1",
            "active": true
        },
        {
            "url": null,
            "label": "Next &raquo;",
            "active": false
        }
    ],
    "next_page_url": null,
    "path": "http://localhost/api/products",
    "per_page": 10,
    "prev_page_url": null,
    "to": null,
    "total": 0
}
```

Ler um prduto pelo id
GET http://localhost/api/products/1

Fazer upload da foto do produto
POST http://localhost/api/imageupload
Request
  Body: form-data

Response
```
{
    "url": "http://localhost/storage/images/products/12FB1v9qs2GvEsSF.jpg"
}
```

Criar um produto
POST http://localhost/api/products

```
{
    "name": "TV LED",
    "description": "TV 55'' 4K",
    "tension": "110",
    "brand": "LG",
    "image": "http://localhost/storage/images/products/lLOLyTe8a9THEIJc.jpg",
    "updated_at": "2022-10-31T23:26:34.000000Z",
    "created_at": "2022-10-31T23:26:34.000000Z",
    "id": 1
}
```
http://localhost/api/products/11
http://localhost/api/products/21
