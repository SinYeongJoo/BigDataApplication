<?php
$mysql_port=3306;
$conn = mysqli_connect("localhost", "root", "1234", "cafe");
mysqli_query($conn, "set session character_set_connection=utf8;");
mysqli_query($conn, "set session character_set_results=utf8;");
mysqli_query($conn, "set session character_set_client=utf8;");
if(mysqli_connect_errno()){ echo "연결실패! ".mysqli_connect_error();}

//카페 개수 + 1 == 새로운 카페 등록 카페 id
$cafe_ = "SELECT * FROM cafe;";
$cafe = mysqli_query($conn, $cafe_);
$total = mysqli_num_rows($cafe);
$n = $total + 1;

$franchise = $_GET['franchise'];
//franchise가 맞는가? cafe_id, franchise, company_name, company_id
if (isset($franchise) && $franchise=="f") $franchiseDB = 1;
if (isset($franchise) && $franchise=="p") $franchiseDB = 0;

$takeout = $_GET['takeout'];
//매장이용/ 테이크아웃 여부
if (isset($takeout) && $takeout =="y") $takeoutDB = 0;
if (isset($takeout) && $takeout =="n") $takeoutDB = 1;

// 카페 정보 입력
// $user_id = 회원정보 연결 
$name = $_GET['name'];                      //cafe_name
$company = $_GET['company_name'];           //company_name


// 도로명 주소 서울특별시 gu 상세주소 합치기
$guDB = $_GET['gu'];
$address = $_GET['address2'];         //상세 정보 cafe_address
$full_address = "서울특별시"." ".$guDB." ".$address;


//아메리카노 지수 입력 americano table
$americano = $_GET['americano'];             //americano

//카페 넓이 입력 area table
$area = $_GET['area'];

//영업시간 입력
$mon_o = $_GET['mon_o'];
$mon_c = $_GET['mon_c'];
$tue_o = $_GET['tue_o'];
$tue_c = $_GET['tue_c'];
$wed_o = $_GET['wed_o'];
$wed_c = $_GET['wed_c'];
$thur_o = $_GET['thur_o'];
$thur_c = $_GET['thur_c'];
$fri_o = $_GET['fri_o'];
$fri_c = $_GET['fri_c'];
$sat_o = $_GET['sat_o'];
$sat_c = $_GET['sat_c'];
$sun_o = $_GET['sun_o'];
$sun_c = $_GET['sun_c'];


//프랜차이즈 정보 입력 franchise table
// $franchise_query = "INSERT into company values ('$total+1', '$franchiseDB', '$company', company_id)";

// $cafe_query = "INSERT into cafe (cafe_name, cafe_address, user_id) 
//     values('$name', '$full_address', '$user_id')";

$query ="INSERT into cafe(cafe_name, cafe_address) values('$name','$full_address');";
mysqli_query($conn, $query);


$gu_query = "INSERT into gu(cafe_id,gu_name) values('$n','$guDB');";
mysqli_query($conn, $gu_query);

$americano_query = "INSERT into americano(cafe_id,price) values('$n','$americano');";
mysqli_query($conn, $americano_query);

$area_query = "INSERT into area(cafe_id,cafe_area,takeout) values('$n','$area', '$takeoutDB');";
mysqli_query($conn, $area_query);
$company_query = "INSERT into company(cafe_id,franchise,company_name) values ('$n', '$franchiseDB', '$company');";
mysqli_query($conn, $company_query);
$time_query = "INSERT into time(cafe_id,mon_open,mon_close,tue_open,tue_close,wed_open,wed_close,
thur_open,thur_close,fri_open,fri_close,sat_open,sat_close,sun_open,sun_close)
values('$n','$mon_o','$mon_c','$tue_o','$tue_c','$wed_o','$wed_c'
,'$thur_o','$thur_c','$fri_o','$fri_c','$sat_o','$sat_c','$sun_o','$sun_c');";
mysqli_query($conn, $time_query);

?>              

<script>
    alert("카페가 등록되었습니다.");
    location.href='Main.php'; 
</script>

<?php    
mysqli_close($conn);
?>