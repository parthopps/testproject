<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 

    <title>Mouse Tech</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</head>

<body>
    <div style="padding: 30px;"></div>
    <div class="container">
        <!-- <h2 style="color: red;">
            <marquee>Laravel 8 Ajax CRUD Application</marquee>
        </h2> -->
        <div class="row">
            <div class="col-sm-8">

                <div class="card">
                    <div class="card-header">
                        <h3>Create License</h3>
                         <div class="" >
                                    <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                        
                    </div>
                    <div class="card-body">
                        <!-- Search form -->
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                        <div class="form-group">
                            <label>Client Id</label>
                            
                      <form method="post" action="{{ route('user.licence.upadate') }}" enctype="multipart/form-data">
                         {{ csrf_field() }}
                        <input class="form-control" id="search_teacher" type="text" placeholder="Search teacher" aria-label="Search" name="search">

                  </div>
                   <br>
                        
                         

                  <div class="form-group">
                    <label for="exampleInputEmail1">Licenser Key</label>
                    @foreach(App\license::orderBy('id','desc')->limit('1')->get() as $pps)
                    <input type="text" class="form-control"  placeholder="Enter email" name="key" value="{{$pps->key}}">
                    @endforeach
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                  <form method="post" action="{{ route('check.licence.store') }}" enctype="multipart/form-data">
                   {{ csrf_field() }}
                  <div class="form-group">
                   <label style="color: #242849;font-weight: 800;">License For</label>
                        <select class="browser-default custom-select" name="gender" style="">
                          <option value="3">3</option>
                          <option value="6">6</option>
                          <option value="12">12</option>
                        </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                                    </div>
                                </div>
                            </div>
                      
                  </div>
              </div>


<script>
    $('#addT').show();                   
    $('#addButton').show();                   
    $('#updateT').hide();                   
    $('#updateButton').hide();


// =============== set csrf token start ===============
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
    }); 

    function clearData()
    {
        $('#fname').val('');
        $('#lname').val('');
        $('#oname').val('');
        $('#fnameError').text('');
        $('#lnameError').text('');
        $('#onameError').text('');
    }



    $('body').on('keyup', '#search_teacher', function(){
        var searchQuest = $(this).val();
        $.ajax({
            method: "POST",
            url: "/pps/search/",
            dataType : "json",
            data:{
                '_token' : "{{ csrf_token() }}",
                searchQuest : searchQuest
            },

            success : function(response){

                var data = ""
                $.each(response, function(key, value){
                  
                        data = data + "<td>"+value.id+"</td>"
                        data = data + "<td>"+value.fname+"</td>"
                        data = data + "<td>"+value.lname+"</td>"
                        data = data + "<td>"+value.oname+"</td>"
                        data = data + "<td>"+value.city+"</td>"
                        data = data + "<td>"+value.steet+"</td>"
                        data = data + "<td>"+value.email+"</td>"
                        data = data + "<td>"+value.mnumber+"</td>"
                        
                })
                $('table').html(data);
                allData();
            }
            
        });
    });
</script>
</body>
</html>


                    

