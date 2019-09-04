<?php  ?>
<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        .nav-link {
            color: black;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="card text-center" style="background-color:darkturquoise">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" style="padding: 5px;color: white">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" onclick="certificate()">Certificate</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" onclick="visa_letter()">Visa Letter</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#" onclick="pdf_write()">Pdf Write</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#" onclick="id_card_pdf()">Id Card Pdf</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#" onclick="coupon()">Coupon</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 20px;"></div>
        <div class="certificate" id="certificate" style="display: block">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-8">

                    <form action="methods_call.php" method="post" target="_blank">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Id" class="col-sm-2 col-form-label">Id :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id" name="id" placeholder="Id" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email :</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10"></div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary btn-lg" name="certificate">Certificate</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="write_pdf" id="write_pdf" style="display: none">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-8">
                    <form action="methods_call.php" method="post" target="_blank" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Example file input</label>
                            <input type="file" class="form-control-file" name="pdf_file" id="exampleFormControlFile1" accept="application/pdf" required>
                        </div>
                        <div class="form-group">
                            <label for="header">Header :</label>
                            <textarea rows="2" cols="70" required name="header"></textarea>
                        </div>
                           <div class="form-group">
                            <label for="footer">Footer :</label>
                            <textarea rows="2" cols="70" required name="footer"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary btn-lg" name="write_pdf">Write Pdf</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="id_card" id="id_card" style="display: none">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-8">
                    <form action="methods_call.php" method="post" target="_blank">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Id" class="col-sm-2 col-form-label">Id :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id" name="id" placeholder="Id" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10"></div>
                            <div class="col-sm-2">
                                <button type="submit" name="id_card_pdf" class="btn btn-primary btn-lg">Id Card Pdf</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="coupon" id="coupon" style="display: none">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9">
                    <form action="methods_call.php" method="post" target="_blank">
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Date :</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Id" class="col-sm-2 col-form-label">Food Category :</label>
                            <div class="col-sm-3">
                                <input class="form-check-input" type="checkbox" value="breakfast" id="breakfast" name="category[]">
                                <label class="form-check-label" for="breakfast">
    Break Fast
  </label>
                            </div>
                            <div class="col-sm-3">
                                <input class="form-check-input" type="checkbox" value="lunch" id="lunch" name="category[]">
                                <label class="form-check-label" for="lunch">
    Lunch
  </label>
                            </div>
                            <div class="col-sm-3">
                                <input class="form-check-input" type="checkbox" value="dinner" id="dinner" name="category[]">
                                <label class="form-check-label" for="dinner">
   Dinner
  </label>
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-7"></div>
                            <div class="col-sm-4">
                                <button type="submit" name="coupon" class="btn btn-primary btn-lg">Coupon</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="visa_letter" style="display: none">

            <form action="methods_call.php" method="post" target="_blank">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="form-group col-md-6">
                       <label for="">Write Your Visa Information Here </label>
                        <br>
                        <label for="exampleFormControlTextarea1">Ref :  </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="ref" cols="60"></textarea>
                    </div>
                    </div>
                    <div class="row"><div class="col-md-3"></div>
                    <div class="form-group col-md-6">
                       
                        <label for="exampleFormControlTextarea1">Date :  </label>
                        <input type="date" class="form-control" name="date">
                    </div>
                    </div>
                    <div class="row"><div class="col-md-3"></div>
                    <div class="form-group col-md-6">
                       
                        <label for="exampleFormControlTextarea1">To :  </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="to" cols="60"></textarea>
                    </div>
                    </div><div class="row"><div class="col-md-3"></div>
                    <div class="form-group col-md-6">
                       
                        <label for="exampleFormControlTextarea1">Committee :  </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="committee" cols="60"></textarea>
                    </div>
                    </div><div class="row"><div class="col-md-3"></div>
                    <div class="form-group col-md-6">
                       
                        <label for="exampleFormControlTextarea1">Paper Id :  </label>
                        <input type="number" name="paper_id" class="form-control" min="1" >
                    </div>
                    </div><div class="row"><div class="col-md-3"></div>
                    <div class="form-group col-md-6">
                       
                        <label for="exampleFormControlTextarea1">Paper Title :  </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="paper_title" cols="60"></textarea>
                    </div>
                    </div><div class="row"><div class="col-md-3"></div>
                    <div class="form-group col-md-6">
                       
                        <label for="exampleFormControlTextarea1">Meeting Place :  </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="meeting_place" cols="60"></textarea>
                    </div>
                    </div><div class="row"><div class="col-md-3"></div>
                    <div class="form-group col-md-6">
                       
                        <label for="exampleFormControlTextarea1">Director Info :  </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="director_info" cols="60"></textarea>
                    </div>
                    </div>

                
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-sm-2">
                        <button type="submit" name="visa_letter_pdf" class="btn btn-primary btn-lg">Visa Letter Pdf</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</body>

</html>

<script>
    function certificate() {
        document.getElementById('certificate').style.display = 'block';
        document.getElementById('write_pdf').style.display = 'none';
        document.getElementById('id_card').style.display = 'none';
        document.getElementById('coupon').style.display = 'none';
        document.getElementById('visa_letter').style.display = 'none';

    }

    function pdf_write() {
        document.getElementById('certificate').style.display = 'none';
        document.getElementById('write_pdf').style.display = 'block';
        document.getElementById('id_card').style.display = 'none';
        document.getElementById('coupon').style.display = 'none';
        document.getElementById('visa_letter').style.display = 'none';

    }

    function id_card_pdf() {
        document.getElementById('certificate').style.display = 'none';
        document.getElementById('write_pdf').style.display = 'none';
        document.getElementById('id_card').style.display = 'block';
        document.getElementById('coupon').style.display = 'none';
        document.getElementById('visa_letter').style.display = 'none';

    }

    function coupon() {
        document.getElementById('certificate').style.display = 'none';
        document.getElementById('write_pdf').style.display = 'none';
        document.getElementById('id_card').style.display = 'none';
        document.getElementById('coupon').style.display = 'block';
        document.getElementById('visa_letter').style.display = 'none';

    }

    function visa_letter() {
        document.getElementById('certificate').style.display = 'none';
        document.getElementById('write_pdf').style.display = 'none';
        document.getElementById('id_card').style.display = 'none';
        document.getElementById('coupon').style.display = 'none';
        document.getElementById('visa_letter').style.display = 'block';

    }
</script>