<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Orders</title>
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

        <h2>Admin Orders</h2>
        <table>
            <thead>
                
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Order Date</th>
                    <th>Total Price</th>
                    <th>Customer ID</th>
                </tr>

            </thead>

            <tbody>
                <!-- Sample data for demonstration purposes -->
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>2024-05-14</td>
                    <td>R 100.00</td>
                    <td>123456</td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>2024-05-15</td>
                    <td>R 75.00</td>
                    <td>654321</td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>Michael Johnson</td>
                    <td>2024-05-16</td>
                    <td>R 50.00</td>
                    <td>987654</td>
                </tr>
                
                <tr>
                    <td>4</td>
                    <td>Sarah Williams</td>
                    <td>2024-05-17</td>
                    <td>R 120.00</td>
                    <td>456789</td>
                </tr>

                <tr>
                    <td>5</td>
                    <td>David Brown</td>
                    <td>2024-05-18</td>
                    <td>R 90.00</td>
                    <td>345678</td>
                </tr>

                <tr>
                    <td>6</td>
                    <td>Emily Wilson</td>
                    <td>2024-05-19</td>
                    <td>R 65.00</td>
                    <td>234567</td>
                </tr>

                <tr>
                    <td>7</td>
                    <td>James Taylor</td>
                    <td>2024-05-20</td>
                    <td>R 85.00</td>
                    <td>567890</td>
                </tr>

                <tr>
                    <td>8</td>
                    <td>Amy Miller</td>
                    <td>2024-05-21</td>
                    <td>R 110.00</td>
                    <td>678901</td>
                </tr>

                <tr>
                    <td>9</td>
                    <td>Robert Martinez</td>
                    <td>2024-05-22</td>
                    <td>R 95.00</td>
                    <td>789012</td>
                </tr>

                <tr>
                    <td>10</td>
                    <td>Jennifer Garcia</td>
                    <td>2024-05-23</td>
                    <td>R 70.00</td>
                    <td>890123</td>
                </tr>

                <tr>
                    <td>11</td>
                    <td>Christopher Hernandez</td>
                    <td>2024-05-24</td>
                    <td>R 55.00</td>
                    <td>901234</td>
                </tr>

                <tr>
                    <td>12</td>
                    <td>Mary Lopez</td>
                    <td>2024-05-25</td>
                    <td>R 130.00</td>
                    <td>012345</td>
                </tr>

                <tr>
                    <td>13</td>
                    <td>Matthew Gonzalez</td>
                    <td>2024-05-26</td>
                    <td>R 80.00</td>
                    <td>345012</td>
                </tr>

                <tr>
                    <td>14</td>
                    <td>Linda Perez</td>
                    <td>2024-05-27</td>
                    <td>R 100.00</td>
                    <td>456123</td>
                </tr>

            </tbody>
            
        </table>
    </body>
</html>