<?php
$mysql_host='localhost';
$mysql_user='root';
$mysql_password='1234';
$mysql_db='cafe';
$mysql_port=3306;
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);
mysqli_query($conn, "set session character_set_connection=utf8;");
mysqli_query($conn, "set session character_set_results=utf8;");
mysqli_query($conn, "set session character_set_client=utf8;");
if(mysqli_connect_errno()){ echo "연결실패! ".mysqli_connect_error();}


//카페 개수 + 1 == 새로운 카페 등록 카페 id
$cafe_ = "SELECT * FROM cafe;";
$cafe = mysqli_query($conn, $cafe_);
$total = mysqli_num_rows($cafe);

//franchise가 맞는가? cafe_id, franchise, company_name, company_id
if (isset($franchise) && $franchise=="f") $franchiseDB = 1;
if (isset($franchise) && $franchise=="p") $franchiseDB = 0;

//매장이용/ 테이크아웃 여부
if (isset($takeout) && $takeout =="y") $takeoutDB = 0;
if (isset($takeout) && $takeout =="n") $takeoutDB = 1;

// 카페 정보 입력
// $user_id = 회원정보 연결 
$name = $_GET[name];                      //cafe_name
$company = $_GET[company_name];           //company_name


// 도로명 주소 서울특별시 gu 상세주소 합치기
$address = $_GET[address];         //상세 정보 cafe_address
$full_address = "서울특별시", $gu, $address;

$cafe_query = "insert into cafe (cafe_name, cafe_address, user_id) 
    values('$name', '$title',0, '$id', '$user_id')";
$result = $connect->query($cafe_query);
if($result){
?>                
<script>
    alert("<?php echo "카페가 등록되었습니다."?>");
    location.replace("<?php echo $URL?>");
</script>
<?php
 }
else{
    echo "FAIL";
        }


//아메리카노 지수 입력 americano table
$americano = $GET[americano];             //americano
$americano_query =  "INSERT into americano values('$total+1','$americano')";
$result = $connect->query($americano_query);

//카페 넓이 입력 area table
$area = $GET[area];
$area_query =  "INSERT into area values('$total+1','$area', $takeoutDB')";
$result = $connect->query($area_query);

//프랜차이즈 정보 입력 franchise table
$franchise_query = "INSERT into company values ('$total+1', '$franchiseDB', '$company', company_id)";
$result = $connect->query($franchise_query);

//영업시간 입력
$mon_o = $_GET[mon_o];
$mon_c = $_GET[mon_c];
$tue_o = $_GET[tue_o];
$tue_c = $_GET[tue_c];
$wed_o = $_GET[wed_o];
$wed_c = $_GET[wed_c];
$thur_o = $_GET[thur_o];
$thur_c = $_GET[thur_c];
$fri_o = $_GET[fri_o];
$fri_c = $_GET[fri_c];
$sat_o = $_GET[sat_o];
$sat_c = $_GET[sat_c];
$sun_o = $_GET[sun_o];
$sun_c = $_GET[sun_c];
$time_query =  "INSERT into time values('$total+1','$mon_o','$mon_c','$tue_o','$tue_c','$wed_o','$wed_c'
,'$thur_o','$thur_c','$fri_o','$fri_c','$sat_o','$sat_c','$sun_o','$sun_c')";
$result = $connect->query($time_query);
       
mysqli_close($connect);
?>

            
 <!--         create table gu(
            cafe_gu int primary key auto_increment,
            cafe_id int,
            gu_name varchar(50),
 -->

 