<?php
    session_start();
    require_once('./conn.php');
    require_once('./utils.php');

    $id = $_GET['id'];

    $username = null;
    $user = null;
    if (!empty($_SESSION['username'])) {
      $username = $_SESSION['username'];
      $user = getUserFromUsername($username);
    }
    $stmt = $conn->prepare(
      "SELECT * from comments where id = ?"
    );
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();

    if (!$result) {
      die('ERROR:' . $conn->error);
    }

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

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
  </header>
  <main class="board">
      <h1 class="board__title">編輯留言</h1>
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
        <form class="board__new-comment-form" method="POST" action="handle_update_comment.php">
          <textarea name="content" rows="5"><?php echo $row['content']; ?></textarea>
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
          <input class="board__submit-btn" type="submit" />
        </form>
      <?php } else { ?>
        <p>請登入發布留言</p>
      <?php } ?>
      <div class="board__hr"></div>
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