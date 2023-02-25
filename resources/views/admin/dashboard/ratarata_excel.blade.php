<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nilai</th>
            </tr>
        </thead>

            <tbody>
                @foreach ($data as $item)
                <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <?php
                        $rata = 0;
                        if($item->status == 1){
                            $rata = $item->hasil_sum_nilai / $item->hasil_count;
                        }
                        echo round($rata);
                    ?>
                </td>
                </tr>
                @endforeach
            </tbody>

    </table>
</body>
</html>
