
<?php
session_start();
if($_SESSION['status'] != "ketua" && $_SESSION['status'] != "anggota") {
  header("location: login.php");
  exit; // tambahkan exit untuk menghentikan eksekusi skrip selanjutnya
}
?>

<?php
include "koneksi.php";
include "handler.php";
	// Create connection

date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT * FROM sensor_data ORDER BY id DESC LIMIT 1");
	while ($data = mysqli_fetch_array($query)) {

  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Monitoring Penyiraman Tanaman</title>
    <!-- plugins:css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jquery-bar-rating/css-stars.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
  
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo_2/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/1234.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_horizontal-navbar.html -->
      <div class="horizontal-menu">
        <nav class="navbar top-navbar col-lg-12 col-12 p-0">
          <div class="container">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo" href="index.html">
                <img src="assets/images/21.png" alt="logo" />
                <span class="font-12 d-block font-weight-light">Monitoring Penyiraman Tanaman </span>
              </a>
              <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
              <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                  <div class="input-group">
                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                      <span class="input-group-text" id="search">
                        <i class="mdi mdi-magnify"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" id="navbar-search-input" placeholder="Search" aria-label="search" aria-describedby="search" />
                  </div>
                </li>
              </ul>
              <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
                      <img src="assets/images/12.jpg" alt="image" />
                    </div>
                    <div class="nav-profile-text">
                      <p class="text-black font-weight-semibold m-0"> A.Three </p>
                      <span class="font-13 online-color">online <i class="mdi mdi-chevron-down"></i></span>
                    </div>
                  </a>
                  <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                   
                   <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="logout.php" onclick="return confirm('Apakah anda yakin keluar dari halaman ini ?')">
                     <i class="mdi mdi-logout mr-2 text-primary"></i> Logout </a>
                 </div>
                </li>
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                <span class="mdi mdi-menu"></span>
              </button>
            </div>
          </div>
        </nav>
        <nav class="bottom-navbar">
          <div class="container">
            <ul class="nav page-navigation">
             <?php
             include "header.php";
             ?>
             
              <li class="nav-item">
                <div class="nav-link d-flex">
                  <button class="btn btn-sm bg-danger text-white"> A3</button>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper pb-0">
            <!-- first row starts here -->
            <div class="row">
              <div class="col-xl-12 stretch-card grid-margin">
                <div class="card card-img">
                  <div class="card-body d-flex align-items-center">
                    <div class="text-white">
                      <h1 class="font-30 font-weight-semibold mb-0">  <?php  echo date('l, d F Y');?></h1>
                      <p class="font-20" id="clock"></p><br>
                      <p class="font-20 font-weight-semibold"> Data Terakhir Waktu Penyiraman </p>
                     <a class="btn btn-secondary" href="data.php">View</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 stretch-card grid-margin">
                <div class="card">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="card border-0">
                        <div class="card-body">
                          <div class="card-title">Kelembaban Tanah = <span id="kelembaban-bit"><?php echo $data['kelembaban']; ?></span> bit</div>
                          <div class="d-flex flex-wrap">
                              <canvas id="myChart" width="150" height="100" id="kt"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card border-0">
                        <div class="card-body">
                          <div class="card-title">Kadar Air  = <span id="kadar-air"><?php echo $data['kadar_air']; ?></span> %</div>
                          <div class="d-flex flex-wrap">
                              <canvas id="pieChart" width="150" height="100"></canvas>
                              
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card border-0">
                        <div class="card-body">
                          <div class="card-title">Waktu Penyiraman</div>
                          <div class="d-flex flex-wrap">
                              <canvas id="doughnutChart" width="150" height="100" ></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <footer class="footer">
            <div class="container">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Monitoring Penyiraman Tanaman</span>
              </div>

              <div>
              </div>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
    <script src="assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/flot/jquery.flot.js"></script>
    <script src="assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="assets/vendors/flot/jquery.flot.stack.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script>
      new DataTable('#example');
    </script>
    <script>
      new DataTable('#example1');
    </script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>">
    <!-- End custom js for this page -->
    <script> 
    const data = {
      labels: [
        'KT = 1023 Bit ',
      ],
      datasets: [{
        label: 'My First Dataset',
        data: [
          <?php echo $data['kelembaban'] ?> ,
 
          1023 - <?php echo $data['kelembaban'] ?>
        ],
        backgroundColor: [
        'rgb(255, 205, 86)',
         'rgb(201, 203, 207)'
        ],
        hoverOffset: 4
      }]
    };
    const config = {
      type: 'doughnut',
      data: data,
    };
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    )

    
    $(document).ready(function() {
    function loadCanvas() {
        $(".myChart").each(function() {
            $(this).load("index.php");
        });
    }

    loadCanvas(); // Load pertama kali
    setInterval(loadCanvas, 500); // Refresh setiap 500ms
    $.ajaxSetup({ cache: false });
});

