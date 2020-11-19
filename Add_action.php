<?php session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email']; 
$mysql_port=3306;
$conn = mysqli_connect('localhost', 'team09', 'team09', 'team09');
mysqli_query($conn, "set session character_set_connection=utf8;");
mysqli_query($conn, "set session character_set_results=utf8;");
mysqli_query($conn, "set session character_set_client=utf8;");
if(mysqli_connect_errno()){ echo "연결실패! ".mysqli_connect_error();}

//카페 개수 + 1 == 새로운 카페 등록 카페 id
$cafe_ = "SELECT * FROM cafe;";
$cafe = mysqli_query($conn, $cafe_);
$total = mysqli_num_rows($cafe);
$n = $total + 1;

$maxCompany_ = "SELECT max(company_id) from company;";
$maxCompany = mysqli_query($conn,$maxCompany_);
while ($maxCompanynum = mysqli_fetch_row($maxCompany)){
    $maxCompany_ = $maxCompanynum[0];
}

$franchise = $_GET['franchise'];
//franchise가 맞는가? cafe_id, franchise, company_name, company_id
if (isset($franchise) && $franchise=="f") $franchiseDB = 1;
if (isset($franchise) && $franchise=="p") $franchiseDB = 0;

$takeout = $_GET['takeout'];
//매장이용/ 테이크아웃 여부
if (isset($takeout) && $takeout =="y") $takeoutDB = 0;
if (isset($takeout) && $takeout =="n") $takeoutDB = 1;

// 카페 정보 입력
$name = $_GET['name'];                      //cafe_name
$company = $_GET['company_name'];           //company_name
$companyID = NULL;

$companyArray = array("스타벅스","이디야","투썸플레이스","엔젤리너스","할리스","팔공티","스무디킹","더 벤티",
"로얄마카롱","파스쿠치","공차","메가커피","카페여기","커피나무","커피빌리지","빽다방","커피온리","샐러디",
"쉬즈베이글","블루포트","쉴만한물가","탐앤탐스","빌리엔젤","이마트24","브루클린","오설록","백미당","카페인 중독",
"카페코지","오가다","로스팅하우스","GS","카페베네","세븐일레븐","라스베이글","셀렉토","빈스앤베리즈","알리바바",
"흑화당","커피빈","타이거슈가","마이쥬스","카페텀블러","에이미스","네스카페","카페아이엠티","COMPOSE","랭스터디",
"리플커피","카페캠퍼");

if($franchiseDB == 1){
    for($i=0; $i<50; $i++){
        $str = strcmp($company,$companyArray[$i]);
        if (!$str)  $companyID = $i+1;
        }
        if($companyID == NULL) { 
            $maxCompany_ = $maxCompany_+1 ;
            $companyID = $maxCompany_ ;
        }
}


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

$query ="INSERT into cafe(cafe_name, cafe_address, user_id) values('$name','$full_address','$user_id');";
mysqli_query($conn, $query);

$gu_query = "INSERT into gu(cafe_id,gu_name) values('$n','$guDB');";
mysqli_query($conn, $gu_query);

$americano_query = "INSERT into americano(cafe_id,price) values('$n','$americano');";
mysqli_query($conn, $americano_query);

$area_query = "INSERT into area(cafe_id,cafe_area,takeout) values('$n','$area', '$takeoutDB');";
mysqli_query($conn, $area_query);

$company_query = "INSERT into company(cafe_id,franchise,company_name, company_id) values 
('$n', '$franchiseDB', '$company','$companyID');";
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