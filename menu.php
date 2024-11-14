<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        
      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">한문학과</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo $_SERVER['PHP_SELF'] ?>?cmd=sino">충남대학교 한문학과</a></li>
            <li><a class="dropdown-item" href="<?php echo $_SERVER['PHP_SELF'] ?>?cmd=korean">국어</a></li>
            <li><a class="dropdown-item" href="<?php echo $_SERVER['PHP_SELF'] ?>?cmd=board&bid=1">공지사항</a></li>
            <li><a class="dropdown-item" href="<?php echo $_SERVER['PHP_SELF'] ?>?cmd=board&bid=2">자유게시판</a></li>
          
            <li><a class="dropdown-item" href="<?php echo $_SERVER['PHP_SELF'] ?>?cmd=ajax">AJAX</a></li>
          
          
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Dropdown1</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Link</a></li>
            <li><a class="dropdown-item" href="#">Another link</a></li>
            <li><a class="dropdown-item" href="#">A third link</a></li>
          </ul>
        </li>

        <?php
          if(isset($_SESSION['sino_id']) and $_SESSION['sino_id'])
          {
            // 로그인 한 사람만 보이는 영역

            if(isset($_SESSION['sino_level']) and $_SESSION['sino_level'] == 9)
            {
              // 관리자 메뉴
            }
          }
        ?>

      </ul>
    </div>
  </div>
</nav>

<div class="container content">

<?php
  if(isset($_SESSION["sino_id"]) and $_SESSION["sino_id"])
  {
    // 로그인
    echo "
    <div class='row'>
      <div class='col text-end'>
        <b>$_SESSION[sino_name]</b>님 사용중 
        <button type='button' class='btn btn-primary' onClick=\"location.href='$_SERVER[PHP_SELF]?cmd=logout'\">로그아웃</button>
      </div>
    </div>
    ";
  }else
  {
    // 로그인 X
    echo "
    <form method='post' action='$_SERVER[PHP_SELF]?cmd=login'>
      <div class='row'>
        <div class='col colLine'>아이디</div>
        <div class='col colLine'>
          <input type='text' name ='id' class='form-control' placeholder='아이디를 입력하세요'>
        </div>
        <div class='col colLine'>PW</div>
        <div class='col colLine'>
          <input type='password' name ='pass' class='form-control' placeholder='비번을 입력하세요'>
        </div>
        <div class='col colLine'>
          <button type='submit' class='btn btn-primary form-control'>로그인</button>
        </div>
      </div>
    </form>
    ";

  }
?>