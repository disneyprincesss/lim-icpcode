<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
            padding: 25px;
        }

        .main {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            margin-bottom: 3em;
        }

        .php1 {
            margin: auto;
            padding: 50px;
            background-color: rgb(234, 232, 232);
        }

        .php2 {
            margin: auto;
        }

        table {
            border: 1px solid black;
            margin-bottom: 20px;
        }

        .row:nth-child(even) {
            background-color: rgb(234, 232, 232);
        }

        td {
            padding: 15px;
        }

        span {
            color: red;
        }

        .format {
            color: black;
            font-size: small;
        }

        input[type=date]:invalid::-webkit-datetime-edit {
            color: transparent;
        }

        input[type=date]::-webkit-datetime-edit {
            color: black;
        }
    </style>
</head>

<body>

    <div class="main">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="php1">
            User Input: <input type="number" name="num">
            <input type="submit" name="btn">
        </form>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="php2">

            <table>
                <tr class="row">
                    <td>Your name: <span>*</span></td>
                    <td><input type="text" name="yname" required></td>
                </tr>
                <tr class="row">
                    <td>Your email address: <span>*</span></td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr class="row">
                    <td>Department: <span>*</span></td>
                    <td><select name="dept" required>
                            <option value="">-select-</option>
                            <option value="CIC">CIC</option>
                            <option value="CEd">CEd</option>
                            <option value="CAS">CAS</option>
                        </select>
                    </td>
                </tr>
                <tr class="row">
                    <td>Which room would you like to reserve: <span>*</span></td>
                    <td><input type="radio" name="room" value="Room A" required>Room A <br>
                        <input type="radio" name="room" value="Room B" required>Room B <br>
                        <input type="radio" name="room" value="Room C" required>Room C <br>
                    </td>
                </tr>
                <tr class="row">
                    <td>Extra requirements:</td>
                    <td><input type="checkbox" name="reqs" value="Flipchart and pens">Flipchart and pens <br>
                        <input type="checkbox" name="reqs" value="Plasma TV screen">Plasma TV screen <br>
                        <input type="checkbox" name="reqs" value="Coffee,tea and mineral water">Coffee,tea and mineral water
                    </td>
                </tr>
                <tr class="row">
                    <td>Reservation date: <span>*</span></td>
                    <td><input id="date" type="date" name="date" max="<?php $date = date('Y-m-d');
                                                                        echo $date; ?>" required>
                        <br><span class="format"> Date Format is yyyy-mm-dd</span>
                    </td>
                </tr>
                <tr class="row">
                    <td>Reservation time: <span>*</span></td>
                    <td><input type="time" name="time" required></td>
                </tr>
                <tr class="row">
                    <td></td>
                    <td><input type="submit" name="submit"></td>
                </tr>
            </table>
        </form>
    </div>

    <div class="results">
        <?php

        if (isset($_POST['btn'])) {
            $num = $_POST['num'];
            $count = 0;

            while ($num != 1) {
                if ($num % 2 == 0) {
                    $num = $num / 2;
                    echo "Next Value: $num <br>";
                    $count++;
                }
                if ($num == 1) {
                } else if ($num % 2 != 0) {
                    $num = ($num * 3) + 1;
                    echo "Next Value: $num <br>";
                    $count++;
                }
            }

            echo "Count: $count";
        }

        if (isset($_POST['submit'])) {
            date_default_timezone_set("Asia/Manila");
            $name = $_POST['yname'];
            $email = $_POST['email'];
            $dept = $_POST['dept'];
            $room = $_POST['room'];
            $reqs = $_POST['reqs'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $time = date('h:i a', strtotime($time));


            echo "<table id='result'>
                <tr>
                    <td> Name: </td>
                    <td> $name </td>
                </tr>
                <tr>
                    <td> Email Address: </td>
                    <td> $email </td>
                </tr>
                <tr>
                    <td> Department: </td>
                    <td> $dept </td>
                </tr>
                <tr>
                    <td> Room: </td>
                    <td> $room </td>
                </tr>
                <tr>
                    <td> Extra Requirements: </td>
                    <td> $reqs </td>
                </tr>
                <tr>
                    <td> Reserved Date: </td>
                    <td> $date </td>
                </tr>
                <tr>
                    <td> Reserved Time: </td>
                    <td> $time </td>
                </tr>
            </table>";
        }
        ?>
    </div>

</body>

</html>