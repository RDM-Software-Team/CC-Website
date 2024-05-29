<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Bookings</title>
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

        <h2>Admin Bookings</h2>
        <table>
            <thead>

                <tr>
                    <th>Booking ID</th>
                    <th>Duration</th>
                    <th>Booking Time</th>
                    <th>Booking Date</th>
                    <th>Customer Name</th>
                </tr>

            </thead>

            <tbody>
                <!-- Sample data for demonstration purposes -->
                <tr>
                    <td>1</td>
                    <td>10min</td>
                    <td>09:00</td>
                    <td>2024-05-14</td>
                    <td>John Doe</td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>50min</td>
                    <td>10:30</td>
                    <td>2024-05-15</td>
                    <td>Jane Smith</td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>1hr 30min</td>
                    <td>14:00</td>
                    <td>2024-05-16</td>
                    <td>Michael Johnson</td>
                </tr>

                <tr>
                    <td>4</td>
                    <td>10min</td>
                    <td>11:00</td>
                    <td>2024-05-17</td>
                    <td>Sarah Williams</td>
                </tr>

                <tr>
                    <td>5</td>
                    <td>50min</td>
                    <td>12:30</td>
                    <td>2024-05-18</td>
                    <td>David Brown</td>
                </tr>

                <tr>
                    <td>6</td>
                    <td>1hr 30min</td>
                    <td>15:00</td>
                    <td>2024-05-19</td>
                    <td>Emily Wilson</td>
                </tr>

                <tr>
                    <td>7</td>
                    <td>10min</td>
                    <td>08:30</td>
                    <td>2024-05-20</td>
                    <td>James Taylor</td>
                </tr>

                <tr>
                    <td>8</td>
                    <td>50min</td>
                    <td>13:00</td>
                    <td>2024-05-21</td>
                    <td>Amy Miller</td>
                </tr>

                <tr>
                    <td>9</td>
                    <td>1hr 30min</td>
                    <td>16:00</td>
                    <td>2024-05-22</td>
                    <td>Robert Martinez</td>
                </tr>

                <tr>
                    <td>10</td>
                    <td>10min</td>
                    <td>09:30</td>
                    <td>2024-05-23</td>
                    <td>Jennifer Garcia</td>
                </tr>

                <tr>
                    <td>11</td>
                    <td>50min</td>
                    <td>11:00</td>
                    <td>2024-05-24</td>
                    <td>Christopher Hernandez</td>
                </tr>

                <tr>
                    <td>12</td>
                    <td>1hr 30min</td>
                    <td>14:30</td>
                    <td>2024-05-25</td>
                    <td>Mary Lopez</td>
                </tr>

                <tr>
                    <td>13</td>
                    <td>10min</td>
                    <td>10:00</td>
                    <td>2024-05-26</td>
                    <td>Matthew Gonzalez</td>
                </tr>

                <tr>
                    <td>14</td>
                    <td>50min</td>
                    <td>12:30</td>
                    <td>2024-05-27</td>
                    <td>Linda Perez</td>
                </tr>

            </tbody>
        </table>
    </body>
</html>