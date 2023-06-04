<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/fh-3.3.2/r-2.4.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/datatables.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/fh-3.3.2/r-2.4.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg">
        <div class="container-fluid">
          <h1 class="navbar-brand logo-text" >U-Beauty</h1>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Customer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Booking</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Procedure</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Staff</a>
              </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Logout</a>
                </li>
            </ul>
          </div>
        </div>
      </nav>
    <div id="body-section">
            <div class="gold-line-container">
                <div class="left-gold-line"></div>
                <div class="left-gold-line"></div>
            </div>
        <div class="gold-line-container">
            <div class="left-gold-line"></div>
            <div class="left-gold-line"></div>
        </div>
        <div id="body-flex">
            <div class="form-container">

                <div class="form-outer-border">
                    <form >
                        <h1 class="form-title">Customer Registration</h1>
                        <div class="row">
                            <div class=" col-sm-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="name" placeholder="name@example.com">
                                    <label for="name">Name</label>
                                </div>
                            </div>
                            <div class=" col-sm-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="name@example.com">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="phone" placeholder="phone@example.com">
                                    <label for="phone">Phone</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="dob" placeholder="phone@example.com">
                                    <label for="dob">Date of Birth</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea name="" id="address" class="form-control" cols="30" rows="5" style="height:1%" placeholder="hi"></textarea>
                            <label for="address">Address</label>
                        </div>
                        <button class="u-btn-gold">
                            Register
                        </button>

                    </form>
                </div>
            </div>
            <br>
            <br>
            <div class="table-container ">
                <table class="table table-hover " id="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr><tr>
                        <th scope="row">9</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr><tr>
                        <th scope="row">10</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr><tr>
                        <th scope="row">11</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">12</th>
                        <td >Larry the Bird</td>
                        <td>Thornton</td>
                        <td>@twitter</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>

      <footer>
      </footer>
<!--    set type = text for example it would be hidden-->
    <input type="text" id="customer-id">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        $(document).ready(()=>{
            let dataTable = $('#table').DataTable( {
                select: true,
                info:false,
                stateSave: true,
                rowId: 'id',
            } );
            dataTable.on('select', function (e, dt, type, indexes) {
                    let data = dt.row({selected: true}).data()
                    console.log(data); // data[0] = first column data for example customer id

                    $("#customer-id").val(data[0]);// to set the hidden input value
                })
        });
    </script>
</body>
</html>