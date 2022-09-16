<?php
    session_start();
    require_once('./conn.php');
    require_once('./utils.php');
    /*
      1. cookie 讀取 PHPSESSIONID
      2. 從檔案讀取 session id 內容
      3. 放到 $_SESSION
    */
    $username = null;
    $user = null;
    if (!empty($_SESSION['username'])) {
      $username = $_SESSION['username'];
      $user = getUserFromUsername($username);
    }
    $stmt = $conn->prepare(
      "SELECT " .
      "C.id as id, C.content as content, C.created_at as created_at, U.nickname as nickname, U.username as username " .
      "FROM comments as C " .
      "left join users as U on C.username = U.username " .
      "order by id desc"
    );
    $result = $stmt->execute();

    if (!$result) {
      die('ERROR:' . $conn->error);
    }

    $result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>留言板</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="warning">
    <!-- <strong>注意！本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼。</strong> -->
  </header>
  <main class="board">
      <?php if (!$username) { ?>
        <a class="board_btn" href="register.php">註冊</a>
        <a class="board_btn" href="login.php">登入</a>
      <?php } else { ?>
        <a class="board_btn" href="logout.php">登出</a>
        <span class="board_btn update-nickname">編輯暱稱</span>
        <form method="POST" action="update_user.php" class="hide board__nickname-form board__new-comment-form">
          <div class="board__nickname">
            <span>新的暱稱：</span>
            <input type="text" name="nickname" />
          </div>
          <input class="board__submit-btn" type="submit" />
        </form>
        <h3>你好！<?php echo $user['nickname']; ?></h3>
      <?php } ?>
      <h1 class="board__title">Comments</h1>
      <?php
        $msg = 'error';
        if (!empty($_GET['errCode'])) {

          if ($_GET['errCode'] === '1') {
            $msg = '資料不齊全';
          }

          echo '<h4 class="error">' . $msg . '</h4>';
        }
      ?>
      <?php if ($username) { ?>
        <form class="board__new-comment-form" method="POST" action="handle_add_comment.php">
          <!-- <div class="board__nickname">
            <span>暱稱：</span>
            <input type="text" name="nickname" />
          </div> -->
          <textarea name="content" rows="5"></textarea>
          <input class="board__submit-btn" type="submit" />
        </form>
      <?php } else { ?>
        <p>請登入發布留言</p>
      <?php } ?>
      <div class="board__hr"></div>
      <section>
        <?php
            while($row = $result->fetch_assoc()) {
        ?>
        <div class="card">
          <div class="card__avatar">
          </div>
          <div class="card__body">
              <div class="card__info">
                <span class="card__author">
                  <?php echo escape($row['nickname']); ?>
                  (@<?php echo escape($row['username']); ?>)
                </span>
                <span class="card__time"><?php echo escape($row['created_at']); ?></span>
                <?php if ($row['username'] === $username) { ?>
                <a href="update_comment.php?id=<?php echo $row['id']; ?>">編輯</a>
                <?php } ?>
              </div>
              <p class="card__content">
                <?php echo escape($row['content']); ?>
              </p>
          </div>
        </div>
        <?php } ?>
      </section>
  </main>
  <script>
    var btn = document.querySelector('.update-nickname')
    btn.addEventListener('click', function() {
      var form = document.querySelector('.board__nickname-form')
      form.classList.toggle('hide')
    })
  </script>
</body>
</html>