<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 

    <title>Laravel 8 Ajax CRUD</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</head>

<body>
    <div class="container">
        <!-- <h2 style="color: red;">
            <marquee>Laravel 8 Ajax CRUD Application</marquee>
        </h2> -->
        <div class="row">
<div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <span id="addT">Add new teacher</span>
                
                    </div>
                     <form method="post" action="{{ route('user.licence.upadate2') }}" enctype="multipart/form-data">
   {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control"  name="id" value="{{$order->id}}">
                            <input type="hidden" name="month" value="{{$order->relationToEmployeeTable->month}}">
                            <span class="text-danger" id="nameError"></span>
                        </div>
                        <div class="form-group">
                            <label>Licence Key</label>
                            <input type="text" class="form-control" value="{{$order->ukey}}" name="key">
                            
                        </div>
                        
                    
                        <button type="submit"  class="btn btn-success">Add</button>
                        
                </div>
            </div>
            </div>
        </div>