<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script>
    window.onload = function(){
        a.focus();
    }
</script>
<body>
    <?php if(! isset($a)){
    $a = 0;
    $b = 0;}
     ?>

    <form method="post">
        @csrf <!-- 防止前端跨域攻擊     -->
        Number A: <input id="a" name="a" value="{{$a}}"/><p/>
        Number B: <input name="b" value="{{$b}}"/><p/>
        <input type="submit"/>
    </form>

@if (isset($answer))
    <hr>
    {{$a}} + {{$b}} = {{$answer}}
@endif
</body>
</html>