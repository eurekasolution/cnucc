README.txt
1. github테스트용
    https://github.com/eurekasolution/cnucc

    DB 세팅
    id : cnucc
    dbname : cnucc
    pass : 1111

    CREATE TABLE init(
        name    varchar(30)
    );

    INSERT INTO init (name) VALUES ('테스트');

    실행한 후 왼쪽의 cnucc/init를 클릭했을 때
    "테스트"라는 글씨가 보여야 함.
    한글깨짐이 있는 경우는 잘못 설치된 것임.

2. 홈페이지 실행
    C:/xampp/xampp_control.exe 실행
    Apache, MySQL의 "Start" 버튼을 클릭해 "Stop"으로 보여야 함.

    홈페이지 접속
    http://localhost

    데이터베이스 접속
    http://localhost/phpmyadmin
    

    chat.openai.com


    localhost/02.html

    w3schools.com


create table aaa ( 
    id char(20) unique,
    name char(20)

);

insert into aaa (id, name) values ('test', '테스트');
insert into aaa (id, name) values ('kdhong', '홍길동');

CREATE TABLE my_user_table (
    idx INT AUTO_INCREMENT PRIMARY KEY,   -- 기본 키이자 자동 증가 필드
    id VARCHAR(50) NOT NULL UNIQUE,       -- 사용자 아이디, 유일한 값
    name VARCHAR(100) NOT NULL,           -- 사용자 이름
    pass VARCHAR(255) NOT NULL,           -- 사용자 비밀번호
    birth DATE                            -- 생년월일 정보
);

INSERT INTO my_user_table (id, name, pass, birth) VALUES
('abcde', '세종', '1111', '1567-05-15'),
('fghij', '정조', '1111', '1745-08-28'),
('klmno', '이순신', '1111', '1545-09-08'),
('pqrst', '강감찬', '1111', '1582-12-12'),
('uvwxy', '이성계', '1111', '1357-01-20'),
('zabcd', '정도전', '1111', '1342-07-03'),
('efghi', '윤봉길', '1111', '1908-06-21'),
('jklmn', '안중근', '1111', '1879-09-02'),
('opqrs', '유관순', '1111', '1902-12-16'),
('tuvwx', '김구', '1111', '1876-08-29');

INSERT INTO my_user_table (id, name, pass, birth) VALUES
('yzabc', '허준', '1111', '1546-10-01'),
('defgh', '신사임당', '1111', '1504-10-29'),
('ijklm', '황희', '1111', '1363-02-03'),
('nopqr', '안창호', '1111', '1878-11-09'),
('stuvw', '장영실', '1111', '1390-07-01'),
('xyzaa', '이방원', '1111', '1367-10-13'),
('bcdef', '박지원', '1111', '1737-02-05'),
('ghijk', '유성룡', '1111', '1542-09-12'),
('lmnop', '신숙주', '1111', '1417-01-12'),
('qrstu', '정약용', '1111', '1762-06-16');

문법

insert into 테이블이름 (필드1, 필드2, ...) values ('값1', '값2', ..);

민경주 : kjmin
홍길동 : kdhong
insert into my_user_table (id, name, pass, birth) values 
                        ('kjmin', '민경주', '1111', '2000-10-03');

검색(SELECT)

SELECT column1, column2, ... FROM table_name;


SELECT * FROM my_user_table;
SELECT name,  birth from my_user_table;
SELECT name,  birth from my_user_table order by name asc;
SELECT name,  birth from my_user_table order by birth desc;
SELECT name,  birth from my_user_table 
        WHERE birth >='1800-01-01' and birth<'1900-01-01'
        order by name asc;

SELECT * from my_user_table where name like '%안%';

삽입(insert), 검색(select), 갱신(update), 삭제(delete)
UPDATE 테이블명 SET 필드1='새값1', 필드2='새값2', WHERE 조건

update my_user_table set id='gkim' where idx='10';
update my_user_table set id='djjung', birth='1500-01-01' where idx='6';

삭제

DELETE FROM 테이블명 WHERE 조건;

delete from my_user_table where idx='5';

PHP와 데이터베이스의 연동

DBname : culture
DBuser : culture
DBpass : 1111

PHP로 mysql과 연동하는 방법을 다음과 같이 만들어 줘.

- 파일의 이름은 db.php 파일
- $dbName = "culture";
- $dbUser = "culture";
- $dbPass = "1111";
- connectDB()함수를 이용해 DB에 연결해 줘.
- connectDB()는 $conn를 반환하도록 해줘.

다음과 같이 11.php 파일이 있어.
head.php는 HTML5와 bootstrap5에 관련된 헤더가 정의되어 있고
tail.php에는 HTML을 닫는 부분만 정의되어 있어.

