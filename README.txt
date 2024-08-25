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
    