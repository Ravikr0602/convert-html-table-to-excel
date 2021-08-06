<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export_html_table_to excel_file</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="contanier">

        <div class="title">
            <h1 id="title_name">Export HTML Table to Excel File.</h1>
        </div>

    <!--------dynamic table data export to database using php --->
   <div class="export_box">

        <input type="button" id="btn" onclick="export_data()" value="Download Excel File">

   </div>

    <!--------dynamic table data will be export to database using php --->
    
<div class="record">  

    
<table class="record_table" id="record">
      <thead id="table_thead">
        <tr class="table_tr">
          <th class="table_th">Serial No</th>
          <th class="table_th"> Name</th>
          <th class="table_th"> Branch</th>
          <th class="table_th">Address</th>
        </tr>
      </thead>
      <tbody id="table_tbody">
<?php
 
 $conn = new mysqli('localhost', 'root' , '', 'ravi');

 $sql = "SELECT * FROM `student_record`";
 $result = mysqli_query($conn,$sql);
 while($detail =mysqli_fetch_array($result))
 {
?>
      <tr class="table_tr">
          <td class="table_td" data-column="Roll No"><?php echo $detail['sno'];?></td>
          <td class="table_td" data-column="Name"><?php echo $detail['Name'];?></td>
          <td class="table_td" data-column="Address"><?php echo $detail['Branch'];?></td>
          <td class="table_td" data-column="Address"><?php echo $detail['Address'];?></td>
       
         </td>
        </tr>
        </tbody>
<?php
 }
?>
        </table>   
    </div>
</div>

<!--------------- excel sheet export libary ------------------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<script>
    function export_data()
    {
        let record=document.getElementById('record');
        var fp=XLSX.utils.table_to_book(record,{sheet:'ravi'});
        XLSX.write(fp,{
            bookType:'xlsx',
            type:'base64'
        });
        //test is a file name when you saved html table data
        XLSX.writeFile(fp, 'test.xlsx'); 
    }
</script>

</body>
</html>