위에서 제시해 준 db.php파일로 연결 확인도 되었다.
이때, 아래 코드에 my_user_table에 있는 모든 데이터를 이름순으로 가져와
idx, name, id, pass, birth를 테이블 형태로 출력하도록 코드를 추가해 줘.
이때 mysqli_query($conn, $sql); 형태로 코드를 만들어 줘.

$data =mysqli_fetch_array(); 형태로 코드를 생성해 줘.
<?php
    include "head.php";
    include "db.php";
?>
<div class="container">
    <div class="row">
        <div class="col colLine">DB 테스트</div>
    </div>
</div>
<?php 
    include "tail.php";
?>


w3schools.com

my_user_table이 다음과 같이 정의되어 있어.

CREATE TABLE my_user_table (
    idx INT AUTO_INCREMENT PRIMARY KEY,   -- 기본 키이자 자동 증가 필드
    id VARCHAR(50) NOT NULL UNIQUE,       -- 사용자 아이디, 유일한 값
    name VARCHAR(100) NOT NULL,           -- 사용자 이름
    pass VARCHAR(255) NOT NULL,           -- 사용자 비밀번호
    birth DATE                            -- 생년월일 정보
);


이때 13.php는 DB연결등을 다음과 같이 성공한 상태를 확인했어.

<?php
    include "head.php";
    include "db.php";

    // 데이터베이스 연결 확인
    $conn = connectDB();

    include "menu.php";

    include "dbtest.php";

    // 연결 종료
    mysqli_close($conn);
    include "tail.php";
?>

dbtest.php를 다음 조건에 맞게 제시해 줘.

제목: db정보 with ChatGPT
목록은 my_user_table에서 이름의 오름차순으로 모든 데이터를 가져와
table형태로 보여줘.
테이블의 목록은 idx, name, id, birth를 가져옴.




my_user_table이 다음과 같이 정의되어 있어.

CREATE TABLE my_user_table (
    idx INT AUTO_INCREMENT PRIMARY KEY,   -- 기본 키이자 자동 증가 필드
    id VARCHAR(50) NOT NULL UNIQUE,       -- 사용자 아이디, 유일한 값
    name VARCHAR(100) NOT NULL,           -- 사용자 이름
    pass VARCHAR(255) NOT NULL,           -- 사용자 비밀번호
    birth DATE                            -- 생년월일 정보
);

이와 같은 데이터베이스 테이블에 삽입 기능을 홈페이지와 연동하기 위한
코드가 13.php에서 include "dbtest.php"가 다음과 같이 만들어져 있다.

