<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>exam1</title>
</head>
<body>
    <?php
    if ($data1 == NULL) {
        echo "data empty";
    }
    else {
        echo"<table>
                <tr>
                    <td>id</td>
                    <td>name</td>
                </tr>";
        foreach ($data1 as $item ) {
            echo"<tr>";
            echo"<td>". $item['Topic']['topic_id'] . "</td>";
            echo"<td>". $item['Topic']['topic_name'] . "</td>";
            echo "</tr>";
        }
    } 
    
    ?>
</body>
</html>