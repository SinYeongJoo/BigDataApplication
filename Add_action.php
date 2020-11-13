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



$option = isset($_POST['gu']) ? $_POST['gu'] : false;
   if ($option) {
      echo htmlentities($_POST['gu'], ENT_QUOTES, "UTF-8");
   } else {
     echo "task option is required";
     exit; 
   }


// $user_id = 회원정보 연결 
$name = $_GET[name];                      //cafe_name
$title = $_GET[address];                  //cafe_address
$americano = $GET[americano];             //americano
// $cafe_id cafe_id auto increment가 아닌 테이블이 많아서 따로 해줘야할듯
$content = $_GET[content];              //Content
$URL = './index.php';                   //return URL

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
        
        

$americano_query =  "insert into americano (cafe_id, price) values('$cafe_id','$americano')";
$result = $connect->query($americano_query);
mysqli_close($connect);
?>
        <!-- create table time(
            cafe_id int  primary key,
            mon_open int,
            mon_close int,
            tue_open int,
            tue_close int,
            wed_open int,
            wed_close int,
            thur_open int,
            thur_close int,
            fri_open int,
            fri_close int,
            sat_open int,
            sat_close int,
            sun_open int,
            sun_close int,
            foreign key (cafe_id) references cafe (cafe_id) ON DELETE CASCADE
            );
            describe time;
            
            
            create table rating(
            cafe_id int  primary key,
            rating_num int,
            rating_sum int,
            rating_one int,
            rating_two int,
            rating_three int,
            rating_four int,
            rating_five int,
            foreign key (cafe_id) references cafe (cafe_id) ON DELETE CASCADE
            );
            describe rating;
            
            
            create table gu(
            cafe_gu int primary key auto_increment,
            cafe_id int,
            gu_name varchar(50),
            foreign key (cafe_id) references cafe (cafe_id) ON DELETE CASCADE );
            describe gu;
        
            create table company(
            cafe_id int primary key,
            franchise bool,
            company_name varchar(50),
            company_id int,
            foreign key (cafe_id) references cafe (cafe_id) ON DELETE CASCADE
            );
            describe company;
            
   
            
            create table location(
            cafe_id int not null primary key,
            latitude float(10,4),
            longitude float(10,4),
            foreign key (cafe_id) references cafe (cafe_id) ON DELETE CASCADE
            );
            describe location;
            
            
            cafe_id int primary key,
            cafe_area float(5,2),
            takeout bool,
           
 -->
