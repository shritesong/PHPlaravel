<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr><td>帳號</td><td>姓名</td><td>密碼</td><td>住址</td></tr>
        @foreach ($users as $user)
        <tr>
        <td>{{$user->uid}}</td>
        <td>{{$user->cname}}</td>
        <td>{{$user->pwd}}</td>
        <td>{{$user->address}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>