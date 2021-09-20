<html>
<head>
  <script src="jquery-3.3.1.min.js"></script>
  <script>
  /* When the user clicks on the button,
  toggle between hiding and showing the dropdown content */
  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
  function tog1() {
    $('td:nth-child(1),th:nth-child(1)').toggle();
  }
  function tog2() {
    $('td:nth-child(2),th:nth-child(2)').toggle();
  }
  function tog3() {
    $('td:nth-child(3),th:nth-child(3)').toggle();
  }
  function tog4() {
    $('td:nth-child(4),th:nth-child(4)').toggle();
  }
  function tog5() {
    $('td:nth-child(5),th:nth-child(5)').toggle();
  }
  function tog6() {
    $('td:nth-child(6),th:nth-child(6)').toggle();
  }
  function tog7() {
    $('td:nth-child(7),th:nth-child(7)').toggle();
  }
  function tog8() {
    $('td:nth-child(8),th:nth-child(8)').toggle();
  }
  function tog9() {
    $('td:nth-child(9),th:nth-child(9)').toggle();
  }
  function tog10() {
    $('td:nth-child(10),th:nth-child(10)').toggle();
  }

  function inputFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
  </script>
  <style>
  /* Dropdown Button */
  .dropbtn {
    margin-left: 20px;
    background-color: #368F8B;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
  }

  /* Dropdown button on hover & focus */
  .dropbtn:hover, .dropbtn:focus {
    background-color: #668F80;
  }

  /* The container <div> - needed to position the dropdown content */
  .dropdown {
    position: relative;
    display: inline-block;
  }

  /* Dropdown Content (Hidden by Default) */
  .dropdown-content {
    margin-left: 20px;
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }

  /* Links inside the dropdown */
  .dropdown-content button {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    border: none;
  }

  /* Change color of dropdown links on hover */
  .dropdown-content button:hover {background-color: #ddd}

  /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
  .show {display:block;}


    body {
      margin: 0;
      font-family: Tahoma, sans-serif;
      color: white;
      background-color: #23272a;
    }
    .center {
      margin-left: auto;
      margin-right: auto;
    }
    h1 {
      color: white;
      text-decoration: underline;
      text-align: center;
    }
    h2 {
      color: white;
      text-align: center;
    }
    table {
      text-align: center;
      background-color: #152238;
    }
    th {
      padding: 12px 15px;
    }
    tr {

    }
    td {
      padding: 12px 15px;
    }
  </style>
</head>
<body>
  <div id="header">
    <h1>Invoices</h1>
    <br>
    <h2>AP Database</h2>
  </div>
  <div id="idsearch">
    <input style="margin: auto; display: block; width: 50%; height: 30px;" type="text" id="myInput" onkeyup="inputFunction()" placeholder="Search for invoices by Vendor ID..">
  </div>
  <div class="dropdown">
    <button onclick="myFunction()" class="dropbtn">Show/Hide Columns</button>
  <div id="myDropdown" class="dropdown-content">
    <button onclick="tog1()">Invoice ID</button>
    <button onclick="tog2()">Vendor ID</button>
    <button onclick="tog3()">Invoice Number</button>
    <button onclick="tog4()">Invoice Date</button>
    <button onclick="tog5()">Invoice Total</button>
    <button onclick="tog6()">Payment Total</button>
    <button onclick="tog7()">Credit Total</button>
    <button onclick="tog8()">Terms ID</button>
    <button onclick="tog9()">Invoice Due Date</button>
    <button onclick="tog10()">Payment Date</button>
  </div>
</div>
</body>
</html>





<?php
$servername = "emfogli.it.pointpark.edu";
$username = "root";
$password = "OhYes1216";
$dbname = "ap";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT invoice_id, vendor_id, invoice_number, invoice_date, invoice_total, payment_total, credit_total, terms_id, invoice_due_date, payment_date FROM ap.invoices";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table id='myTable' class='center'><tr><th id='col1'>Invoice ID</th><th id='col2'>Vendor ID</th><th id='col3'>Invoice Number</th><th id='col4'>Invoice Date</th><th id='col5'>Invoice Total</th>
    <th id='col6'>Payment Total</th><th id='col7'>Credit Total</th><th id='col8'>Terms ID</th><th id='col9'>Invoice Due Date</th><th id='col10'>Payment Date</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td id='col1'>".$row["invoice_id"]."</td><td>".$row["vendor_id"]."</td><td>".$row["invoice_number"]."</td><td>".$row["invoice_date"]."</td><td>".$row["invoice_total"]."</td>
    <td>".$row["payment_total"]."</td><td>".$row["credit_total"]."</td><td>".$row["terms_id"]."</td><td>".$row["invoice_due_date"]."</td><td>".$row["payment_date"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
