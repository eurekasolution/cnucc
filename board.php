<?php
// 기본 변수 설정
$bid = isset($_GET['bid']) ? intval($_GET['bid']) : 1; // 게시판 ID, 기본값은 1 (공지사항)
$mode = isset($_GET['mode']) ? $_GET['mode'] : 'list'; // mode가 없으면 목록보기
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // 페이지 번호, 기본값 1

// 글 목록 보기
if ($mode === 'list') {
    $limit = 10; // 한 페이지에 보여줄 글 개수
    $offset = ($page - 1) * $limit;

    // 공지사항 우선, idx 내림차순으로 글 목록 가져오기
    $sql = "SELECT * FROM board WHERE bid = $bid ORDER BY notice DESC, idx DESC LIMIT $offset, $limit";
    $result = mysqli_query($conn, $sql);

    // 총 페이지 수 계산
    $count_sql = "SELECT COUNT(*) FROM board WHERE bid = $bid";
    $count_result = mysqli_query($conn, $count_sql);
    $total_records = mysqli_fetch_array($count_result)[0];
    $total_pages = ceil($total_records / $limit);

    // 게시글 목록 출력
    echo "<h2>게시판 목록</h2>";
    echo "<table class='table table-bordered'>";
    echo "<tr><th>번호</th><th>제목</th><th>작성자</th><th>작성시간</th></tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['idx']}</td>";
        echo "<td><a href='?cmd=board&bid=$bid&mode=show&idx={$row['idx']}'>{$row['title']}</a></td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['time']}</td>";
        echo "</tr>";
    }
    echo "</table>";

    // 페이지네이션
    echo "<nav><ul class='pagination'>";
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<li class='page-item'><a class='page-link' href='?cmd=board&bid=$bid&mode=list&page=$i'>$i</a></li>";
    }
    echo "</ul></nav>";

    // 글쓰기 버튼
    echo "<a href='?cmd=board&bid=$bid&mode=write' class='btn btn-primary'>글쓰기</a>";
}

// 글 내용 보기
else if ($mode === 'show') {
    $idx = isset($_GET['idx']) ? intval($_GET['idx']) : 0;
    $sql = "SELECT * FROM board WHERE idx = $idx";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $row['html'] = nl2br($row['html']);
                    // nl2br = new line to br tag

    echo "<h2>게시글 내용</h2>";
    echo "<table class='table table-bordered'>";
    echo "<tr><th>제목</th><td>{$row['title']}</td></tr>";
    echo "<tr><th>작성자</th><td>{$row['name']}</td></tr>";
    echo "<tr><th>내용</th><td>{$row['html']}</td></tr>";
    echo "</table>";

    // 목록으로 가기, 삭제 버튼
    echo "<a href='?cmd=board&bid=$bid&mode=list' class='btn btn-secondary'>목록으로</a>";
    if ($_SESSION['sino_id'] == $row['id'] || $_SESSION['sino_level'] == 9) {
        echo "<a href='?cmd=board&bid=$bid&mode=delete&idx=$idx' class='btn btn-danger' onclick='return confirm(\"정말 삭제하시겠습니까?\");'>삭제</a>";
    }
}

// 글쓰기
else if ($mode === 'write') {
    if (!isset($_SESSION['sino_id'])) {
        echo "
        <script>
            alert('로그인 후 이용 가능합니다.'); 
            window.location.href='index.php?cmd=board&bid=$bid';
        </script>";
    } else if ($bid == 1 && $_SESSION['sino_level'] != 9) {
        echo "<script>alert('공지사항 작성 권한이 없습니다.'); window.location.href='index.php';</script>";
    } else {
        echo "<h2>글쓰기</h2>";
        echo "<form action='?cmd=board&bid=$bid&mode=db_write' method='post'>";
        echo "<table class='table table-bordered'>";
        echo "<tr><th>제목</th><td><input type='text' name='title' class='form-control' placeholder='제목'></td></tr>";
        echo "<tr><th>내용</th><td><textarea name='html' class='form-control' rows='10' placeholder='내용'></textarea></td></tr>";
        echo "</table>";
        echo "<button type='submit' class='btn btn-primary'>글쓰기</button>";
        echo "<a href='?cmd=board&bid=$bid&mode=list' class='btn btn-secondary'>목록으로</a>";
        echo "</form>";
    }
}

// 글쓰기 실행
else if ($mode === 'db_write') {
    $title = $_POST['title'];
    $html = $_POST['html'];
    $id = $_SESSION['sino_id'];
    $name = $_SESSION['sino_name'];
    $sql = "INSERT INTO board (bid, id, name, title, html, notice) VALUES ($bid, '$id', '$name', '$title', '$html', 0)";
    mysqli_query($conn, $sql);
    echo "<script>
            alert('게시글이 작성되었습니다.'); 
            window.location.href='?cmd=board&bid=$bid&mode=list';
        </script>";
}

// 글 삭제
elseif ($mode === 'delete') {
    $idx = isset($_GET['idx']) ? intval($_GET['idx']) : 0;
    $sql = "DELETE FROM board WHERE idx = $idx AND (id = '{$_SESSION['sino_id']}' OR '{$_SESSION['sino_level']}' = 9)";
    mysqli_query($conn, $sql);
    echo "<script>
        alert('게시글이 삭제되었습니다.'); 
        window.location.href='?cmd=board&bid=$bid&mode=list';
        </script>";
}
?>
