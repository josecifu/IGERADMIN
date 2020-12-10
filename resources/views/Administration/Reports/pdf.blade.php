<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body{
            background-color:#EFF8FF; 
          }
          h1, p{
            margin:0px;  
          }
          .main-section{
            background-color: #FFF;
            border: 1px solid #EC7E35;
          }
          .header{
            background-color: #EC7E35;
            padding:30px 15px 20px 15px ;  
            color:#fff;
          }
          .content{
            padding:20px 15px 20px 15px;
          }
          th{
            background-color: #EC7E35;
            color: #fff;  
            text-align: left;
          }
          .table td:nth-child(1),
          .table th:nth-child(1){
            text-align:center; 
          }
          .lastSection{
            padding: 20px 15px 30px 15px;
          }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="row main-section">
                    <div class="col-md-12 col-sm-12 header">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <img src="https://www.igerquetzaltenango.com/assets/media/logos/Logo-Iger.png" height="100px" width="100px">
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <h1>Iger Quetzaltenango</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 content">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                
                               <center> <h3>{{$title1}}</h3></center>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 text-right">
                          <table class="table">
                              <thead>
                                  <tr>
                                    @foreach($Titles as $Title)
                                    <th>{{ $Title }}</th>
                                    @endforeach
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($models as $Model)
                                <tr>
                                    @foreach($Model as $m)
                                    <td>{!! $m !!}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                                <tr>
                                    @foreach($Titles as $Title)
                                    <th>{{ $Title }}</th>
                                    @endforeach
                                </tr>
                              </tbody>
                          </table>
                    </div>
                    <div class="col-md-12 col-sm-12 lastSection">
                        <p>
                            Instituto Guatemalteco de Educación Radiofónica.<br>
                            Documento generado por <font color="#73A9D0"> www.igerquetzaltenango.com</font>
                      </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>