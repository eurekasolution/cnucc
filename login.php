<?php
    $id = $_POST['id'];
    $pass = $_POST['pass'];

    echo "id = $id, pass = $pass";

    $sql = "select * from users where id='$id' and pass='$pass'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    if($data)
    {
        // 로그인 성공
        $_SESSION['sino_id'] = $id;
        $_SESSION['sino_name'] = $data['name'];
        $_SESSION['sino_level'] = $data['level'];

        $name = $data['name'];

        $msg = $name  . "님 반갑습니다.";
    }else
    {
        $msg = "아이디와 비밀번호를 입력하세요.";
    }

    echo "
    <script>
        alert('$msg');
        location.href='$_SERVER[PHP_SELF]';
    </script>
    ";
?>