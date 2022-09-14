<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jobs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>jobs 新增</h1>
        <a href="./admin.php">回管理頁</a>
        <form method="POST" action="./handle_add.php">
            <div>職缺名稱：<input name="title" /></div>
            <div>職缺描述：<textarea name="description" rows="10"></textarea></div>
            <div>薪資範圍：<input name="salary" /></div>
            <div>職缺連結：<input name="link" /></div>
            <input type="submit" value="送出" />
        </form>
    </div>
</body>
</html>