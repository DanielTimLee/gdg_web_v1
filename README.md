# gdg_web_v1
php를 이용해 처음으로 개발해본 웹 페이지
# GDG_Web의 첫 프로젝트입니다!

 - 아무것도 모르는 웹알못이 진행하는 웹 프로젝트!
 - Opentutorials.org의 ‘생활코딩’ 수업을 따라 공부함.
 - 웹 공부는 2명이서 팀을 이뤄 스터디를 진행하였음.
 - 게시판 만들기, 쪽지 기능 등은 구글링을 통해서 진행함.
* [Opentutorials.org] - 오픈튜토리얼스 '생활코딩' 과정

## DB 스키마

| 게시판 목록 | 테이블 명 |
|-------------|-----------|
| 카테고리    | cat       |
| 글          | art       |
| 댓글        | mem       |
| 메시징      | msg       |

## 게시판 및 댓글 기능

##### 게시물 및 댓글 가져오기

GET 메서드 파라미터로 어떤 게시판(`$tab`)를 가르치는지 가져오고 쿼리를 직접 작성한다.
```SQL
$sql = SELECT * FROM art WHERE tab='$tab';
```
쿼리를 날려 데이터를 가져온다.
```php
$result = mysql_query($sql);
```
가져온 데이터를 한 줄씩 값을 가져와서 출력해 준다.
```php
$row = mysql_fetch_array($result);
$row = mysql_fetch_assoc($result); 
```
등을 이용해 직접 쿼리문을 날린거에서 각각 한개씩 데이터를 끄집어 냄.

##### 데이터를 생성
form태그의 id값을 이용해 `$_POST['data']` 를 이용해 데이터를 받아온다.
```php
$title=$_POST['title'];
```
받아온 데이터를 이용해 쿼리를 직접 작성한다.
```SQL
$sql = "INSERT INTO art (tab,title, description, usrname, created) VALUES('$tab','$title', '$description', '$u_name', NOW())";
```
쿼리를 날려 결과 데이터를 가져온다.
```php
$result=mysql_query($sql) or die(mysql_error());
```
받아온 데이터에서 영향을 준 row 값이 몇개 있는지 확인한다.
```php
$count=mysql_num_rows($result);
```
count 값이 1 이상이면 성공이다.

##### 데이터를 수정
form태그의 id값을 이용해 `$_POST['data']` 를 이용해 데이터를 받아온다.
```php
$tab=$_GET['tab'];
$title=$_POST['title'];
$description=$_GET['description'];
```
받아온 데이터를 이용해 쿼리를 직접 작성한다.
```SQL
$sql = "UPDATE art SET tab='$tab', title='$title', description='$description', modtime=NOW() WHERE no=$no";
```
쿼리를 날려 결과 데이터를 가져온다.
```php
$result=mysql_query($sql) or die(mysql_error());
```
받아온 데이터에서 영향을 준 row 값이 몇개 있는지 확인한다.
```php
$count=mysql_num_rows($result);
```
count 값이 1 이상이면 성공이다.

##### 데이터를 삭제
form태그의 id값을 이용해 `$_POST['data']` 를 이용해 데이터를 받아온다.
```php
$no=$_POST['no'];
```
받아온 데이터를 이용해 쿼리를 직접 작성한다.
```SQL
$sql = "DELETE FROM art WHERE no=$no";
```
쿼리를 날려 결과 데이터를 가져온다.
```php
$result=mysql_query($sql) or die(mysql_error());
```
받아온 데이터에서 영향을 준 row 값이 몇개 있는지 확인한다.
```php
$count=mysql_num_rows($result);
```
count 값이 1 이상이면 성공이다.

### 로그인 기능

- 로그인 기능은 세션과 쿠기가 있지만,, 사용할 줄 모름..
- GET 메서드로 user_id(uid)의 값이 존재한다면, 로그인 하게 해줌 ㅠㅠ..

### admin 기능

##### 게시판 추가하기 기능
- 최상단의 navbar 의 경우엔 카테고리(cat) 테이블을 따로 만들어 게시판의 리스트를 저장하게 하였다.
- 게시판을 하나 새로 만드는 셈!


##### 회원관리, 글 관리, 쪽지 관리 기능

   [Opentutorials.org]: <https://www.opentutorials.org/course/488>
