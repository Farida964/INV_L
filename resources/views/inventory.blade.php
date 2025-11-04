<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            margin: 40px;
            background: #f9fafb;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #0a9396;
        }

        form {
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }

        input, textarea {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            background: #0a9396;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #005f73;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px 12px;
            text-align: left;
        }

        th {
            background: #0a9396;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f4f4f4;
        }

        .action-btn {
            background: #ee9b00;
            margin-right: 5px;
        }

        .delete-btn {
            background: #d00000;
        }

        .action-btn:hover {
            background: #ca6702;
        }

        .delete-btn:hover {
            background: #9b0000;
        }
    </style>
</head>
<body>
    <h1>Inventory Management</h1>

    <form id="productForm">
        <input type="hidden" id="productId">
        <input type="text" id="product_code" placeholder="Product Code" required>
        <input type="text" id="product_name" placeholder="Product Name" required>
        <textarea id="description" placeholder="Description"></textarea>
        <input type="number" id="initial_stock" placeholder="Initial Stock" required>
        <input type="number" id="stock_in" placeholder="Stock In">
        <input type="number" id="stock_out" placeholder="Stock Out">
        <input type="number" id="refund_stock" placeholder="Refund Stock">
        <input type="number" id="price" placeholder="Price" required>
        <input type="text" id="category" placeholder="Category">
        <input type="text" id="image" placeholder="Image URL">
        <button type="submit">Save Product</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Total Value</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="productTableBody"></tbody>
    </table>

    <script>
        const apiUrl = '/api/inventory';
        const form = document.getElementById('productForm');
        const tableBody = document.getElementById('productTableBody');
        let editMode = false;

        // 🔄 Fetch Data
        async function loadProducts() {
            const res = await fetch(apiUrl);
            const data = await res.json();
            tableBody.innerHTML = '';
            data.forEach(product => {
                tableBody.innerHTML += `
                    <tr>
                        <td>${product.product_code}</td>
                        <td>${product.product_name}</td>
                        <td>${product.current_stock}</td>
                        <td>${product.price}</td>
                        <td>${product.total_value}</td>
                        <td>
                            <button class="action-btn" onclick="editProduct(${product.id})">Edit</button>
                            <button class="delete-btn" onclick="deleteProduct(${product.id})">Delete</button>
                        </td>
                    </tr>`;
            });
        }

        // ➕ Add or Update Product
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const product = {
                product_code: document.getElementById('product_code').value,
                product_name: document.getElementById('product_name').value,
                description: document.getElementById('description').value,
                initial_stock: document.getElementById('initial_stock').value,
                stock_in: document.getElementById('stock_in').value,
                stock_out: document.getElementById('stock_out').value,
                refund_stock: document.getElementById('refund_stock').value,
                price: document.getElementById('price').value,
                category: document.getElementById('category').value,
                image: document.getElementById('image').value,
            };

            const id = document.getElementById('productId').value;

            if (editMode) {
                await fetch(`${apiUrl}/${id}`, {
                    method: 'PUT',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(product)
                });
                editMode = false;
            } else {
                await fetch(apiUrl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(product)
                });
            }

            form.reset();
            loadProducts();
        });

        // ✏️ Edit Product
        async function editProduct(id) {
            const res = await fetch(`${apiUrl}/${id}`);
            const product = await res.json();

            document.getElementById('productId').value = product.id;
            document.getElementById('product_code').value = product.product_code;
            document.getElementById('product_name').value = product.product_name;
            document.getElementById('description').value = product.description;
            document.getElementById('initial_stock').value = product.initial_stock;
            document.getElementById('stock_in').value = product.stock_in;
            document.getElementById('stock_out').value = product.stock_out;
            document.getElementById('refund_stock').value = product.refund_stock;
            document.getElementById('price').value = product.price;
            document.getElementById('category').value = product.category;
            document.getElementById('image').value = product.image;

            editMode = true;
        }

        // ❌ Delete Product
        async function deleteProduct(id) {
            if (confirm('Are you sure?')) {
                await fetch(`${apiUrl}/${id}`, { method: 'DELETE' });
                loadProducts();
            }
        }

        // 🚀 Load all on start
        loadProducts();
    </script>
</body>
</html>