<div class="container mt-5">
    <h2>db정보 with ChatGPT</h2>

    <!-- 데이터 테이블 -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>idx</th>
                <th>name</th>
                <th>id</th>
                <th>birth</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // my_user_table에서 데이터를 이름 오름차순으로 가져오는 쿼리
            $sql = "SELECT idx, name, id, birth FROM my_user_table ORDER BY name ASC";
            $result = mysqli_query($conn, $sql);

            // 결과가 있는지 확인
            if (mysqli_num_rows($result) > 0) {
                // 각 행을 출력
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['idx'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['birth'] . "</td>";
                    echo "</tr>";
                }
            } else {
                // 결과가 없을 때
                echo "<tr><td colspan='4'>데이터가 없습니다.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

테이블 위에 id, name, birth, pass를 입력받아 데이터베이스에 추가하는
FORM을 만들고 기능을 완성해 줘.

create table users (
        idx integer AUTO_INCREMENT primary key,
        name    char(20),
        id      char(20) unique,
        pass    char(50),
        level   integer default '1'
);

insert into users (name, id, pass, level)
    value('테스트', 'test', '1111', '1');
insert into users (name, id, pass, level)
    value('관리자', 'admin', '1111', '9');


2024-11-01

게시판을 위한 테이블을 다음과 같이 만들어 줘.
테이블 명 : board
필요한 필드
  1. idx : 정수, 자동 증가, 게시판 글의 키 값
  2. bid : board를 구분하는 아이디. 예: 1 공지사항 2 자유게시판
  3. id : 사용자 아이디
  4. name : 작성자 이름 저장
  5. title : 게시판 제목
  6. notice : 1 공지사항, 0 공지사항 아님
  7. html : 게시글의 내용 저장, mediumtext
  8. time : datetime, 게시글 작성 시간


CREATE TABLE board (
    idx INT AUTO_INCREMENT PRIMARY KEY,          -- 게시글의 고유 키
    bid INT NOT NULL,                            -- 게시판 구분 아이디 (1: 공지사항, 2: 자유게시판 등)
    id VARCHAR(50) NOT NULL,                     -- 사용자 아이디
    name VARCHAR(100) NOT NULL,                  -- 작성자 이름
    title VARCHAR(255) NOT NULL,                 -- 게시판 제목
    notice TINYINT(1) DEFAULT 0,                 -- 공지사항 여부 (1: 공지사항, 0: 공지사항 아님)
    html MEDIUMTEXT,                             -- 게시글 내용 (MediumText)
    time DATETIME DEFAULT CURRENT_TIMESTAMP      -- 작성 시간 (현재 시간 자동 입력)
);



모든 링크가 index.php를 거쳐 cmd값을 보고 동작을 결정하도록
다음과 같이 구성되어 있어.
메뉴에서 공지사항(bid=1), 자유게시판(bid=2)는 다음과 같이 링크가 연결돼.
<a href="<?php echo $_SERVER['PHP_SELF']?>?cmd=board&bid=1">공지사항</a>

이때 index.php는 다음과 같이 되어 있어서 board.php를 만들고 싶어.

<?php
    session_save_path("sess");
    session_start();

    include "head.php";
    include "db.php";

    // 데이터베이스 연결 확인
    $conn = connectDB();

    include "menu.php";
    
    // $cmd 변수를 가져오기 (URL에서 ?cmd= 값을 확인)
    $cmd = isset($_GET["cmd"]) ? $_GET["cmd"] : '';

    if (empty($cmd)) {
        include "init.php";
    } else {
        $cmd_file = $cmd . ".php";
        if (file_exists($cmd_file)) {
            include $cmd_file;
        } else {
            echo "<div class='container'><p>파일을 찾을 수 없습니다: $cmd_file</p></div>";
        }
    }
    // 연결 종료
    mysqli_close($conn);
    include "tail.php";
?>

게시판의 동작 정의는 다음과 같아.
게시판의 각 기능은 $mode로 결정해.
$mode = $_GET['mode'];
1. 만약 $mode값이 없으면 기본 기능은 목록보기야($mode = "list").
2. mode에는 list(글 목록 보기), write(글쓰기), db_write(글쓰기 실행)
   show(글 내용보기), delete(글 삭제 실행)가 있어.
3. 글 목록 보기
  목록보기는 bid로 게시판을 구분해
  notice의 내림차순, idx의 내림차순으로 10개씩 보여줘.
  전체 페이지를 계산해 게시판 목록 밑에 페이지별로 이동하도록 
  bootstrap5의 pagination으로 페이지 표시
  제목을 클릭했을 때 글 내용보기(mode=show)
  화면 하단에 글쓰기 버튼이 있어서 버튼을 클릭하면 cmd=board&bid=$bid&mode=write로 이동하게 돼.
4. 글 내용 보기
    mode = "show"
    제목, 작성자, 내용보기를 보여주고
    화면 하단에 목록으로 가기, 삭제 버튼이 있어.
    삭제 버튼은 글쓴 사람이나, 관리자에게만 보여줘.
    세션정보로 sino_id, sino_level로 구분하는데
    $_SESSION["sino_id"]로 글쓴 사람인지 구분해
    관리자는 $_SESSION["sino_leve"]=9 이면 관리자야.

5. 글쓰기
    mode = "write"인데, 로그인 된 사람만 글을 쓸 수 있도록 해줘.
    단, 공지사항인 bid=1 게시판은 관리자만 글쓰기 가능해.
    글쓰기실행 버튼과 목록으로 가기 버튼이 있어.
    글쓰기실행 버튼을 클릭하면 mode=db_write에서 저장하고,
    alert('게시글이 작성되었습니다.')라고 보여주고 목록으로 가.
    목록으로 갈때나 게시판 마다 항상 bid가 따라 다녀야 해.
6. 글 삭제
    삭제는 글 쓴 사람이나 관리자만 수행하는데,
    confirm()으로 정말 삭제하겠는지 묻고 실행해줘.
    실행을 수행하면 mode=delete에서 처리하고
    alert('게시글이 삭제되었습니다.') 라고 보여주고 목록으로 가면돼.

모든 코드는 Bootstrap5로 구성되기 때문에 
table table-bordered 클래스를 이용해 테이블 형태로 보여줘.


1. menu.php에 ajax메뉴를 추가 (cmd=ajax)

2. ajax.php 생성

3. head.php에 jquery를 추가하는
4. ajax.php

내용채우고

5. ajaxServer.php 만들어서 수신하는 녀석을 만듬


a:link { /* font-family: Consolas; font-size:18px; */font-size:14px; text-decoration:none;  color:#000000; }
a:hover { /* font-family: Consolas; font-size:18px; */font-size:14px;  text-decoration:none;  color:#0000FF; }
a:visited { /* font-family: Consolas; font-size:18px; */font-size:14px;  text-decoration:none;  color:#000000; }