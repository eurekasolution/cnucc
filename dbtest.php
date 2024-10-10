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
