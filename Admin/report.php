<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Monthly Report</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>

    <body>

        <?php  include 'adminHeader.php'; ?>

        <h2>Monthly Report</h2>

        <h3>Top-Selling Products</h3>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Number Sold</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample data for demonstration purposes -->
                <tr>
                    <td>Laptop</td>
                    <td>150</td>
                </tr>
                <tr>
                    <td>Smartphone</td>
                    <td>120</td>
                </tr>
                <tr>
                    <td>Tablet</td>
                    <td>90</td>
                </tr>
                <!-- Add more top-selling products here -->
            </tbody>
        </table>

        <h3>Top-Spending Customers (Over R15,000)</h3>
        <table>
            
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Customer ID</th>
                    <th>Total Amount (R)</th>
                </tr>
            </thead>

            <tbody>
                <!-- Sample data for demonstration purposes -->
                <tr>
                    <td>John Doe</td>
                    <td>123456</td>
                    <td>R20,500</td>
                </tr>

                <tr>
                    <td>Jane Smith</td>
                    <td>654321</td>
                    <td>R18,200</td>
                </tr>

                <tr>
                    <td>Michael Johnson</td>
                    <td>987654</td>
                    <td>R16,800</td>
                </tr>
                
            </tbody>

        </table>
    </body>
</html>