</script>

    <script> 
    const file = {
      labels: [
        'KA = 100 %',
        
      ],
      datasets: [{
        label: 'My First Dataset',
        data: [
          <?php echo $data['kadar_air'] ?>,
      // Menambahkan data yang diperlukan untuk mencapai total 400
          100 - <?php echo $data['kadar_air'] ?>  
            ],
        backgroundColor: [
                'rgb(54, 162, 235)',
         'rgb(201, 203, 207)'

        ],
        hoverOffset: 4
      }]
    };
    const chrt = {
      type: 'doughnut',
      data: file,
    };

 
    const pieChart = new Chart(
      document.getElementById('pieChart'),
      chrt
    )

    $(document).ready(function() {
		$(document).ready(function() {
			$("#pieChart").load("index.php");
			var refreshid = setInterval(function() {
			$("#pieChart").load('index.php');
		},500);
		$.ajaxSetup({ cache: false});
			});
		});
</script>
    
    <script> 
    const knd = {
      labels: [
        'Berdasarkan Nilai Kelembaban > 400 bit' ,
      ],
      datasets: [{
        label: 'My First Dataset',
        data: [
          <?php echo $data['kelembaban'] ?> ,
          
          400 - <?php echo $data['kelembaban'] ?>


        ],
        backgroundColor: [
         'rgb(255, 99, 132)',
          'rgb(201, 203, 207)'
        ],
        hoverOffset: 4
      }]
    };
    const mine = {
      type: 'pie',
      data: knd,
    };
    const doughnutChart = new Chart(
      document.getElementById('doughnutChart'),
      mine
    )

    $(document).ready(function() {
		$(document).ready(function() {
			$("#doughnutChart").load("index.php");
			var refreshid = setInterval(function() {
			$("#doughnutChart").load('index.php');
		},500);
		$.ajaxSetup({ cache: false});
			});
		});
</script>    
 
<script>
        function displayTime() {
            var date = new Date(); // Dapatkan waktu saat ini
            var time = date.toLocaleTimeString(); // Ubah waktu menjadi format yang sesuai

            // Tampilkan waktu pada elemen dengan id "clock"
            document.getElementById('clock').innerText = time;
        }

        // Panggil fungsi displayTime setiap detik
        setInterval(displayTime, 1000);
    </script>
    <script>
    // Function to fetch data from server
    function fetchData() {
    $.ajax({
        url: 'input.php', // URL to your PHP script that fetches data
        dataType: 'json',
        success: function(response) {
            // Update Kelembaban Tanah
            $('#kelembaban-bit').text(response.kelembaban);
                
            // Update Kadar Air
            $('#kadar-air').text(response.kadar_air);
                
            // Update chart datasets
            myChart.data.datasets[0].data = [response.kelembaban, 1023 - response.kelembaban];
            pieChart.data.datasets[0].data = [response.kadar_air, 100 - response.kadar_air];
            doughnutChart.data.datasets[0].data = [response.kelembaban, 400 - response.kelembaban];
                
            // Update charts
            myChart.update();
            pieChart.update();
            doughnutChart.update();
        }
    });
}


    // Initial data fetch
    fetchData();

    // Fetch data every 5 seconds
    setInterval(fetchData, 1000);
</script>
   
  </body>

</html>


            <!-- chart row starts here -->
            <!-- doughnut chart row starts -->
            
            <!-- last row starts here -->
           <?php } ?>
          </div>
          <!-- content-wrapper ends -->
          