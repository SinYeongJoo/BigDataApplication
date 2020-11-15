<!DOCTYPE html>
<html>
<head>
<meta charset = 'utf-8'>
</head>
<style>
        table.table2{
                border-collapse: separate;
                border-spacing: 1px;
                text-align: left;
                line-height: 1.5;
                border-top: 1px solid #ccc;
                margin : 20px 10px;
        }
        table.table2 tr {
                 width: 100%;
                 padding: 10px;
                 font-weight: bold;
                 vertical-align: top;
                 border-bottom: 1px solid #ccc;
        }
        table.table2 td {
                 width: 90%;
                 padding: 10px;
                 vertical-align: top;
                 border-bottom: 1px solid #ccc;
        }
 
</style>
<body>
<form method = "get" action = "Add_action.php">
<table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
<tr> <td height=20 align= center bgcolor=#ccc><font color=white>카페 등록하기</font></td> </tr>
<tr>
<td bgcolor=white>
<table class = "table2">
        <br>
        &nbsp&nbsp&nbsp&nbsp개인 카페인가요? &nbsp&nbsp&nbsp&nbsp
        <input type="radio" name="franchise" value="f"> 프랜차이즈 
        &nbsp&nbsp
        <input type="radio" name="franchise" value="p"> 개인

        <br><br>
        &nbsp&nbsp&nbsp 매장 이용/테이크아웃 모두 가능한가요? &nbsp&nbsp&nbsp&nbsp
        <input type="radio" name="takeout" value="y"> 네.
        &nbsp&nbsp
        <input type="radio" name="takeout" value="n"> 아니오. 테이크아웃만 가능합니다.
        



        <tr> 
        <td>카페 이름</td>
        <td><input type = text name = name size=50 
        placeholder="상호명을 적어주세요">  
        <input type = text name = company_name size=50 
        placeholder="프랜차이즈일 경우, 회사명을 적어주세요 ex) 스타벅스, 투썸플레이스">  </td>   
        </tr>
 
        <tr> <td>도로명 주소</td>
        <td>
        서울특별시&nbsp&nbsp
        <select name="gu">
        <option value="강남구">강남구</option>
        <option value="강동구">강동구</option>
        <option value="강북구">강북구</option>
        <option value="강서구">강서구</option>
        <option value="관악구">관악구</option>
        
        <option value="광진구">광진구</option>
        <option value="구로구">구로구</option>
        <option value="금천구">금천구</option>
        <option value="노원구">노원구</option>
        <option value="도봉구">도봉구</option>
        
        <option value="동대문구">동대문구</option>
        <option value="동작구">동작구</option>
        <option value="마포구">마포구</option>
        <option value="서대문구">서대문구</option>
        <option value="서초구">서초구</option>
        
        <option value="성동구">성동구</option>
        <option value="성북구">성북구</option>
        <option value="송파구">송파구</option>
        <option value="양천구">양천구</option>
        <option value="영등포구">영등포구</option>
        
        <option value="용산구">용산구</option>
        <option value="은평구">은평구</option>
        <option value="종로구">종로구</option>
        <option value="중구">중구</option>
        <option value="중랑구">중랑구</option>
        </select>
        <input type=text name=address2 placeholder=상세주소 size=50>  
        </td>
        </tr>

        <tr>
        <td>매장 넓이</td>
        <td><input type="number" name="area"" min="0" max="1000">&nbsp&nbsp미터제곱</td>
        </tr>

        <tr>
        <td>아메리카노 가격</td>
        <td><input type="number" name="americano" min="0" max="50000">&nbsp&nbsp원</td>
        </tr>


 
        <tr>
        <td>영업 시간</td>
        <td>월&nbsp&nbsp<input type= "number" name="mon_o" min="0" max="24" placeholder="7">
        &nbsp~&nbsp<input type= "number" name="mon_c" min="0" max="24" placeholder="21">
        <br>
        화&nbsp&nbsp<input type= "number" name="tue_o" min="0" max="24">
        &nbsp~&nbsp<input type= "number" name="tue_c" min="0" max="24">
        <br> 
        수&nbsp&nbsp<input type= "number" name="wed_o" min="0" max="24">
        &nbsp~&nbsp<input type= "number" name="wed_c" min="0" max="24">
        <br>
        목&nbsp&nbsp<input type= "number" name="thur_o" min="0" max="24">
        &nbsp~&nbsp<input type= "number" name="thur_c" min="0" max="24">
        <br> 
        금&nbsp&nbsp<input type= "number" name="fri_o" min="0" max="24">
        &nbsp~&nbsp<input type= "number" name="fri_c" min="0" max="24">
        <br>
        토&nbsp&nbsp<input type= "number" name="sat_o" min="0" max="24">
        &nbsp~&nbsp<input type= "number" name="sat_c" min="0" max="24">
        <br>
        일&nbsp&nbsp<input type= "number" name="sun_o" min="0" max="24">
        &nbsp~&nbsp<input type= "number" name="sun_c"min="0" max="24">
        </td>





        </td>
        </table>
        <input type = "submit" value="작성">
</table>

</form>
</body>
</html>